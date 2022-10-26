<?php
defined('BASEPATH') or exit('No direct script access allowed');
// esta función hace referencia para poder mandar a llamar la vista que
// le queremos mandar.
class UsersAdmin extends CI_Controller
{

  public function index()
  {
    $this->load->helper('url');
    $this->load->library('session');
    $usuario = $_SESSION["username"];
    $id = trim($_REQUEST["id"]);
    $rol = $_SESSION["role"];
    $this->load->model('model_user');

    if (isset($usuario)) {

      switch ($rol) {
        case '1':
          redirect('restrinct');
          break;
        case '2':

          redirect('restrinct');

          break;
        case '3':
          $data["usuarios"] = $this->model_user->clientes();
          $this->load->view('admin/asusuarios', $data);
          break;
        case '4':

          redirect('restrinct');

          break;
        case '5':

          redirect('restrinct');
          break;

        default:
          redirect('restrinct');
          // code...
          break;
      }
    }
  }

  public function nuevo()
  {
    // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
    $this->load->helper('url');
    // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
    $this->load->library('session');
    // Cargamos el modelo que vamos a utilizar para esta función nuevo
    $this->load->model('model_user');
    $usuario = $_SESSION["username"];

    $rol = $_SESSION["role"];
    if (isset($usuario)) {

      switch ($rol) {
        case '1':
          redirect('restrinct');
          break;
        case '2':

          redirect('restrinct');

          break;
        case '3':
          $data["response"] = trim(isset($_REQUEST["response"]));
          $this->load->view('admin/nuevoasusu', $data);
          break;


        default:
          redirect('restrinct');
          // code...
          break;
      }
    }
  }

  public function update()
  {

    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('model_user');
    //esta variable id almacena el id que le enviamos de la vista admin en el botón editar para poder
    // editar el punto de atención que queremos hacer cambios
    $id = trim($_REQUEST["id"]);
    $rol = $_SESSION["role"];


    switch ($rol) {
      case '1':

        redirect('restrinct');
        break;
      case '2':

        redirect('restrinct');
        break;
      case '3':

        $data["datos"] = $this->model_user->selectid($id);
        // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
        $this->load->view('admin/editarUsuarios', $data);

        break;

      default:
        redirect('restrinct');
        break;
    }
  }

  // Función para guardar los datos del formulario de la vista nuevoasusu
  public function guardar()
  {
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('model_user');

    // Estas variables vienen de las vista nuevoasusu, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta
    $dpi = trim($_REQUEST["dpi"]);
    $nombre = trim($_REQUEST["nombre"]);
    $usuario = trim($_REQUEST["usuario"]);
    $password = trim($_REQUEST["password"]);
    $correo = trim($_REQUEST["correo"]);
    $fecha = date('d-m-Y H:i:s');
    // si se cumple la funicón para poder guardar los datos, mandamos los respectivos  datos
    if (empty($usuario)) {
      header("Location: http://127.0.0.1:8888/RapiTrans/index.php/usersAdmin/nuevo");
      die();
    } else {

      $data["guardar"] = $this->model_user->guardarTransportistas($dpi, $nombre, $usuario, $password, $fecha, $correo);
      // El header es para poder decirle que si se ejecuta lo anterior cambia la url y le agrega la variable respose 1 que
      // es el mensaje de exito que se insertaron los datos
      header("Location: http://127.0.0.1:8888/RapiTrans/index.php/usersAdmin/nuevo?response=1");
      die();
    }
  }
}
