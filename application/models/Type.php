<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Type extends CI_Model{

	public function getTypeMaison(){
		$sql = "select IDTYPE, TYPE from type";
		$query = $this->db->query($sql);
		//var_dump($query->result_array());
		return $query->result_array();
	}
}
