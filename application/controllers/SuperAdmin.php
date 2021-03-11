<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $this->load->model('Aduan_model');
        $data['title'] = 'Dashboard';
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
        $this->load->view('superadmin/index', $data);
        $this->load->view('templates/footer');
    }
    public function role()
    {

        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New role added!</div>');
            redirect('superadmin/role');
        }
    }
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id!=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/roleAccess', $data);
        $this->load->view('templates/footer');
    }
    public function updateRole()
    {
        $this->form_validation->set_rules('updaterole', 'updaterole', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar');
            $this->load->view('superadmin/index');
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $updaterole = $this->input->post('updaterole');

            $this->db->where('id', $id);
            $this->db->update('user_role', ['role' => $updaterole]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been edited!</div>');
            redirect('superadmin/role');
        }
    }
    public function deleteRole($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu has been deleted!</div>');
        redirect('superadmin/role');
    }

    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];
        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Access Changed!</div>');
    }

    public function dataAdmin()
    {
        $data['title'] = 'Data Admin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['dataAdmin'] = $this->db->get_where('user', ['role_id' => 2])->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/dataAdmin', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New role added!</div>');
            redirect('superadmin/role');
        }
    }

    public function tambahAdmin()
    {
        $data['title'] = 'Data Admin';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['dataAdmin'] = $this->db->get_where('user', ['role_id' => 2])->result_array();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'is_unique' => 'email already to use!'
        ]);
        $this->form_validation->set_rules('nophone', 'Nophone', 'required|trim|is_unique[user.no_handphone]', [
            'is_unique' => 'Phone number already to use!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Tambah Admin';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('superadmin/dataAdmin', $data);
            $this->load->view('templates/footer');
        } else {
            $email = $this->input->post('email', true);
            $password = 123456;
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'email' => htmlspecialchars($email),
                'no_handphone' => $this->input->post('nophone'),
                'image' => 'default.jpg',
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 0,
                'date_created' => time()
            ];


            //Token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user', $data);
            $this->db->insert('user_token', $user_token);

            $this->_sendEmail($token, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Akun admin baru telah dibuat, silahkan cek email yang didaftarkan!!</div>');
            redirect('superadmin/dataadmin');
        }
    }
    public function deleteAdmin($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Admin telah dihapus!</div>');
        redirect('superadmin/dataadmin');
    }
    private function _sendEmail($token, $type)
    {

        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.hostinger.co.id',
            'smtp_user' => 'no-reply@siapunnes.com',
            'smtp_pass' => '#Percobaan1',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'chartset' => 'utf-8',
            'newline'  => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('no-reply@siapunnes.com', 'BEM FH UNNES');
        $this->email->to($this->input->post('email'));

        if ($type == 'verify') {
            $this->email->subject('Akun verifikasi');
            $this->email->message('Silahkan verifikasi akun untuk login sebagai admin, Password default akun anda  <h1>123456</h1> <br> 
                                    <a class="btn btn-primary" href="' . base_url() . 'auth/verify?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Activate My Account</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
