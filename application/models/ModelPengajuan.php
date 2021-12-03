<?php

class ModelPengajuan extends CI_Model
{
    public function insertData($input_penilaian)
    {
        return $this->db->insert('tbl_penilaian_pengajuan', $input_penilaian);
    }

    public function getDataPenilaian($id)
    {
        return $this->db->get_where('tbl_penilaian_pengajuan', array('id_penilaian' => $id))->row_array();
    }

    public function insertNormalisasi($data)
    {
        return $this->db->insert('tbl_normalisasi', $data);
    }

    public function updateNormalisasi($data, $id)
    {
        return $this->db->update('tbl_normalisasi', $data, array('id_penilaian' => $id));
    }

    public function updateData($updateStatusPengajuan, $id)
    {
        return $this->db->update('tbl_penilaian_pengajuan', $updateStatusPengajuan, array('id_penilaian' => $id));
    }
    public function getDataRiwayat($id_users)
    {
        $sql = "SELECT * FROM tbl_penilaian_pengajuan,tbl_normalisasi,tbl_users,tbl_detail_users,tbl_mobil,tbl_gambar_mobil,tbl_detail_mobil,tbl_type,tbl_merk,tbl_konfirmasi
                WHERE
                tbl_mobil.id_merk = tbl_merk.id_merk and
                tbl_mobil.id_type = tbl_type.id_type and
                tbl_normalisasi.id_penilaian     = tbl_penilaian_pengajuan.id_penilaian AND
                tbl_detail_mobil.id_mobil        = tbl_mobil.id_mobil and
                tbl_gambar_mobil.id_mobil        = tbl_mobil.id_mobil and
                tbl_penilaian_pengajuan.id_users = tbl_users.id_users and
                tbl_konfirmasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian and
                tbl_penilaian_pengajuan.id_mobil = tbl_mobil.id_mobil and
                tbl_users.id_users = tbl_detail_users.id_users AND
                tbl_penilaian_pengajuan.id_users = ?";
        return $this->db->query($sql, $id_users)->result_array();
    }
    public function getDataKonfirmasiCustomer()
    {

        $sql = "SELECT * FROM  tbl_normalisasi,tbl_penilaian_pengajuan,tbl_users,tbl_detail_users,tbl_mobil,tbl_detail_mobil,tbl_sub_kriteria,tbl_gambar_mobil,tbl_type,tbl_merk
        WHERE
        tbl_mobil.id_merk  = tbl_merk.id_merk and
        tbl_mobil.id_type  = tbl_type.id_type and
        tbl_gambar_mobil.id_mobil = tbl_mobil.id_mobil and
        tbl_penilaian_pengajuan.nilai_jangka = tbl_sub_kriteria.id_sub_kriteria and
        tbl_detail_mobil.id_mobil   = tbl_mobil.id_mobil and
        tbl_penilaian_pengajuan.id_mobil = tbl_mobil.id_mobil and
        tbl_normalisasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian and
        tbl_penilaian_pengajuan.id_users = tbl_users.id_users and
        tbl_detail_users.id_users = tbl_users.id_users order by status ASC";
        return $this->db->query($sql)->result_array();
    }

    public function getDataPengajuanByIdUsers($id_users)
    {
        $sql = "SELECT * FROM tbl_penilaian_pengajuan WHERE
                    id_users = ? ORDER BY id_penilaian DESC";
        return $this->db->query($sql, $id_users)->row_array();
    }
    public function updateIsEmail($updateEmail, $idNormalisasi)
    {
        return $this->db->update('tbl_normalisasi', $updateEmail, array('id_normalisasi' => $idNormalisasi));
    }
    public function getDataLaporan($month, $year)
    {
        $sql = "SELECT * FROM  tbl_penilaian_pengajuan,tbl_detail_users,tbl_users
                    WHERE
                    tbl_penilaian_pengajuan.id_users = tbl_users.id_users and
                    tbl_detail_users.id_users = tbl_users.id_users and
                    month(tanggal_pengajuan) = ? and year(tanggal_pengajuan) = ?
                    ";
        return $this->db->query($sql, array($month, $year))->result_array();
    }
    public function getDataLayakCount($status_pengajuan)
    {
        return $this->db->get_where('tbl_normalisasi', array('status_pengajuan' => $status_pengajuan))->result_array();
    }
    public function getDataTidakLayakCount($status_pengajuan)
    {
        return $this->db->get_where('tbl_normalisasi', array('status_pengajuan' => $status_pengajuan))->result_array();
    }
    public function getDataPengajuan()
    {
        return $this->db->get('tbl_penilaian_pengajuan')->result_array();
    }
    public function getDataPengajuanCustomer()
    {
        $sql = "SELECT * FROM  tbl_normalisasi,tbl_penilaian_pengajuan,tbl_users,tbl_detail_users,tbl_mobil,tbl_detail_mobil,tbl_sub_kriteria,tbl_gambar_mobil,tbl_type,tbl_merk,tbl_konfirmasi
    WHERE
    tbl_mobil.id_merk  = tbl_merk.id_merk and
    tbl_mobil.id_type  = tbl_type.id_type and
    tbl_gambar_mobil.id_mobil = tbl_mobil.id_mobil and
    tbl_penilaian_pengajuan.nilai_jangka = tbl_sub_kriteria.id_sub_kriteria and
    tbl_konfirmasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian and
    tbl_detail_mobil.id_mobil   = tbl_mobil.id_mobil and
    tbl_penilaian_pengajuan.id_mobil = tbl_mobil.id_mobil and
    tbl_normalisasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian and
    tbl_penilaian_pengajuan.id_users = tbl_users.id_users and
    tbl_detail_users.id_users = tbl_users.id_users order by tbl_penilaian_pengajuan.id_penilaian DESC";
        return $this->db->query($sql)->result_array();
    }
    public function getDataPengajuanByIdUsers2($id_users)
    {
        $sql = "SELECT * FROM tbl_penilaian_pengajuan WHERE
                    id_users = ? ORDER BY id_penilaian DESC";
        return $this->db->query($sql,$id_users)->row_array();
        // return $this->db->get_where('tbl_penilaian_pengajuan', array('id_users' => $id_users))->row_array();
    }
    public function getDataPengajuanByIdUsers3($id_users)
    {
        $sql = "SELECT * FROM tbl_normalisasi,tbl_penilaian_pengajuan WHERE
                    tbl_normalisasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian AND
                    id_users = ? ORDER BY tbl_penilaian_pengajuan.id_penilaian DESC";
        return $this->db->query($sql,$id_users)->row_array();
        // return $this->db->get_where('tbl_penilaian_pengajuan', array('id_users' => $id_users))->row_array();
    }
    public function deleteDataPengajuan($id_penilaian)
    {
        return $this->db->delete('tbl_penilaian_pengajuan', array('id_penilaian' => $id_penilaian));
    }
    public function updateDataPengajuan($data, $id_penilaian)
    {
        return $this->db->update('tbl_penilaian_pengajuan', $data, array('id_penilaian' => $id_penilaian));
    }

    public function insertKonfirmasi($insertKonfirmasi)
    {
        return $this->db->insert('tbl_konfirmasi', $insertKonfirmasi);
    }
    public function updateKonfirmasi($updateKonfirmasi, $id)
    {
        return $this->db->update('tbl_konfirmasi', $updateKonfirmasi, array('id_penilaian' => $id));
    }

    public function getDataMobilSingle($month, $year, $status)
    {
        $sql = "SELECT * FROM tbl_normalisasi 
                JOIN tbl_penilaian_pengajuan ON tbl_normalisasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian 
                JOIN tbl_mobil ON tbl_penilaian_pengajuan.id_mobil = tbl_mobil.id_mobil WHERE
                MONTH(tanggal_pengajuan) = ? AND
                YEAR(tanggal_pengajuan) = ? AND
                status_pengajuan > ? GROUP BY tbl_penilaian_pengajuan.id_mobil";
        return $this->db->query($sql, array($month, $year, $status))->result_array();
    }
    public function getCountMobil($idMobil, $status, $month, $year)
    {
        $sql = "SELECT * FROM tbl_normalisasi
                JOIN tbl_penilaian_pengajuan ON tbl_normalisasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian 
                JOIN tbl_mobil ON tbl_penilaian_pengajuan.id_mobil = tbl_mobil.id_mobil 
                WHERE tbl_penilaian_pengajuan.id_mobil = ? AND status_pengajuan > ? and month(tanggal_pengajuan) = ? and year(tanggal_pengajuan) = ?
               ";
        return $this->db->query($sql, array($idMobil, $status, $month, $year))->result_array();
    }

    public function getCountingDp($month, $year, $id_sub, $status)
    {
        $sql = "SELECT * FROM tbl_normalisasi 
                    JOIN tbl_penilaian_pengajuan ON tbl_normalisasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian 
                    WHERE 
                        nilai_dp = ? AND
                        status_pengajuan > ? and
                        month(tanggal_pengajuan) = ? and
                        year(tanggal_pengajuan) = ?";
        return $this->db->query($sql, array($id_sub, $status, $month, $year))->result_array();
    }

    public function getCountingtenor($month, $year, $id_sub, $status)
    {
        $sql = "SELECT * FROM tbl_normalisasi 
    JOIN tbl_penilaian_pengajuan ON tbl_normalisasi.id_penilaian = tbl_penilaian_pengajuan.id_penilaian 
    WHERE 
        nilai_jangka = ? AND
        status_pengajuan > ? and
        month(tanggal_pengajuan) = ? and
        year(tanggal_pengajuan) = ?";
        return $this->db->query($sql, array($id_sub, $status, $month, $year))->result_array();
    }
    public function getDataPengajuanIdUsers($id_users)
    {
        $sql = "SELECT * FROM tbl_penilaian_pengajuan WHERE
            id_users = ?";
        return $this->db->query($sql, $id_users)->row_array();
    }
}
