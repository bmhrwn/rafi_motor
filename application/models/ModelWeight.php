<?php

class ModelWeight extends CI_Model
{

    public function getData($is_approve)
    {
        $sql = "SELECT * FROM  tbl_normalisasi,tbl_penilaian_pengajuan,tbl_users,tbl_detail_users
                        WHERE
                        tbl_normalisasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian and
                        tbl_penilaian_pengajuan.id_users = tbl_users.id_users and
                        tbl_detail_users.id_users = tbl_users.id_users AND
                        is_approve = ? ORDER BY nilai_vector_v DESC";
        return $this->db->query($sql, $is_approve)->result_array();
    }
    public function getDataHitung($status)
    {
        $sql = "SELECT * FROM  tbl_normalisasi,tbl_penilaian_pengajuan,tbl_users,tbl_detail_users
                        WHERE
                        tbl_normalisasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian and
                        tbl_penilaian_pengajuan.id_users = tbl_users.id_users and
                        tbl_detail_users.id_users = tbl_users.id_users and
                        tbl_normalisasi.status_pengajuan >= ? ORDER BY nilai_vector_v DESC";
        return $this->db->query($sql,$status)->result_array();
    }


    public function getDataPenilaian()
    {
        $sql = "SELECT * FROM  tbl_normalisasi,tbl_penilaian_pengajuan,tbl_users,tbl_detail_users,tbl_mobil,tbl_type,tbl_merk,tbl_detail_mobil,tbl_gambar_mobil,tbl_konfirmasi
                        WHERE
                        tbl_gambar_mobil.id_mobil = tbl_mobil.id_mobil and
                        tbl_detail_mobil.id_mobil = tbl_mobil.id_mobil and
                        tbl_penilaian_pengajuan.id_mobil = tbl_mobil.id_mobil and
                        tbl_mobil.id_merk       = tbl_merk.id_merk and
                        tbl_konfirmasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian and
                        tbl_mobil.id_type       = tbl_type.id_type and
                        tbl_normalisasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian and
                        tbl_penilaian_pengajuan.id_users = tbl_users.id_users and
                        tbl_detail_users.id_users = tbl_users.id_users AND
                        nilai_vector_s > 0 and
                        status_pengajuan > 2 ORDER BY nilai_vector_v DESC";
        return $this->db->query($sql)->result_array();
    }

    public function getDataPenilaianByStatus($status)
    {
        $sql = "SELECT * FROM  tbl_normalisasi,tbl_penilaian_pengajuan,tbl_users,tbl_detail_users,tbl_mobil,tbl_type,tbl_merk,tbl_detail_mobil,tbl_gambar_mobil,tbl_konfirmasi
                        WHERE
                        tbl_gambar_mobil.id_mobil = tbl_mobil.id_mobil and
                        tbl_detail_mobil.id_mobil = tbl_mobil.id_mobil and
                        tbl_penilaian_pengajuan.id_mobil = tbl_mobil.id_mobil and
                        tbl_mobil.id_merk       = tbl_merk.id_merk and
                        tbl_konfirmasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian and
                        tbl_mobil.id_type       = tbl_type.id_type and
                        tbl_normalisasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian and
                        tbl_penilaian_pengajuan.id_users = tbl_users.id_users and
                        tbl_detail_users.id_users = tbl_users.id_users AND
                        nilai_vector_s > 0 and
                        status_pengajuan = ? ORDER BY nilai_vector_v DESC";
        return $this->db->query($sql, $status)->result_array();
    }

    public function getTotalVectorS($status)
    {
        $sql = "SELECT SUM(nilai_vector_s)as total FROM tbl_normalisasi 
                    WHERE status_pengajuan >= ?";
        return $this->db->query($sql,$status)->row_array();
    }

    public function updateVectorV($data, $id_normalisasi)
    {
        return $this->db->update_batch('tbl_normalisasi', $data, $id_normalisasi);
    }

    public function getDataMenyetujui($approve)
    {
        $sql = "SELECT * FROM  tbl_normalisasi,tbl_penilaian_pengajuan,tbl_users,tbl_detail_users,tbl_mobil,tbl_type,tbl_merk,tbl_detail_mobil,tbl_gambar_mobil,tbl_konfirmasi
                        WHERE
                        tbl_gambar_mobil.id_mobil = tbl_mobil.id_mobil and
                        tbl_detail_mobil.id_mobil = tbl_mobil.id_mobil and
                        tbl_penilaian_pengajuan.id_mobil = tbl_mobil.id_mobil and
                        tbl_mobil.id_merk       = tbl_merk.id_merk and
                        tbl_mobil.id_type       = tbl_type.id_type and
                        tbl_konfirmasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian and
                        tbl_normalisasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian and
                        tbl_penilaian_pengajuan.id_users = tbl_users.id_users and
                        tbl_detail_users.id_users = tbl_users.id_users AND
                        is_approve = ? ORDER BY id_normalisasi DESC";
        return $this->db->query($sql, $approve)->result_array();
    }
    public function changeAprrove($data, $id_penilaian)
    {
        return $this->db->update('tbl_normalisasi', $data, array('id_penilaian' => $id_penilaian));
    }
}
