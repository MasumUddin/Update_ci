<?php
class Manage_Model extends CI_Model{
public function saveStudent($data){

$this->db->insert('tbl_student', $data);
	
}
public function getBookByDep($dep){
$this->db->select('*');
$this->db->from('tbl_book');
$this->db->where('dep', $dep);
$qresult = $this->db->get();
$result = $qresult->result();
return $result;




}