<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Maison extends CI_Model{

	public function getMaison($type, $offset){
		$sql = "select m.IDMAISON, t.TYPE, l.LOCATION, m.IMAGE, m.TITLE from maison m join type t on m.IDTYPE = t.IDTYPE join location l on m.IDLOCATION = l.IDLOCATION where m.IDTYPE like '%s' and m.ETAT = 1 limit 4 offset %s ";
		$sql = sprintf($sql, $type."%", $offset);
		//$sql = "select * from type";
		//echo $sql;
		$query = $this->db->query($sql);
		//var_dump($query->result_array());
		return $query->result_array();
	}

	function getMaisonByID($id){
		$sql = "select m.IDMAISON, m.IDTYPE, t.TYPE, m.IDLOCATION, l.LOCATION, m.SURFACE, m.NOMBRESALLE, m.NOMBREDOUCHE, m.NOMBREWC, m.CLIMATISATION, m.AIRCONDITIONNE, m.IMAGE, m.TITLE, m.IMAGE from maison m join type t on m.IDTYPE = t.IDTYPE join location l ON m.IDLOCATION = l.IDLOCATION where IDMAISON = '%s'";
		$sql = sprintf($sql, $id);
		$query = $this->db->query($sql);
		$ret = $query->result_array();
		//var_dump($ret);
		return $ret;
	}

	function supprimerMaisonByID($id){
		$sql = "update maison set ETAT = 0 where IDMAISON = '%s' ";
		$sql = sprintf($sql, $id);
		$query = $this->db->query($sql);
		//var_dump($query);
		return $query;
	}

	public function countMaison($type){
		$sql = "select count(*)/4 as NB from maison m join type t on m.IDTYPE = t.IDTYPE join location l on m.IDLOCATION = l.IDLOCATION where m.IDTYPE like '%s' and m.ETAT = 1";
		$sql = sprintf($sql, "%".$type."%");
		$query = $this->db->query($sql);
		$nb = $query->result_array();
		$inttmp = (int) $nb[0]["NB"];
		//echo $nb[0]["NB"];
		//echo $sql;
		$floattmp = (float) $nb[0]["NB"];
		$floattmp2 = (float) $inttmp;
		if($floattmp2 < $floattmp)$inttmp++;
		return $inttmp;
	}

	public function countMaisonTotal(){
		$sql = "select count(*) as NB from maison";
		$query = $this->db->query($sql);
		$nb =  $query->result_array();
		return (int) $nb[0]["NB"];
	}

	public function rechercheIndexer($key, $offset){
		$sql = "select m.IDMAISON, t.TYPE, l.LOCATION, m.IMAGE, m.TITLE from maison m join location l on m.IDLOCATION = l.IDLOCATION join type t on m.IDTYPE = t.IDTYPE where IDMAISOn in ( select IDMAISON from maisonindex where MOTINDEX like '%s' and ETAT = 1) limit 4 offset %s";
		$sql = sprintf($sql, "%".$key."%", $offset);
		$query = $this->db->query($sql);
		//var_dump($query->result_array());
		return $query->result_array();
	}

	public function countresultat($key){
		$sql = "select count(*)/4 as NB from maison m join location l on m.IDLOCATION = l.IDLOCATION join type t on m.IDTYPE = t.IDTYPE where IDMAISOn in ( select IDMAISON from maisonindex where MOTINDEX like '%s' and ETAT = 1) ";
		$sql = sprintf($sql, "%".$key."%");
		$query = $this->db->query($sql);
		$nb = $query->result_array();
		//var_dump($nb);
		$inttmp = (int) $nb[0]["NB"];
		//echo $inttmp;
		$floattmp = (float) $nb[0]["NB"];
		$floattmp2 = (float) $inttmp;
		if($floattmp2 < $floattmp)$inttmp++;
		//echo $inttmp;
		return $inttmp;
	}

	public function getDernierIdMaison(){
		$nb = $this->countMaisonTotal();
		$nb++;
		if($nb < 9) "0".$nb;
		return "maison".$nb;
	}

	public function insererMaison($idtype, $idlocation, $surface, $nbsalle, $nbdouche, $nbwc, $clim, $aircond, $title){
		try{
			$ret["erreur"] = NULL;
			$ret["succes"] = false;
			$ret["valeur"] = NULL;
			$name = $_FILES["image"]["name"];
			$tmp = $_FILES["image"]["tmp_name"];
			//echo "<p>name : ".$name."</p>";
			//echo "<p>size : ".$_FILES["image"]["size"]."</p>";
			//echo "<p>error : ".$_FILES["image"]["error"]."</p>";
			$ret["valeur"]["idtype"] = $idtype;
			$ret["valeur"]["idlocation"] = $idlocation;
			$ret["valeur"]["surface"] = $surface;
			$ret["valeur"]["nbsalle"] = $nbsalle;
			$ret["valeur"]["nbdouche"] = $nbdouche;
			$ret["valeur"]["nbwc"] = $nbwc;
			$ret["valeur"]["clim"] = $clim;
			$ret["valeur"]["aircond"] = $aircond;
			$ret["valeur"]["title"] = $title;
			if(!is_numeric($surface)){
				$ret["erreur"] = "la surface doit etre un nombre";
				return $ret;
			}
			if(!is_numeric($nbsalle)){
				$ret["erreur"] = "le nombre de salle doit etre un nombre";
				return $ret;
			}
			if(!is_numeric($nbdouche)){
				$ret["erreur"] = "le nombre de douche doit etre un nombre";
				return $ret;
			}
			if(!is_numeric($nbwc)){
				$ret["erreur"] = "le nombre de wc doit etre un nombre";
				return $ret;
			}
			if(!is_numeric($clim) || $clim > 1 || $clim < 0){
				$ret["erreur"] = "la valeur de climatisation doit etre le nombre 0 pour \"non\" et 1 pour \"oui\" ";
				return $ret;
			}
			if(!is_numeric($aircond) || $aircond > 1 || $aircond < 0){
				$ret["erreur"] = "la valeur de air conditionne doit etre le nombre 0 pour \"non\" et 1 pour \"oui\" ";
				return $ret;
			}
			if($_FILES["image"]["error"] > 0){
				$ret["erreur"] = "l'image est trop grande";
				return $ret;
			}
			//echo "<p>tmp_name : ".$_FILES["image"]["tmp_name"]."</p>";
			//echo "<p>error : ".$_FILES["image"]["UPLOAD_ERR_NO_FILE "]."</p>";
			//if ($_FILES['image']['size'] > $maxsize) $erreur = "Le fichier est trop gros";
			if($this->verifierExtension($name)){
				if($this->verifierDimension($tmp)){
					$move = move_uploaded_file($_FILES["image"]["tmp_name"], "assets/images/".$name);
					$idmaison = $this->getDernierIdMaison();
					$sql = "insert into maison values ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', 1)";
					$sql = sprintf($sql, $idmaison, $idtype, $idlocation, $surface, $nbsalle, $nbdouche, $nbwc, $clim, $aircond, $name, $title);
					$ret["succes"] = $this->db->query($sql);
				}
				else
					$ret["erreur"] = "une image de taille maximale 251x237 est conseiller";
			}
			else
				$ret["erreur"] = "extension non valide";
			return $ret;
			//echo $sql;
			//var_dump($query);
			//return $query;
		}
		catch(Exception $ex){
			var_dump($ex);
			echo $ex->getMessage();
		}
	}

	public function updateInfoMaison($idmaison, $surface, $nbsalle, $nbdouche, $nbwc, $climat, $aircond, $title){
		$sql = "update maison set SURFACE = '%s', NOMBRESALLE = '%s', NOMBREDOUCHE = '%s', NOMBREWC = '%s', CLIMATISATION = '%s', AIRCONDITIONNE = '%s', TITLE = '%s' where IDMAISON = '%s'";
		$sql = sprintf($sql, $surface, $nbsalle, $nbdouche, $nbwc, $climat, $aircond, $title, $idmaison);
		$query = $this->db->query($sql);
		return $query;
	}

	public function verifierExtension($nom){
		$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
		$extension_upload = strtolower(  substr(  strrchr($nom, '.')  ,1)  );
		return in_array($extension_upload,$extensions_valides);		
	}

	public function verifierDimension($chemin){
		$ret = true;
		$image_sizes = getimagesize($chemin);
		if ($image_sizes[0] > 251 OR $image_sizes[1] > 237) $ret = false;
		return $ret;
	}

	public function updateImage($idmaison){
		try{
			$ret["erreur"] = NULL;
			$ret["succes"] = false;
			$name = $_FILES["image"]["name"];
			$tmp = $_FILES["image"]["tmp_name"];
			//echo "<p>name : ".$name."</p>";
			//echo "<p>size : ".$_FILES["image"]["size"]."</p>";
			//echo "<p>error : ".$_FILES["image"]["error"]."</p>";
			if($_FILES["image"]["error"] > 0){
				$ret["erreur"] = "l'image est trop grande";
				return $ret;
			}
			//echo "<p>tmp_name : ".$_FILES["image"]["tmp_name"]."</p>";
			//echo "<p>error : ".$_FILES["image"]["UPLOAD_ERR_NO_FILE "]."</p>";
			//if ($_FILES['image']['size'] > $maxsize) $erreur = "Le fichier est trop gros";
			if($this->verifierExtension($name))
				if($this->verifierDimension($tmp)){
					$move = move_uploaded_file($tmp, "assets/images/".$name);
					$sql = "update maison set IMAGE = '%s' where IDMAISON = '%s'";
					$sql = sprintf($sql, $name, $idmaison);
					$ret["succes"] = $this->db->query($sql);
				}
				else
					$ret["erreur"] = "une image de taille maximale 251x237 est conseiller";
			else
				$ret["erreur"] = "extension non valide";
			return $ret;
		}
		catch(Exception $ex){
			echo $ex->getMessage();
		}
	}
}