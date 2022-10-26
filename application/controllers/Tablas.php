<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tablas extends CI_Controller
{
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');
		$this->load->model('crud_model');
		$this->load->helper('form');
		$this->load->library('session');
	}
	public function index()
	{
		// Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
		$this->load->helper('url');
		// Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
			$this->load->library('session');
			$usuario = $_SESSION["username"];

		// Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
		// mostrará las vistas respectivas.
		$rol = $_SESSION["role"];

		if (isset($usuario)) {

			switch ($rol) {

				case '1':

					$this->load->view('usuario/importar');
					break;

				case '2':
					redirect('restrinct');
					break;

				case '3':
					$data["datosOfertaDemanda"] = $this->crud_model->datosDemanda();
					$data["costos"] = $this->crud_model->datosCostos();
					$this->load->view('admin/ofertaDemanda', $data);
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



}
