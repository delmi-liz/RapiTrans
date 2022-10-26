<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Vehiculos extends CI_Controller
{

    public function  index()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $usuario = $_SESSION["username"];
        $this->load->model('model_vehiculos');
        $id = trim($_REQUEST["id"]);
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
                    $data["vehiculos"] = $this->model_vehiculos->datosVehículos();
                    $this->load->view('admin/vehiculos', $data);
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
        $rol = $_SESSION["role"];
        if (isset($usuario)) {

            switch ($rol) {
                case '1':
                    redirect('restrinct');;
                    break;
                case '2':
                    redirect('restrinct');
                    break;
                case '3':
                    $data["response"] = trim(isset($_REQUEST["response"]));
                    $this->load->view('admin/nuevoVehiculo', $data);
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
        $this->load->model('model_vehiculos');

        // Estas variables vienen de las vista nuevoasusu, las letras verdes son los datos quue viene de la vista y las variables CON el signo $ son para declarar las nuevas variables donde mandaras los datos a tu consulta
        $placa = trim($_REQUEST["placa"]);
        $marca = trim($_REQUEST["marca"]);
        $tipo = trim($_REQUEST["tipo"]);
        $modelo = trim($_REQUEST["modelo"]);
        $color = trim($_REQUEST["color"]);
        $usuarioAdiciono = $_SESSION["nombre"];
        $ip= $this->ip();
        $fecha = date('d-m-Y H:i:s');
        // si se cumple la funicón para poder guardar los datos, mandamos los respectivos  datos
        if (empty($usuario)) {
            $data["guardar"] = $this->model_vehiculos->guardarVehiculos($placa, $marca, $tipo, $modelo, $color, $usuarioAdiciono, $ip, $fecha);
            // El header es para poder decirle que si se ejecuta lo anterior cambia la url y le agrega la variable respose 1 que
            // es el mensaje de exito que se insertaron los datos
            header("Location: http://127.0.0.1:8888/RapiTrans/index.php/vehiculos/nuevo?response=1");
            die();
        } else {

            header("Location: http://127.0.0.1:8888/RapiTrans/index.php/vehiculos/nuevo");
            die();
        }
    }

    public function ip()
    {
        // funcion para capturar la ip del visitante y guardarla
        if (getenv('HTTP_CLIENT_IP')) {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR')) {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('HTTP_X_FORWARDED')) {
            $ip = getenv('HTTP_X_FORWARDED');
        } elseif (getenv('HTTP_FORWARDED_FOR')) {
            $ip = getenv('HTTP_FORWARDED_FOR');
        } elseif (getenv('HTTP_FORWARDED')) {
            $ip = getenv('HTTP_FORWARDED');
        } else {
            // Método por defecto de obtener la IP del usuario
            // Si se utiliza un proxy, esto nos daría la IP del proxy
            // y no la IP real del usuario.
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        //echo "Su IP parece ser: ".$ip;
        return $ip;
    }
}
