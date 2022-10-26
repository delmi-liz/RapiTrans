<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Importar extends CI_Controller
{
  function __construct(){
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

		$rol = $_SESSION["role"];

		if (isset($usuario)) {

			switch ($rol) {

				case '1':

					$this->load->view('usuario/importar');
					break;

				case '2':
					$data["datosmuestra"] = $this->Model_Muestra->datosmuestra();
					$this->load->view('usuinterno/principal', $data);
					break;

				case '3':
					$data["datosmuestra"] = $this->Model_Muestra->datosmuestra();
					$this->load->view('autorizador/principal', $data);
					break;

				case '4':
					$data["datosmuestra"] = $this->Model_Muestra->datosmuestra();
					$this->load->view('analista/principal', $data);
					break;

				case '5':
					$data["datosmuestra"] = $this->Model_Muestra->datosmuestra();
					$this->load->view('jefe/principal', $data);
					break;

				case '6':
					$data["datosmuestra"] = $this->Model_Muestra->datosmuestra();
					$this->load->view('usuarioasignacion/principal', $data);
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

	function import_excel_data(){

		$this->load->library('excel');
		if(isset($_FILES["file"]["name"])){
			$path = $_FILES["file"]["tmp_name"];
			$object = PHPExcel_IOFactory::load($path);
			foreach($object->getWorksheetIterator() as $worksheet){
				$highestRow = $worksheet->getHighestRow();
				$highestColumn = $worksheet->getHighestColumn();
				for($row=2; $row<=$highestRow; $row++){
					$first_name = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
					$last_name = $worksheet->getCellByColumnAndRow(2, $row)->getValue();

					$mobile = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
					$email = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
					$address = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

					if(!empty($first_name)){
						$data[] = array(
							'first_name'  => $first_name,
							'last_name'   => $last_name,
							'mobile'    => $mobile,
							'email'  => $email,
							'address'   => $address,

						);
					}
				}

			}
			//print_r($data);
			$this->crud_model->insert_excel($data);
			$this->session->set_flashdata("Success","Data Uploaded Successfully !");
			redirect(base_url() , 'refresh');
		}
	}


}
