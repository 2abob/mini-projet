<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogue extends CI_Controller {

	public function listeMaison(){
		$type = $this->input->get("type");
		$offset = $this->input->get("offset");
		$this->load->model("type");
		$this->load->model("maison");
		$data["type"] = $this->type->getTypeMaison();
		$data["maison"] = $this->maison->getMaison($type, ($offset - 1) * 4);
		$data["NB"] = $this->maison->countMaison($type);
		$data["CUR"] = $offset;
		$data["type2"] = $type;
		$this->load->view("templates/header", $data);
		$this->load->view("templates/gallery", $data);
		$this->load->view("templates/footer");
	}

	public function rechercheIndexer(){
		$key = $this->input->post("key");
		$offset = $this->input->get("offset");
		$this->load->model("maison");
		$this->load->model("type");
		$data["maison"] = $this->maison->rechercheIndexer("$key", ($offset - 1) * 4);
		$data["type"] = $this->type->getTypeMaison();
		$data["NB"] = $this->maison->countresultat("$key");
		$data["CUR"] = $offset;
		$data["key"] = $key;
		$this->load->view("templates/header", $data);
		$this->load->view("templates/resultat", $data);
		$this->load->view("templates/footer");
	}

	public function rechercheIndexer2(){
		$key = $this->input->get("key");
		$offset = $this->input->get("offset");
		$this->load->model("maison");
		$this->load->model("type");
		$data["maison"] = $this->maison->rechercheIndexer("$key", ($offset - 1) * 4);
		$data["type"] = $this->type->getTypeMaison();
		$data["NB"] = $this->maison->countresultat("$key");
		$data["CUR"] = $offset;
		$data["key"] = $key;
		$this->load->view("templates/header", $data);
		$this->load->view("templates/resultat", $data);
		$this->load->view("templates/footer");
	}
}