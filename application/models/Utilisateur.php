<?php if(! defined('BASEPATH')) exit('No direct script access allowed');

class Utilisateur extends CI_Model{

	public function seConnecter($login, $mdp){
		$ret["ok"] = false;
		$ret["err"] = NULL;
		$sql = "select * from utilisateur where LOGIN = '%s' and MDP = '%s'";
		$sql = sprintf($sql, $login, $mdp);
		$query = $this->db->query($sql);
		$tmp = $query->result_array();
		if($tmp == NULL)
			$ret["err"] = "login ou mot de passe incorrect, veuillez vous reconnecter";
		else{
			$ret["ok"] = true;
			$this->session->set_userdata('LOGIN', $tmp[0]["LOGIN"]);
		}
		return $ret;
	}
}