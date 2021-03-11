<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Aduan_model');
        $this->load->library('Excel');
    }

    public function dataAduan()
    {
        $this->db->query('DELETE FROM `aduan` WHERE DATEDIFF(CURDATE(), date_created) >= 7 && id_status = 3');
        $data['title'] = 'Data Aduan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['dataAduan'] = $this->Aduan_model->get_aduan();
        $data['statusAduan'] = $this->db->get('status')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('data/dataAduan', $data);
        $this->load->view('templates/footer');
    }
    public function exportAduan()
    {

        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("No aduan", "Nim", "Nama", "Jurusan", "Isi aduan", "Status");

        $column = 0;

        foreach ($table_columns as $field) {

            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

            $column++;
        }

        $aduan = $this->Aduan_model->get_aduan();
        $excel_row = 2;

        foreach ($aduan as $row) {

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row['no_aduan']);

            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row['nim']);

            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row['nama']);

            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row['jurusan']);

            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row['isi_aduan']);

            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row['status']);

            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');

        header('Content-Disposition: attachment;filename="Data aduan ' . date('d-m-Y') . '.xls"');

        $object_writer->save('php://output');
    }
    public function dataMahasiswa()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['dataMahasiswa'] = $this->db->get('data_mahasiswa')->result_array();
        $data['dataGagal'] = $this->db->get('data_mahasiswa_gagal')->result_array();

        $this->form_validation->set_rules('nim', 'Nim', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('tahun', 'Tahun', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/dataMahasiswa', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nim' => $this->input->post('nim'),
                'nama' => $this->input->post('nama'),
                'jurusan' => $this->input->post('jurusan'),
                'tahun' => $this->input->post('tahun')
            ];
            $this->db->insert('data_mahasiswa', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Mahasiswa baru telah ditambahkan!</div>');
            redirect('data/dataMahasiswa');
        }
    }
    public function upload()
    {
        if (isset($_FILES["file"]["name"])) {
            $inputFileName = $_FILES["file"]["tmp_name"];
            //  Read your Excel workbook
            try {
                $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
                $objReader = PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFileName);
            } catch (Exception $e) {
                die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
            }

            //  Get worksheet dimensions
            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();
            echo $highestRow;

            //  Loop through each row of the worksheet in turn
            for ($row = 1; $row <= $highestRow; $row++) {
                //  Read a row of data into an array
                $rowData = $sheet->rangeToArray(
                    'A' . $row . ':' . $highestColumn . $row,
                    NULL,
                    TRUE,
                    FALSE
                );
                $nim = $rowData[0][0];
                $nama = $rowData[0][1];
                $jurusan = $rowData[0][2];
                $tahun = $rowData[0][3];

                $cari = $this->db->get_where('data_mahasiswa', ['nim' => $nim])->row_array();
                if (empty($nim)) {
                    $data = array(
                        "nim" => $nim,
                        "nama" => $nama,
                        "keterangan" => 'NIM Kosong'
                    );
                    $this->db->insert('data_mahasiswa_gagal', $data);
                } elseif ($cari > 0) {
                    $data = array(
                        "nim" => $nim,
                        "nama" => $nama,
                        "keterangan" => 'Duplikasi NIM'
                    );
                    $this->db->insert('data_mahasiswa_gagal', $data);
                } else {

                    $data = array(
                        "nim" => $nim,
                        "nama" => $nama,
                        "jurusan" => $jurusan,
                        "tahun" => $tahun
                    );

                    if ($data["nim"] != 'nim') {
                        $this->db->insert("data_mahasiswa", $data);
                    }
                }
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Data Mahasiswa Berhasil diupload!!</div>');
        }

        redirect('data/dataMahasiswa');
    }
    public function updateMahasiswa()
    {
        $nim = $this->input->post('nim');
        $data = [
            'nama' => $this->input->post('updateNama'),
            'jurusan' => $this->input->post('updateJurusan'),
            'tahun'  => $this->input->post('updateTahun'),
        ];

        $this->db->where('nim', $nim);
        $this->db->update('data_mahasiswa', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Data mahasiswa berhasil diubah!!</div>');
        redirect('data/dataMahasiswa');
    }
    public function deleteMahasiswa($nim)
    {
        $this->db->where('nim', $nim);
        $this->db->delete('data_mahasiswa');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data Mahasiswa telah dihapus!</div>');
        redirect('data/dataMahasiswa');
    }
    public function hapusAngkatan()
    {
        $tahun = $this->input->post('tahun');
        $this->db->delete('data_mahasiswa', ['tahun' => $tahun]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Angkatan tahun ' . $tahun . ' telah dihapus!</div>');
        redirect('data/dataMahasiswa');
    }
    public function kosongkanTabel()
    {
        $this->db->empty_table('data_mahasiswa_gagal');
        redirect('data/datamahasiswa');
    }
    public function dataInfo()
    {
        $data['title'] = 'Data Informasi';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['dataInfo'] = $this->Aduan_model->get_info_all();


        $this->form_validation->set_rules('judul_info', 'Judul_Info', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('data/dataInfo', $data);
            $this->load->view('templates/footer');
        } else {
            //if image uploaded
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/img/info';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('img_info', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $data = [
                'judul_info' => $this->input->post('judul_info'),
                'isi_info' => $this->input->post('isi_info'),
                'penulis' => $this->input->post('penulis'),
                'date_created' => time()
            ];
            $this->db->insert('data_info', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Info baru telah diterbitkan.</div>');
            redirect('data/datainfo');
        }
    }
    public function deleteinfo($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('data_info');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Data info telah dihapus!</div>');
        redirect('data/datainfo');
    }
}
