<?php 

Class ModelUsers extends CI_Model{
    public function getDataByUsername($username){
        return $this->db->get_where('tbl_users', array('username' => $username))->row_array();
    }
    public function getDataDetailUsers($email){
        return $this->db->get_where('tbl_detail_users', array('email' => $email))->row_array();
    }
    public function getDataDetailByIdUsers($db_id_users){
        $sql = "SELECT * from tbl_detail_users,tbl_users 
                WHERE
                tbl_detail_users.id_users  = tbl_users.id_users and
                 tbl_detail_users.id_users = ?";
        return $this->db->query($sql,$db_id_users)->row_array();
    }
    public function updateData($data,$id_detail){
        return $this->db->update('tbl_detail_users', $data, array('id_detail' => $id_detail));
    }
    public function getDataFotoById($id_detail){
        return $this->db->get_where('tbl_detail_users', array('id_detail' => $id_detail ))->row_array();
    }
    public function cekPasswordById($id_users){
        return $this->db->get_where('tbl_users', array('id_users' => $id_users))->row_array();
    }
    public function getDataByPassword($password_lama){
        return $this->db->get_where('tbl_users', array('password' => $password_lama))->row_array();
    }
    public function changePassword($data,$id_users){
        return $this->db->update('tbl_users', $data, array('id_users' => $id_users));
    }
    public function insertDataUsers($data){
        return $this->db->insert('tbl_users', $data);
    }
    public function insertDataDetailUsers($input_data){
        return $this->db->insert('tbl_detail_users', $input_data);
    }
    public function updateDataUsers($data,$id_users){
        return $this->db->update('tbl_detail_users',$data,array('id_users' => $id_users));
    }
}