<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('form');
		$this->load->model('Personas');
	}//end __construct

	public function index() {
		$datos['personas'] = $this->Personas->seleccionar_todo();
		$this->load->view('welcome_message', $datos);
	}//end insex

	public function agregar() {
		$persona['nombre'] = $this->input->post('nombre');
		$persona['ap'] = $this->input->post('ap');
		$persona['am'] = $this->input->post('am');
		$persona['fn'] = $this->input->post('fn');
		$persona['genero'] = $this->input->post('genero');
		var_dump($persona);

		$this->Personas->agregar($persona);
		redirect('welcome');
	}//end agregar

	public function eliminar($id_persona) {
		$this->Personas->eliminar($id_persona);
		redirect('welcome');
	}//end eliminar

	public function editar($id_persona) {
		$persona['nombre'] = $this->input->post('nombre');
		$persona['ap'] = $this->input->post('ap');
		$persona['am'] = $this->input->post('am');
		$persona['fn'] = $this->input->post('fn');
		$persona['genero'] = $this->input->post('genero');

		$this->Personas->actualizar($persona, $id_persona);
		redirect('welcome');
	}//end editar 

}//end Class Welcome