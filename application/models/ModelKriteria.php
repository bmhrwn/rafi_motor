<?php 

Class ModelKriteria extends CI_Model{
    public function getDataBobot(){
        $sql = "SELECT SUM(bobot)as total_bobot from tbl_kriteria";
        return $this->db->query($sql)->row_array();
    }
    public function addData($data){
        return $this->db->insert('tbl_kriteria', $data);
    }
    public function getData(){
        $sql = "SELECT * from tbl_kriteria order by kode";
        return $this->db->query($sql)->result_array();
    }
    public function getDataBobotById($id_kriteria){
       return $this->db->get_where('tbl_kriteria',array('id_kriteria' =>$id_kriteria))->row_array();
    }
    public function updateData($data,$id_kriteria){
        return $this->db->update('tbl_kriteria', $data, array('id_kriteria' => $id_kriteria));
    }
    public function deleteDataById($id_kriteria){
        return $this->db->delete('tbl_kriteria', array('id_kriteria' => $id_kriteria));
    }
    public function getSubDataBobot($id_kriteria){
        $sql = "SELECT SUM(bobot)as total_bobot from tbl_sub_kriteria where id_kriteria = ?";
        return $this->db->query($sql,$id_kriteria)->row_array();
    }
    public function addDataSubKriteria($data){
        return $this->db->insert('tbl_sub_kriteria', $data);
    }
    public function getDataSubKriteria($id_kriteria){
        $sql = "SELECT * from tbl_sub_kriteria WHERE id_kriteria = ?";
        return $this->db->query($sql,$id_kriteria)->result_array();
    }
   public function getOldBobotById($id_kriteria){
       $sql = "SELECT SUM(bobot) as old_bobot from tbl_sub_kriteria where id_kriteria = ?";
       return $this->db->query($sql,$id_kriteria)->row_array();
   }
}