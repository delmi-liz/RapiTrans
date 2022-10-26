<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Solicitudes extends CI_Controller
{

    public function  index()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $usuario = $_SESSION["username"];
        $id = trim($_REQUEST["id"]);
        $rol = $_SESSION["role"];
        $this->load->model('model_solicitud');
        if (isset($usuario)) {

            switch ($rol) {
                case '1':
                    $dpi = $_SESSION["dpi"];
                    $data["datosoli"] = $this->model_solicitud->datosPorCliente($dpi);
                    $this->load->view('usuario/solicitud', $data);
                    break;
                case '2':
                    $data["response"] = trim(isset($_REQUEST["response"]));
                    $data["datosoli"] = $this->model_solicitud->datosSolicitudClientes();
                    $this->load->view('transportista/solicitud', $data);
                    break;

                case '3':
                    $data["response"] = trim(isset($_REQUEST["response"]));
                    $data["datosoli"] = $this->model_solicitud->datosSolicitud();
                    $this->load->view('admin/solicitud', $data);
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

    public function  nuevo()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $usuario = $_SESSION["username"];
        $id = trim($_REQUEST["id"]);
        $this->load->model('model_solicitud');
        $rol = $_SESSION["role"];
        if (isset($usuario)) {

            switch ($rol) {
                case '1':
                    $codigoSolicitud = "" . $this->generarCodigo(8) . "";
                    $data["codigoSolicitud"] = $codigoSolicitud;
                    $data["response"] = trim(isset($_REQUEST["response"]));
                    $data["productos"] = $this->model_solicitud->productos();
                    $this->load->view('usuario/nuevasolicitud', $data);
                    break;
                case '2':
                    redirect('restrinct');
                    break;
                case '3':
                    redirect('restrinct');
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


    public function guardar()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('model_solicitud');

        $codigoSolicitud = "RapiTrans-" . $this->generarCodigo(8) . "-2021";
        $dpi = $_SESSION["dpi"];
        $usuarioAdiciono = $_SESSION["nombre"];
        $correo = trim($_REQUEST["correo"]);
        $telefono = trim($_REQUEST["telefono"]);
        $latitud = trim($_REQUEST["latitud"]);
        $longitud = trim($_REQUEST["longitud"]);
        $desc = trim($_REQUEST["desc"]);
        $productos = trim($_REQUEST["producto"]);
        $fecha = date('d-m-Y H:i:s');

        if (empty($usuario)) {


            $data["guardar"] = $this->model_solicitud->guardarSolicitud($usuarioAdiciono, $codigoSolicitud, $dpi, $correo, $telefono, $latitud, $longitud, $desc, $fecha, $productos);
            $this->solicitud_correo($correo, $codigoSolicitud);
            // El header es para poder decirle que si se ejecuta lo anterior cambia la url y le agrega la variable respose 1 que
            // es el mensaje de exito que se insertaron los datos
            header("Location: http://127.0.0.1:8888/RapiTrans/index.php/solicitudes/nuevo?response=1");
            die();
        }
        // si no se cumple la funcíón if, se quedará en la misma url y no mostrar ningun mensaje y los datos no se guardaran
        else {
            header("Location: http://127.0.0.1:8888/RapiTrans/index.php/solicitudes");
            die();
        }
    }

    public function asignar()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('model_solicitud');

        $asignado = 222222;
        $id = trim($_REQUEST["id"]);




        $data["datosoli"] = $this->model_solicitud->asignar($id, $asignado);
        // El header es para poder decirle que si se ejecuta lo anterior cambia la url y le agrega la variable respose 1 que
        // es el mensaje de exito que se insertaron los datos
        header("Location: http://127.0.0.1:8888/RapiTrans/index.php/solicitudes?response=1");
        die();

        // si no se cumple la funcíón if, se quedará en la misma url y no mostrar ningun mensaje y los datos no se guardaran

    }
    public function finalizado()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('model_solicitud');

        $id = trim($_REQUEST["id"]);


        $data["datosoli"] = $this->model_solicitud->finalizado($id);
        // El header es para poder decirle que si se ejecuta lo anterior cambia la url y le agrega la variable respose 1 que
        // es el mensaje de exito que se insertaron los datos
        header("Location: http://127.0.0.1:8888/RapiTrans/index.php/solicitudes?response=1");
        die();

        // si no se cumple la funcíón if, se quedará en la misma url y no mostrar ningun mensaje y los datos no se guardaran

    }



    public function  solicitud_correo($correo, $codigoSolicitud)
    {

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://gator4167.hostgator.com',
            'smtp_port' => 465,
            'smtp_user' => 'noreply@ltechweb.org',
            'smtp_pass' => 'pruebadecorreo123s',
            'mailtype' => 'html',
            'charset' => 'UTF-8',
            'newline' => '\r\n',
            'crlf' => '\r\n',

        );


        $this->load->library('email', $config);
        $this->load->library('parser');

        //  $correo='diegisseb@gmail.com';
        $asunto = "EXITO AL HACER LA SOLICITUD";
        $data['codigoSolicitud'] = $codigoSolicitud;

        $enviar = $this->load->view('plantilla_creacion', $data, TRUE);
        //  $enviar= "Señor cuentahabiente,  agradecemos su comunicación,  le informamos que su queja ha sido recibida exitosamente. Para el seguimiento o cualquier consulta relacionada, no olvide que el número de su queja es QMS-Correlativo-Añoactual".$rs;
        $this->email->from('deliveryexpresgt@gmail.com', 'DeliveryExpressGT');
        $this->email->to($correo);
        $this->email->subject($asunto);
        $this->email->message($enviar);
        $this->email->send();
    }


    public function generarCodigo($longitud)
    {
        $key = '';
        //Definimos los numeros que vamos a usar para generar los códigos para el pdf
        $pattern = '1234567890';
        //Maximo de numeración
        $max = strlen($pattern) - 1;
        //Generamos un for el cual nos define cuantos y cuales numeros va a mostar, en este caso nos generará
        // Un codigo de n digitos los cuales les mandemos a pedir.
        for ($i = 0; $i < $longitud; $i++) $key .= $pattern{
        mt_rand(0, $max)};
        return $key;
    }

    public function  mensajeFinalizado()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $usuario = $_SESSION["username"];
        $id = trim($_REQUEST["id"]);
        $rol = $_SESSION["role"];
        $this->load->model('model_solicitud');
        if (isset($usuario)) {

            switch ($rol) {
                case '1':
                    redirect('restrinct');

                    break;
                case '2':
                    $data["response"] = trim(isset($_REQUEST["response"]));
                    $this->load->view('transportista/mensaje', $data);
                    break;

                case '3':
                    redirect('restrinct');

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
}
