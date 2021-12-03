<?php

Class ModelMerk extends CI_Model{
    public function getData(){
        return $this->db->get('tbl_merk')->result_array();
    }
    public function addData($data){
        return $this->db->insert('tbl_merk',$data);
    }
    public function updateData($data,$id_merk){
        return $this->db->update('tbl_merk', $data,array('id_merk' => $id_merk));
    }
    public function deleteData($id_merk){
        return $this->db->delete('tbl_merk', array('id_merk' => $id_merk));
    }
}