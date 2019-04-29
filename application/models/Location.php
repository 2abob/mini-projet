<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Location extends CI_Model{

	public function getLocationMaison(){
		$sql = "select IDLOCATION, LOCATION from location";
		$query = $this->db->query($sql);
		//var_dump($query->result_array());
		return $query->result_array();
	}
}
