<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BackOffice extends CI_Controller {

	public function index(){
		//$this->load->model("type");
		//$data["type"] = $this->type->getTypeMaison();
		if($this->session->userdata('LOGIN') == NULL){
			header("Location: ".base_url("connection.html"));
			return ;
		}
		$this->load->view("templates/headerBack");
		$this->load->view("templates/menu");
		$this->load->view("templates/footer");
	}

	public function connection(){
		$this->load->view("templates/headerBack");
		$this->load->view("templates/connection");
		$this->load->view("templates/footer");
	}

	public function verifier(){
		$this->load->model("utilisateur");
		$login = $this->input->post("login");
		$mdp = $this->input->post("mdp");
		$log = $this->utilisateur->seConnecter($login, $mdp);
		$data["log"] = $log;
		if($log["ok"])
			header("Location: ".base_url("maintenance.html"));
		else{
			$this->load->view("templates/headerBack", $data);
			$this->load->view("templates/connection2");
			$this->load->view("templates/footer");
		}
	}

	public function deconnecter(){
		$this->session->sess_destroy();
		header("Location: ".base_url("connection.html"));
	}

	public function ajouterMaison(){
		if($this->session->userdata('LOGIN') == NULL){
			header("Location: ".base_url("connection.html"));
			return ;
		}
		$this->load->model("type");
		$this->load->model("location");
		$this->load->model("maison");
		$maison["idtype"] = $this->input->post("idtype");
		$maison["idlocation"] = $this->input->post("idlocation");
		$maison["surface"] = $this->input->post("surface");
		$maison["nbsalle"] = $this->input->post("nbsalle");
		$maison["nbdouche"] = $this->input->post("nbdouche");
		$maison["nbwc"] = $this->input->post("nbwc");
		$maison["clim"] = $this->input->post("clim");
		$maison["aircond"] = $this->input->post("aircond");
		$maison["title"] = $this->input->post("title");
		$data["type"] = $this->type->getTypeMaison();
		$data["location"] = $this->location->getLocationMaison();
		$data["maison"] = $maison;
		$this->load->view("templates/headerBack");
		$this->load->view("templates/ajoutMaison", $data);
		$this->load->view("templates/footer");
	}

	public function supprimerMaison(){
		if($this->session->userdata('LOGIN') == NULL){
			header("Location: ".base_url("connection.html"));
			return ;
		}
		$offset = $this->input->get("offset");
		//$this->load->model("type");
		$this->load->model("maison");
		$data["maison"] = $this->maison->getMaison("", ($offset - 1)*4);
		//$data["type"] = $this->type->getTypeMaison();
		$data["CUR"] = $offset;
		$data["NB"] = $this->maison->countMaison("");
		$data["type2"] = "";
		$this->load->view("templates/headerBack");
		$this->load->view("templates/supprimerMaison", $data);
		$this->load->view("templates/footer");
	}

	public function confirmerSupprimer1(){
		if($this->session->userdata('LOGIN') == NULL){
			header("Location: ".base_url("connection.html"));
			return ;
		}
		$id = $this->input->get("id");
		$this->load->model("maison");
		$data["ID"] = $id;
		$data["maison"] = $this->maison->getMaisonByID($id);
		$this->load->view("templates/headerBack");
		$this->load->view("templates/supprimerMaison2", $data);
		$this->load->view("templates/footer");
	}

	public function modifierMaison(){
		if($this->session->userdata('LOGIN') == NULL){
			header("Location: ".base_url("connection.html"));
			return ;
		}
		$offset = $this->input->get("offset");
		//$this->load->model("type");
		$this->load->model("maison");
		//$data["type"] = $this->type->getTypeMaison();
		$data["maison"] = $this->maison->getMaison("", ($offset - 1)*4);
		$data["CUR"] = $offset;
		$data["NB"] = $this->maison->countMaison("");
		$this->load->view("templates/headerBack");
		$this->load->view("templates/modifierMaison", $data);
		$this->load->view("templates/footer");
	}

	public function inserer(){
		if($this->session->userdata('LOGIN') == NULL){
			header("Location: ".base_url("connection.html"));
			return ;
		}
		$this->load->model("maison");
		$idtype = $this->input->post("type");
		$idlocation = $this->input->post("location");
		$surface = $this->input->post("surface");
		$nbsalle = $this->input->post("nbsalle");
		$nbdouche = $this->input->post("nbdouche");
		$nbwc = $this->input->post("nbwc");
		$climat = $this->input->post("climat");
		$aircond = $this->input->post("aircond");
		$title = $this->input->post("title");
		$insert = $this->maison->insererMaison($idtype, $idlocation, $surface, $nbsalle, $nbdouche, $nbwc, $climat, $aircond, $title);
		$data["resultat"] = $insert;
		$this->load->view("templates/headerBack");
		$this->load->view("templates/resultatInserer", $data);
		$this->load->view("templates/footer");
	}

	public function supprimer(){
		if($this->session->userdata('LOGIN') == NULL){
			header("Location: ".base_url("connection.html"));
			return ;
		}
		$id = $this->input->get("id");
		$this->load->model("maison");
		$data["resultat"] = $this->maison->supprimerMaisonByID($id);
		$this->load->view("templates/headerBack");
		$this->load->view("templates/resultatSuppression", $data);
		$this->load->view("templates/footer");
	}

	public function modifierForm(){
		if($this->session->userdata('LOGIN') == NULL){
			header("Location: ".base_url("connection.html"));
			return ;
		}
		$id = $this->input->get("id");
		$this->load->model("maison");
		$data["maison"] = $this->maison->getMaisonByID($id);
		$this->load->view("templates/headerBack");
		$this->load->view("templates/modifierMaison2", $data);
		$this->load->view("templates/footer");
	}

	public function modifier(){
		if($this->session->userdata('LOGIN') == NULL){
			header("Location: ".base_url("connection.html"));
			return ;
		}
		$id = $this->input->get("id");
		$surface = $this->input->post("surface");
		$nbsalle = $this->input->post("nbsalle");
		$nbdouche = $this->input->post("nbdouche");
		$nbwc = $this->input->post("nbwc");
		$climat = $this->input->post("climat");
		$aircond = $this->input->post("aircond");
		$title = $this->input->post("title");
		$this->load->model("maison");
		$data["resultat"] = $this->maison->updateInfoMaison($id, $surface, $nbsalle, $nbdouche, $nbwc, $climat, $aircond, $title);
		$this->load->view("templates/headerBack");
		$this->load->view("templates/resultatModifier", $data);
		$this->load->view("templates/footer");
	}

	public function modifierImageForm(){
		if($this->session->userdata('LOGIN') == NULL){
			header("Location: ".base_url("connection.html"));
			return ;
		}
		$id = $this->input->get("id");
		$this->load->model("maison");
		$data["id"] = $id;
		$data["maison"] = $this->maison->getMaisonByID($id);
		$this->load->view("templates/headerBack");
		$this->load->view("templates/modifierImage", $data);
		$this->load->view("templates/footer");
	}

	public function modifierImage(){
		if($this->session->userdata('LOGIN') == NULL){
			header("Location: ".base_url("connection.html"));
			return ;
		}
		$id = $this->input->get("id");
		$this->load->model("maison");
		$data["resultat"] = $this->maison->updateImage($id);
		$data["id"] = $id;
		$this->load->view("templates/headerBack");
		$this->load->view("templates/resultatModifier", $data);
		$this->load->view("templates/footer");
	}
}