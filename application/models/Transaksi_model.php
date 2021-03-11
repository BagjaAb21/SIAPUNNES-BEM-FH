<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    public function BookingCode()
    {
        $this->db->select('RIGHT(transaction.booking_code,4) as kode_booking', FALSE);
        $this->db->order_by('kode_booking', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('transaction');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_booking) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 4, "0", STR_PAD_LEFT);
        $kodetampil = "BC" . $batas;
        return $kodetampil;
    }
    public function CourierCode($kurir)
    {
        $this->db->select('RIGHT(courier.resi,10) as kode_resi', FALSE);
        $this->db->order_by('kode_resi', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('courier');
        if ($query->num_rows() <> 0) {
            $data = $query->row();
            $kode = intval($data->kode_resi) + 1;
        } else {
            $kode = 1;
        }
        $batas = str_pad($kode, 10, "0", STR_PAD_LEFT);
        $kodetampil = $kurir . $batas;
        return $kodetampil;
    }
    public function get_transaction_list()
    {
    }
    public function getTransaction($limit, $start, $email)
    {
        $query = "SELECT `transaction`.*,`courier`.* FROM `transaction` JOIN `courier` ON `transaction`.`no_resi` = `courier`.`resi` where `email` = '$email' ORDER by `transaction_time` DESC LIMIT $limit OFFSET $start ";
        return $this->db->query($query)->result_array();
    }

    public function getResi($orderId)
    {
        $query = "SELECT `transaction`.*,`courier`.* FROM `transaction` JOIN `courier` ON `transaction`.`no_resi` = `courier`.`resi` WHERE `order_id`=$orderId";
        return $this->db->query($query)->result_array();
    }
}
