<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackOffice extends CI_Controller {

	public function index(){
		$this->load->model("type");
		$data["type"] = $this->type->getTypeMaison();
		$this->load->view("templates/header", $data);
		$this->load->view("templates/menu");
		$this->load->view("templates/footer");
	}

	public function ajouterMaison(){
		$this->load->model("type");
		$this->load->model("maison");
		$data["type"] = $this->type->getTypeMaison();
		$this->load->view("templates/header", $data);
		$this->load->view("templates/ajoutMaison");
		$this->load->view("templates/footer");
	}

	public function supprimerMaison(){
		
	}

	public function modifierMaison(){
		
	}
}