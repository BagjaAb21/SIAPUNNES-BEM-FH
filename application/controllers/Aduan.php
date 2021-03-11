<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Aduan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('pagination');
    }
    public function index()
    {
        $data['title'] = 'Layanan Aduan UNNES';
        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('aduan/index');
        $this->load->view('templates/user_footer', $data);
    }
    public function profile()
    {
        $data['title'] = 'Layanan Aduan UNNES';
        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('aduan/profile');
        $this->load->view('templates/user_footer', $data);
    }
    public function info()
    {
        $this->load->model('Aduan_model');
        $data['title'] = 'Layanan Aduan UNNES';

        //configuration pagination
        $config['base_url'] = site_url('aduan/info');
        $config['total_rows'] = $this->db->count_all('data_info');
        $config['per_page'] = 10;
        $config['uri_segment'] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config['num_links'] = floor($choice);

        //style pagination
        $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';

        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;


        $data['dataInfo'] = $this->Aduan_model->get_info($config["per_page"], $data['page']);

        $data['pagination'] = $this->pagination->create_links();



        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('aduan/info', $data);
        $this->load->view('templates/user_footer', $data);
    }
    public function detail($id)
    {
        $data['title'] = 'Layanan Aduan UNNES';
        $data['detail'] = $this->db->get_where('data_info', ['id' => $id])->row_array();
        $data['infoLain'] = $this->db->get('data_info', 5)->result_array();
        $this->load->view('templates/user_header', $data);
        $this->load->view('templates/user_topbar', $data);
        $this->load->view('aduan/detail', $data);
        $this->load->view('templates/user_footer', $data);
    }
    public function aduanMasuk()
    {
        $data['title'] = 'Layanan Aduan UNNES';

        $data['kategori'] = $this->db->get('kategori_aduan')->result_array();

        $this->form_validation->set_rules('nimPost', 'NimPost', 'required');
        $this->form_validation->set_rules('namaPost', 'NamaPost', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('noPhone', 'NoPhone', 'required|trim');
        $this->form_validation->set_rules('isiAduan', 'IsiAduan', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/user_header', $data);
            $this->load->view('templates/user_topbar', $data);
            $this->load->view('aduan/aduanMasuk', $data);
            $this->load->view('templates/user_footer', $data);
        } else {
            //if image uploaded
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/bukti_aduan';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('img_bukti', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = [
                'no_aduan'      => rand(),
                'nim'           => $this->input->post('nimPost'),
                'id_kategori'   => $this->input->post('kategori'),
                'email'         => $this->input->post('email'),
                'no_handphone'  => $this->input->post('noPhone'),
                'isi_aduan'     => $this->input->post('isiAduan'),
                'date_created'  => date('Y-m-d'),
                'id_status'        => 2
            ];
            $this->db->insert('aduan', $data);

            $this->_sendEmail('aduan');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Aduan telah dikirim.</div>');
            redirect('aduan');
        }
    }
    public function getData()
    {
        $nim = $_GET['nim'];
        $mahasiswa = $this->db->get_where('data_mahasiswa', ['nim' => $nim])->row_array();
        $data = array(
            'nim'      =>  $mahasiswa['nim'],
            'nama'   =>  $mahasiswa['nama'],
            'jurusan'   =>  $mahasiswa['jurusan'],
            'tahun'   =>  $mahasiswa['tahun']
        );
        echo json_encode($data);
    }

    public function setStatus()
    {
        $id_status = $this->input->post('idStatus');
        $no_aduan = $this->input->post('idAduan');
        $data = [
            'id_status' => $id_status
        ];
        $this->db->where('no_aduan', $no_aduan);
        $this->db->update('aduan', $data);
        if ($id_status == 1) {
            $this->_sendEmail('approved');
        } elseif ($id_status == 3) {
            $this->_sendEmail('reject');
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Status aduan telah dibuat!</div>');
    }
    private function _sendEmail($type)
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

        if ($type == 'aduan') {
            $this->email->subject('Aduanmu Sudah Kami Terima');
            $this->email->message('Hello,' . $this->input->post('namaPost') . '<br> 
                                    NIM : ' . $this->input->post('nimPost') . '<br>
                                    Jurusan : ' . $this->input->post('jurusanPost') . '<br>
                                    Tahun : ' . $this->input->post('tahunPost') . '<br>
                                    Isi Aduanmu : " ' . $this->input->post('isiAduan') . '. "<br>
                                    Aduan masi bersatatus PENDING menunggu pembahasan.');
        } else if ($type == 'approved') {
            $this->email->subject('Aduanmu Sudah Disetujui');
            $this->email->message('Aduan yang kamu ajukan dengan NO.ADUAN <h1>' . $this->input->post('idAduan') . '</h1><br> 
                                    Telah: <h1>Disetujui</h1> <br>
                                    Berikut isi aduanmu:<br><p> "' . $this->input->post('isiAduan') . '."</p>');
        } else if ($type == 'reject') {
            $this->email->subject('Aduanmu Ditolak');
            $this->email->message('Aduan yang kamu ajukan dengan NO.ADUAN <h1>' . $this->input->post('idAduan') . '</h1><br> 
                                    <h1>Ditolak</h1> <br>
                                    Berikut isi aduanmu:<br><p>"' . $this->input->post('isiAduan') . '."</p>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
