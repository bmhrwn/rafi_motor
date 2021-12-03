<?php

Class ModelMobil extends CI_Model{
    public function getData(){
        $sql = "SELECT * from tbl_mobil,tbl_merk,tbl_type,tbl_detail_mobil,tbl_gambar_mobil
                WHERE
                tbl_mobil.id_mobil = tbl_detail_mobil.id_mobil and
                tbl_mobil.id_mobil = tbl_gambar_mobil.id_mobil and
                tbl_mobil.id_merk = tbl_merk.id_merk and
                tbl_mobil.id_type = tbl_type.id_type ORDER BY tbl_mobil.id_mobil DESC";
                return $this->db->query($sql)->result_array();
    }
    public function getDataByIdMerk($id_merk,$id_mobil){
        $sql = "SELECT * from tbl_mobil,tbl_merk,tbl_type,tbl_detail_mobil,tbl_gambar_mobil
                WHERE
                tbl_mobil.id_mobil = tbl_detail_mobil.id_mobil and
                tbl_mobil.id_mobil = tbl_gambar_mobil.id_mobil and
                tbl_mobil.id_merk = tbl_merk.id_merk and
                tbl_mobil.id_type = tbl_type.id_type AND
                tbl_mobil.id_merk = ? AND
                tbl_mobil.id_mobil != ? ORDER BY tbl_mobil.id_mobil DESC LIMIT 3";
                return $this->db->query($sql,array($id_merk,$id_mobil))->result_array();
    }
    public function getProduct(){
        $sql = "SELECT * from tbl_mobil,tbl_merk,tbl_type
                WHERE
                tbl_mobil.id_merk = tbl_merk.id_merk and
                tbl_mobil.id_type = tbl_type.id_type order by id_mobil DESC ";
                return $this->db->query($sql)->result_array();
    }
    public function addData($data){
        return $this->db->insert('tbl_mobil' , $data);
    }
    public function deleteData($id_mobil){
        return $this->db->delete('tbl_mobil', array('id_mobil'  => $id_mobil));
    }
    public function getDataFotoById($id_mobil){
        return $this->db->get_where('tbl_mobil', array('id_mobil' => $id_mobil ))->row_array();
    }
    public function updateData($data, $id_mobil){
        return $this->db->update('tbl_mobil', $data , array('id_mobil' => $id_mobil));
    }
    public function getDetailMobil($id_mobil){
        $sql = "SELECT * from tbl_mobil,tbl_merk,tbl_type,tbl_detail_mobil,tbl_gambar_mobil
        WHERE
        tbl_mobil.id_mobil = tbl_detail_mobil.id_mobil and
        tbl_mobil.id_mobil = tbl_gambar_mobil.id_mobil and
        tbl_mobil.id_merk = tbl_merk.id_merk and
        tbl_mobil.id_type = tbl_type.id_type and 
        tbl_mobil.id_mobil = ? order by tbl_mobil.id_mobil DESC";
        return $this->db->query($sql,$id_mobil)->row_array();
    }

    public function getDataMobilLast(){
        $sql = "SELECT * FROM tbl_mobil ORDER BY id_mobil DESC ";
        return $this->db->query($sql)->row_array();
    }

    public function addGambar($addGambar){
        return $this->db->insert('tbl_gambar_mobil',$addGambar);
    }
    public function addDataDetail($datadetail){
        return $this->db->insert('tbl_detail_mobil' ,$datadetail);
    }
    public function getDataMobilCount(){
        return $this->db->get('tbl_mobil')->result_array();
    }

    public function updateGambar($addGambar,$id_mobil){
        return $this->db->update('tbl_gambar_mobil',$addGambar,array('id_mobil' => $id_mobil));
    }

    public function updateDetailMobil($datadetail, $id_mobil){
        return $this->db->update('tbl_detail_mobil',$datadetail,array('id_mobil' => $id_mobil));
    }

    public function getGambarMobil($id_mobil){
        return $this->db->get_where('tbl_gambar_mobil',array('id_mobil'=> $id_mobil))->row_array();
    }
    public function updateMobil($addmobil,$id_mobil){
        return $this->db->update('tbl_mobil', $addmobil, array('id_mobil' => $id_mobil));
    }
}