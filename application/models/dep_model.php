<?php
class Dep_Model extends CI_Model{
public function saveDepartment($data){

$this->db->insert('tbl_dep', $data);
	
}


public function getAllDepartmentData(){

$this->db->select('*');
$this->db->from('tbl_dep');
$this->db->order_by('depid', 'desc');
$qresult = $this->db->get();
$result = $qresult->result();
return $result;


}

public function getDepartmentById($depid){
$this->db->select('*');
$this->db->from('tbl_dep');
$this->db->where('depid', $depid);
$qresult = $this->db->get();
$result = $qresult->row();
return $result;


}

public function updateDepName($data){

	$this->db->set("depname", $data['depname']);
	$this->db->set("depid", $data['depid']);
	$this->db->set("deparea", $data['depcode']);
	$this->db->where("depcode", $data['depcode']);
	$this->db->update('tbl_dep');
}


public function delDepartmentById($depid){
	$this->db->where('depid', $depid);
	$this->db->delete(tbl_dep);



}

public function getDepartment($sdepid){
	$this->db->select('*');
	$this->db->from('tbl_dep');
	$this->db->where('depid', $sdepid);
	$qresult = $this->db->get();
	$result = $qresult->row();
	return $result;

}


}