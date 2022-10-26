<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ubicacion extends CI_Controller {

public function  index(){
    $this->load->helper('url');
    $this->load->library('session');
    $this->load->model('model_sitios');
    $usuario = $_SESSION["username"];
    $id = trim($_REQUEST["id"]);
    $rol = $_SESSION["role"];
    if (isset($usuario)) {
      //echo "Bienvenido"." ".$usuario;
      // code...
      //echo $rol;
      switch ($rol) {
        case '1':
          // code...

          $data["datos"]= $this->model_sitios->selectindi($id);
          $data["latitud"]=trim($_REQUEST["latitud"]);
          $data["longitud"]=trim($_REQUEST["longitud"]);



          $this->load->view('ubicacion',$data);
          break;
        case '2':

          redirect('restrinct');

          break;
        case '3':
          // code...
          $data["datos"]= $this->model_sitios->selectindi($id);
          $data["latitud"]=trim($_REQUEST["latitud"]);
          $data["longitud"]=trim($_REQUEST["longitud"]);



          $this->load->view('subgerente/ubicacion',$data);
          //redirect('restrinct');
          break;
        case '4':
          // code...

          $data["datos"]= $this->model_sitios->selectindi($id);
          $data["latitud"]=trim($_REQUEST["latitud"]);
          $data["longitud"]=trim($_REQUEST["longitud"]);



          $this->load->view('supervisor/ubicacion',$data);
        //	$this->load->view('accessdenied.php');
          //redirect('restrinct');
          break;
          case '5':
            // code...
            //$this->load->view('dashboard');
          //	$this->load->view('accessdenied.php');
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
