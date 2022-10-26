<?php
defined('BASEPATH') or exit('No direct script access allowed');
// esta función hace referencia para poder mandar a llamar la vista que
// le queremos mandar.
class Welcome extends CI_Controller
{

	public function index()
	{
		// Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
		$this->load->helper('url');
		// Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
		$this->load->library('session');
		$usuario = $_SESSION["username"];
		$this->load->model('Model_Solicitud');
		$this->load->model('Model_Muestra');

		// Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
		// mostrará las vistas respectivas.
		$rol = $_SESSION["role"];

		if (isset($usuario)) {

			switch ($rol) {

				case '1':
					$this->load->view('usuario/principal');
					break;

				case '2':

					$this->load->view('transportista/principal');
					break;

				case '3':
					$this->load->view('admin/principal');
					break;

				default:
					// si se ingresa un rol no creado, no mostrara pantalla principal
					$redirect = base_url() . "/index.php/welcome/login";
					// code...
					redirect('/login');
					break;
			}
		} else {
			// Si no se cumple, seguirá mostrando el login
			header("Location: http://127.0.0.1:8888/RapiTrans/");
			die();
		}
	}
	

	// Función login, donde llamamos la vista, y las validaciones respectivas para poder acceder al sistema
	public function login()
	{
		$this->load->helper('url');
		// cargamos estas dos variables, user y pass, los request vienen de los name del formulario del login para que estas variables puedan mandarlas al modelo donde haran la petición de los datos
		// para poder logears
		$user = trim($_REQUEST["Usuario"]);
		$pass = trim($_REQUEST["Password"]);

		if (isset($user) and isset($pas)) {
			echo "Ingrese Usuario y contraseña";
			// code...
		} else {
			// Cargamos el modelo que vamos a utilziar para que pueda evaluar los datos
			$this->load->model('model_login');
			// Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
			$this->load->library('session');
			// La varaible data trae la variable usuarios y cargamos el modelo y la función de ese modelo y le mandamos
			// las variables con los varlos que tomaron
			$data["usuarios"] = $this->model_login->login($user, $pass);
			// mandamos los datos de la variable data
			var_dump($data["usuarios"]);


			$data["usuarios"] = $this->model_login->login($user, $pass);

			// Ejecutamos un foreach  mandamos la variable data, y si se ejecuta bien tenemos un if
			// mandamos las variables de usuiario y password y las evaluamos, y lo que le estamos diciendo
			// es que si los datos del formulario del login, son iguales a las que estan guardadas en la base de datos
			//mostrará la pantalla principal
			foreach ($data["usuarios"] as $usu) {

				if (($usu->Usuario == $user) and ($usu->Password == $pass)) {
					// code...
					$newdata = array(
						'dpi' => $usu->Dpi,
						'nombre'  => $usu->Nombre,
						'username'  => $usu->Usuario,
						'role' => $usu->idTipo_Usuariofk


					);
					$this->session->set_userdata($newdata);
					// Si se cumple el logeo y si existen el usuario y la contraseña, redireccionará a esta url
					header("Location: http://127.0.0.1:8888/RapiTrans/index.php/welcome");
					die();
				} else {
					echo "No puedes entrar";
				}
			}
			// code...
		}

		// si no se ejecuta, mostrará el login
		$this->load->view('login');
	}


	public function salir()
	{
		$this->load->helper('url');
		$this->load->library('session');
		echo "saliendo...";
		// Cerramos la sesión
		session_destroy();
		// Nos redireccionará al login
		header("Location: http://127.0.0.1:8888/RapiTrans/");
		die();
	}

	public function  restablecer()
	{
		$this->load->helper('url');
		$this->load->view('restablecer_password');
	}

	public function Renewpassword()
	{

		$validarcorreo = trim($_REQUEST['validarcorreo']);
		//echo $validarcorreo;
		$this->load->model('model_user');
		$this->load->helper('url');



		$datos = $this->model_user->validar_correo($validarcorreo);
		//var_dump($datos);
		foreach ($datos as $informacion) {
			$correovalidado = $informacion->Correo;
			$nombre_usuario = $informacion->Nombre;
		}

		if ($validarcorreo == $correovalidado) {
			// code...
			//$this->send($correovalidado);
			$iniciales = substr($validarcorreo, 0, -20);


			//	echo $validarcorreo."<br>";
			$generado = "cl-" . $this->generarCodigo(6) . "-" . $iniciales;

			//echo $generado;
			//echo $correovalidado."<br>".$generado;
			//$pre ="hola";
			$enviocorrecto = $this->send($correovalidado, $generado);
			$this->load->library('session');

			$newdata = array(
				'usuario'  => $nombre_usuario,
				'email'     => $correovalidado,
				'codigovalidacion' => $generado
			);

			$this->session->set_userdata($newdata);


			$this->load->view('validacioncodigo');
		} else {
			echo "el correo registrado no es igual al que tenemos en nuestros registros.";
		}
	}


	public function  send($correo, $generado)
	{
		/* ================================================= */
		$config = array(
		'protocol' => 'smtp',
		 	 'smtp_host' => 'ssl://smtp.gmail.com',
		 	 'smtp_port' => 465,
		  	 'smtp_user' => 'diegisseb@gmail.com',
		 	 'smtp_pass' => 'bciswelwulsyjqmk',
		 	 'mailtype' => 'html',
		 	 'charset' => 'utf-8',
		  	 'newline' => "\r\n"
		);
		$this->load->library('email', $config);
		$this->load->library('parser');

		$correouno = $correo;

		$data["codigo"] = $generado;
		$enviar = $this->load->view('plantilla_correo', $data, TRUE);

		$this->email->from('deliveryexpresgt@gmail.com', 'DeliveryExpressGT');
		$this->email->to($correouno);
		$this->email->subject('Solicitud de restablecimiento de contraseña');
		$this->email->message($enviar);
		$this->email->send();
		//$this->load->mail();
	}

	public function generarCodigo($longitud)
	{
		$key = '';
		$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
		$max = strlen($pattern) - 1;
		for ($i = 0; $i < $longitud; $i++) $key .= $pattern{
			mt_rand(0, $max)};
		return $key;
	}

	public function verificar()
	{
		$this->load->helper('url');
		$this->load->library('session');

		$codigovalidacionusuario = trim($_REQUEST["validarcorreo"]);
		if ($_SESSION["codigovalidacion"] == $codigovalidacionusuario) {
			// code...
			$this->load->view('nuevo_password');
		} else {
			echo "el codigo de validacion no concuerda.";
		}
	}
	public function newpassword()
	{
		$this->load->model('model_user');
		$this->load->helper('url');
		$this->load->library('session');
		$nombre = trim($_REQUEST["nombre"]);
		$correo = trim($_REQUEST["correo"]);
		$pass = trim($_REQUEST["password"]);
		$fechaMod = date('d-m-Y H:i:s');

		$actualizar = $this->model_user->password_update($pass, $nombre, $correo, $fechaMod);

		$this->load->view('cambio_password');
		$this->confirmacioncambiopassword($correo);
		session_destroy();
	}
	public function  confirmacioncambiopassword($correo)
	{
		/* ================================================= */
		$config = array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.gmail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'diegisseb@gmail.com',
		  'smtp_pass' => 'bciswelwulsyjqmk',
		  'mailtype' => 'html',
		  'charset' => 'utf-8',
		  'newline' => "\r\n"
		);
		$this->load->library('email', $config);
		$this->load->library('parser');
		$correouno = $correo;
		$enviar = "El cambio de contraseña se ha sido realizado con exito!.";
		$this->email->from('rapitrans@gmail.com', 'RapiTrans');
		$this->email->to($correouno);
		$this->email->subject('Cambio de password exitoso.');
		$this->email->message($enviar);
		$this->email->send();
		//$this->load->mail();
	}
}
