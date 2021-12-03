<?php

Class ModelSubKriteria extends CI_Model{
    public function getOldBobotById($id_kriteria){
        $sql = "SELECT SUM(bobot) as old_total_bobot from tbl_sub_kriteria where id_kriteria = ?";
        return $this->db->query($sql,$id_kriteria)->row_array();
    }
    public function getBobotByIdSubKriteria($id_sub_kriteria){
      return $this->db->get_where('tbl_sub_kriteria', array('id_sub_kriteria'   => $id_sub_kriteria))->row_array();
    }
    public function updateDataSubByIdSub($data,$id_sub_kriteria){
        return $this->db->update('tbl_sub_kriteria', $data, array('id_sub_kriteria' => $id_sub_kriteria));
    }

    public function getDataSubById($id_kriteria){
        return $this->db->get_where('tbl_sub_kriteria', array('id_kriteria'=> $id_kriteria))->result_array();
    }

    public function getDetailNilaiSubKriteria($id_nilai){
        return $this->db->get_where('tbl_sub_kriteria',array('id_sub_kriteria' => $id_nilai))->row_array();
    }
    public function getDetailMobil($id_mobil){
        return $this->db->get_where('tbl_mobil', array('id_mobil' => $id_mobil))->row_array();
    }
    public function deleteData($id_sub_kriteria){
        return $this->db->delete('tbl_sub_kriteria' , array('id_sub_kriteria' => $id_sub_kriteria));
    }
}