<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ubicacion extends CI_Controller
{

  public function  index()
  {
    $this->load->helper('url');
    $this->load->library('session');
    //$this->load->model('model_sitios');
    $usuario = $_SESSION["username"];
    $id = trim($_REQUEST["id"]);
    $rol = $_SESSION["role"];
    $this->load->model('model_solicitud');
    if (isset($usuario)) {
      //echo "Bienvenido"." ".$usuario;
      // code...
      //echo $rol;
      switch ($rol) {
        case '1':

          redirect('restrinct');
          break;
        case '2':
          $data["datosoli"] = $this->model_solicitud->datos($id);
          $this->load->view('transportista/ubicacion',$data);

          break;
        case '3':

          $this->load->view('admin/ubicacion');
          //redirect('restrinct');
          break;


        default:
          redirect('restrinct');
          // code...
          break;
      }
    }
  }

  public function mapa()
  {
    $this->load->helper('url');
    $this->load->library('session');
    //$this->load->model('model_sitios');
    $usuario = $_SESSION["username"];
    $rol = $_SESSION["role"];
    $id = trim($_REQUEST["id"]);
    $this->load->model('model_solicitud');
    if (isset($usuario)) {
      //echo "Bienvenido"." ".$usuario;
      // code...
      //echo $rol;
      switch ($rol) {
        case '1':

          redirect('restrinct');
          break;
        case '2':

          $data["datosoli"] = $this->model_solicitud->datos($id);
          $data["latitud"] = trim($_REQUEST["latitud"]);
          $data["longitud"] = trim($_REQUEST["longitud"]);
          $this->load->view('transportista/ubicaciondos', $data);

          break;
        case '3':
          $data["datosoli"] = $this->model_solicitud->datos($id);
          $data["latitud"] = trim($_REQUEST["latitud"]);
          $data["longitud"] = trim($_REQUEST["longitud"]);
          $this->load->view('admin/ubicaciondos', $data);
          //redirect('restrinct');
          break;


        default:
          redirect('restrinct');
          // code...
          break;
      }
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

  public function enproceso()
  {
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('model_solicitud');

    $id = trim($_REQUEST["id"]);


    $data["datosoli"] = $this->model_solicitud->enproceso($id);
    // El header es para poder decirle que si se ejecuta lo anterior cambia la url y le agrega la variable respose 1 que
    // es el mensaje de exito que se insertaron los datos
    header("Location: http://127.0.0.1:8888/RapiTrans/index.php/solicitudes?response=1");
    die();

    // si no se cumple la funcíón if, se quedará en la misma url y no mostrar ningun mensaje y los datos no se guardaran

  }

  public function finalizar()
  {
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('model_solicitud');

    $id = trim($_REQUEST["id"]);
    $fechaEntrega = date('d-m-Y H:i:s');

    $data["datosoli"] = $this->model_solicitud->finalizado($id, $fechaEntrega);
    // El header es para poder decirle que si se ejecuta lo anterior cambia la url y le agrega la variable respose 1 que
    // es el mensaje de exito que se insertaron los datos
    header("Location: http://127.0.0.1:8888/RapiTrans/index.php/solicitudes/mensajeFinalizado?response=2");
    die();

    // si no se cumple la funcíón if, se quedará en la misma url y no mostrar ningun mensaje y los datos no se guardaran

  }
}
