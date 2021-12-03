<?php

Class ModelType extends CI_Model{
    public function addData($data){
        return $this->db->insert('tbl_type', $data);
    }
    public function getData(){
        return $this->db->get('tbl_type')->result_array();
    }
    public function updateData($data,$id_type){
        return $this->db->update('tbl_type', $data , array('id_type' => $id_type));
    }
    public function deleteData($id_type){
        return $this->db->delete('tbl_type', array('id_type' => $id_type));
    }
}