<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $this->load->model('Aduan_model');
        $data['title'] = 'Dashboard Admin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        //menjalankan function aduan model untuk menfilter data 
        $perhari = $this->Aduan_model->aduan_Perhari();
        $perminggu = $this->Aduan_model->aduan_Perminggu();
        $approved = $this->Aduan_model->Approved();
        $pending = $this->Aduan_model->Pending();
        $reject = $this->Aduan_model->Reject();

        //mengirim data ke views
        $data['totalAduan'] = $this->db->count_all('aduan');
        $data['aduanPerhari'] = $perhari[0]["COUNT(`no_aduan`)"];
        $data['aduanPerminggu'] = $perminggu[0]["COUNT(`no_aduan`)"];
        $data['approved'] = $approved[0]["COUNT(`no_aduan`)"];
        $data['pending'] = $pending[0]["COUNT(`no_aduan`)"];
        $data['reject'] = $reject[0]["COUNT(`no_aduan`)"];
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
}
