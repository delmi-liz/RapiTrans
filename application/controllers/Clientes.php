<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Clientes extends CI_Controller
{

    public function  index()
    {
        $this->load->helper('url');
        $this->load->library('session');
        $usuario = $_SESSION["username"];
        $id = trim($_REQUEST["id"]);
        $rol = $_SESSION["role"];
        if (isset($usuario)) {

            switch ($rol) {
                case '1':
                    $this->load->view('usuario/clientes');
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
}
