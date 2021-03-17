<?php
class Aduan_model extends CI_Model
{
    function get_aduan()
    {
        $query = "SELECT `aduan`.*,`data_mahasiswa`.*, `status`.`status`,`kategori_aduan`.`jenis_aduan` FROM `aduan` INNER JOIN `data_mahasiswa` ON `aduan`.`nim` = `data_mahasiswa`.`nim` INNER JOIN `kategori_aduan` ON `aduan`.`id_kategori` = `kategori_aduan`.`id` INNER JOIN `status` ON`aduan`.`id_status` = `status`.`id`";
        return $this->db->query($query)->result_array();
    }
    function get_info($limit, $start)
    {
        $query = "SELECT * FROM `data_info` ORDER BY `date_created` DESC LIMIT $limit OFFSET $start";
        return $this->db->query($query)->result_array();
    }
    function get_info_all()
    {
        $query = "SELECT * FROM `data_info` ORDER BY `date_created` DESC";
        return $this->db->query($query)->result_array();
    }
    function aduan_Perhari()
    {
        $query = "SELECT COUNT(`no_aduan`)  FROM `aduan` WHERE `date_created` = date(now())";
        return $this->db->query($query)->result_array();
    }
    function aduan_Perminggu()
    {
        $query = "SELECT COUNT(`no_aduan`) FROM `aduan` WHERE YEARWEEK(date_created)=YEARWEEK(NOW())";
    }
    function Approved()
    {
        $query = "SELECT COUNT(`no_aduan`) FROM `aduan` WHERE `id_status`= 1";
        return $this->db->query($query)->result_array();
    }
    function Pending()
    {
        $query = "SELECT COUNT(`no_aduan`) FROM `aduan` WHERE `id_status`= 2";
        return $this->db->query($query)->result_array();
    }
    function Reject()
    {
        $query = "SELECT COUNT(`no_aduan`) FROM `aduan` WHERE `id_status`= 3";
        return $this->db->query($query)->result_array();
    }
}
