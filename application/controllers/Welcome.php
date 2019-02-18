<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{	
		$this->load->model('Sorvetes_Model');

		$fabricantes = $this->Sorvetes_Model->findFabricantes();
		$sorvetes = $this->Sorvetes_Model->findSorvetes();

		$this->load->view('welcome_message', array(
			'fabricantes'	=> $fabricantes,
			'sorvetes'		=> $sorvetes
		));
	}

	public function cadastrar_fabricante()
	{
		if($this->input->post()) {

			$dadosFabricante = array(
				'nome'	=> $this->input->post('nome',TRUE),
				'cnpj'	=> $this->input->post('cnpj',TRUE)
			);

			$this->load->model('Sorvetes_Model');

			$insert = $this->Sorvetes_Model->insert_fabricante($dadosFabricante);

			echo "Cadastrados com sucesso";

		} else {

			echo "Não foi possível cadastrar";
		}
	}

	public function cadastrar_sabor()
	{
		if($this->input->post()) {

			$dadosSorvete = array(
				'fabricante_id' 	=> $this->input->post('fabricante_id'),
				'sabor'				=> $this->input->post('sabor'),
				'preco_sugerido'	=> $this->input->post('preco_sugerido')
			);

			$this->load->model('Sorvetes_Model');

			$this->Sorvetes_Model->insert_sabor($dadosSorvete);

			echo "Sabor cadastrado com sucesso";

		} else {

			echo "Não foi possível cadastrar o sabor";

		}



	}
}
