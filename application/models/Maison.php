<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Maison extends CI_Model{

	public function getMaison($type, $offset){
		$sql = "select m.IDMAISON, t.TYPE, l.LOCATION, m.IMAGE, m.TITLE from maison m join type t on m.IDTYPE = t.IDTYPE join location l on m.IDLOCATION = l.IDLOCATION where m.IDTYPE like '%s' limit 4 offset %s ";
		$sql = sprintf($sql, $type."%", $offset);
		//$sql = "select * from type";
		//echo $sql;
		$query = $this->db->query($sql);
		//var_dump($query->result_array());
		return $query->result_array();
	}

	public function countMaison($type){
		$sql = "select count(*)/4 as NB from maison m join type t on m.IDTYPE = t.IDTYPE join location l on m.IDLOCATION = l.IDLOCATION where m.IDTYPE like '%s'";
		$sql = sprintf($sql, $type);
		$query = $this->db->query($sql);
		$nb = $query->result_array();
		$inttmp = (int) $nb[0]["NB"];
		$floattmp = (float) $nb[0]["NB"];
		$floattmp2 = (float) $inttmp;
		if($floattmp2 < $floattmp)$inttmp++;
		return $inttmp;
	}

	public function rechercheIndexer($key, $offset){
		$sql = "select m.IDMAISON, t.TYPE, l.LOCATION, m.IMAGE, m.TITLE from maison m join location l on m.IDLOCATION = l.IDLOCATION join type t on m.IDTYPE = t.IDTYPE where IDMAISOn in ( select IDMAISON from maisonindex where MOTINDEX like '%s') limit 4 offset %s";
		$sql = sprintf($sql, "%".$key."%", $offset);
		$query = $this->db->query($sql);
		//var_dump($query->result_array());
		return $query->result_array();
	}

	public function countresultat($key){
		$sql = "select count(*)/4 as NB from maison m join location l on m.IDLOCATION = l.IDLOCATION join type t on m.IDTYPE = t.IDTYPE where IDMAISOn in ( select IDMAISON from maisonindex where MOTINDEX like '%s') ";
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
		$nb = $this->countMaison();
		$retour = $nb["NB"];
		$retour++;
		return "maison".$retour;
	}

	public function insertMaison($idtype, $idlocation, $surface, $nbsalle, $nbdouche, $nbwc, $clim, $aircond, $image){
		$idmaison = $this->getDernierIdMaison();
		$sql = "insert into maison values ('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')";
		$sql = sprintf($sql, $idmaison, $idtype, $idlocation, $surface, $nbsalle, $nbdouche, $nbwc, $clim, $aircond, $image);
		echo $sql;
	}
}
