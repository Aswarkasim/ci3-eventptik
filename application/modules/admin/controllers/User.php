<?php

defined('BASEPATH') or exit('No direct script access allowed');


class User extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Admin_model', 'AM');

        is_logged_in_admin();
    }


    public function index()
    {
        $this->load->library('pagination');

        $config['base_url']     = base_url('admin/user/index/');
        $config['total_rows']   = count($event = $this->Crud_model->listing('tbl_user'));
        $config['per_page']     = 20;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $user = $this->Crud_model->listing('tbl_user', $config['per_page'], $from);
        $data = [
            'user'          => $user,
            'pagination'    => $this->pagination->create_links(),
            'content'       => 'admin/user/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    public function ptik()
    {
        $this->load->library('pagination');

        $config['base_url']     = base_url('admin/user/index/');
        $config['total_rows']   = count($jlh = $this->Crud_model->listingOneAll('tbl_user', 'is_ptik', '1'));
        $config['per_page']     = 20;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $user = $this->Crud_model->listingOneAll('tbl_user', 'is_ptik', '1', $config['per_page'], $from);
        $data = [
            'user'          => $user,
            'pagination'    => $this->pagination->create_links(),
            'content'       => 'admin/user/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    public function nonptik()
    {

        $this->load->library('pagination');

        $config['base_url']     = base_url('admin/user/index/');
        $config['total_rows']   = count($jlh = $this->Crud_model->listingOneAll('tbl_user', 'is_ptik', '0'));
        $config['per_page']     = 20;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $user = $this->Crud_model->listingOneAll('tbl_user', 'is_ptik', '0', $config['per_page'], $from);
        $data = [
            'user'          => $user,
            'pagination'    => $this->pagination->create_links(),
            'content'       => 'admin/user/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function cari()
    {
        $this->load->library('pagination');

        $where = $this->input->post('where');

        $config['base_url']     = base_url('admin/user/index/');
        $config['total_rows']   = count($jlh = $this->AM->cariUser($where));
        $config['per_page']     = 20;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $user = $this->AM->cariUser($where, $config['per_page'], $from);
        $data = [
            'user'          => $user,
            'pagination'    => $this->pagination->create_links(),
            'content'       => 'admin/user/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function add()
    {

        $valid = $this->form_validation;

        $valid->set_rules('nama_user', 'Nama User', 'required');
        $valid->set_rules('email', 'Email', 'required|is_unique[tbl_user.email]|valid_email');
        $valid->set_rules('password', 'Password', 'required');
        $valid->set_rules('re_password', 'Retype Password', 'required|matches[password]');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Tambah User',
                'add'       => 'admin/user/add',
                'back'      => 'admin/user',
                'content'   => 'admin/user/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'nama_user'     => $i->post('nama_user'),
                'email'         => $i->post('email'),
                'password'      => sha1($i->post('password')),
                'role'          => $i->post('role'),
                'is_active'     => $i->post('is_aktif')
            ];
            $this->Crud_model->add('tbl_user', $data);
            $this->session->set_flashdata('msg', 'ditambah');
            redirect('admin/user/add', 'refresh');
        }
    }

    function edit($id_user)
    {
        $user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);
        $i = $this->input;
        $valid = $this->form_validation;
        $valid->set_rules('namalengkap', 'Nama Lengkap', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('email', 'Email', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('nohp', 'Nomor HP', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('password', 'Password', 'matches[re_password]|min_length[6]');
        $valid->set_rules('re_password', 'Retype Password', 'matches[password]');

        $password = "";
        if ($i->post('password') != "") {
            $password = sha1($i->post('password'));
        } else {
            $password = $user->password;
        }


        if ($valid->run()) {
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']   = './assets/uploads/images/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '24000'; // KB 
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    $data = [
                        'user'      => $user,
                        'error'     => $this->upload->display_errors(),
                        'content'   => 'admin/user/edit'
                    ];
                    $this->load->view('admin/layout/wrapper', $data, FALSE);
                } else {
                    if ($user->gambar != "") {
                        unlink('assets/uploads/images/' . $user->gambar);
                    }



                    $upload_data = ['uploads' => $this->upload->data()];

                    $data = [
                        'id_user'       => $id_user,
                        'namalengkap'   => $i->post('namalengkap'),
                        'nim'           => $i->post('nim'),
                        'tgl'           => $i->post('tgl'),
                        'bulan'           => $i->post('bulan'),
                        'tahun'           => $i->post('tahun'),
                        'email'         => $i->post('email'),
                        'nohp'          => $i->post('nohp'),
                        'password'      => $password,
                        'gambar'        => $upload_data['uploads']['file_name']
                    ];
                    $this->Crud_model->edit('tbl_user', 'id_user', $id_user, $data);
                    $this->session->set_flashdata('msg', 'Profil diubah');
                    redirect('admin/user/edit/' . $id_user);
                }
            } else {
                $data = [
                    'id_user'       => $id_user,
                    'namalengkap'   => $i->post('namalengkap'),
                    'nim'           => $i->post('nim'),
                    'tgl'           => $i->post('tgl'),
                    'bulan'           => $i->post('bulan'),
                    'tahun'           => $i->post('tahun'),
                    'email'         => $i->post('email'),
                    'password'      => $password,
                    'nohp'          => $i->post('nohp')
                ];
                $this->Crud_model->edit('tbl_user', 'id_user', $id_user, $data);
                $this->session->set_flashdata('msg', 'Profil diubah');
                redirect('admin/user/edit/' . $id_user);
            }
        }
        $data = [
            'user'      => $user,
            'content'   => 'admin/user/edit'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function delete($id_user)
    {
        $this->Crud_model->delete('tbl_user', 'id_user', $id_user);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('admin/user');
    }

    public function role()
    {
        $role = $this->Crud_model->listing('tbl_user_role');
        $data = [
            'add'       => 'roleAdd',
            'edit'      => 'roleEdit/',
            'delete'    => 'roleDelete/',
            'role'      => $role,
            'content'   => 'admin/role/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }





    function exportExcel()
    {


        $this->load->library("excel");

        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Date Created", "ID User", "Username", "Nama Lengkap", "is_PTIK", "NIM", "Tanggal lahir", "Email", "No HP");

        $column = 0;

        foreach ($table_columns as $field) {

            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

            $column++;
        }

        $user = '';
        if ($this->uri->segment('4') == 'ptik') {
            $user = $this->Crud_model->listingOneAll('tbl_user', 'is_ptik', '1');
        } else if ($this->uri->segment('4') == 'nonptik') {
            $user = $this->Crud_model->listingOneAll('tbl_user', 'is_ptik', '0');
        } else {
            $user = $this->Crud_model->listing('tbl_user');
        }

        $excel_row = 2;

        foreach ($user as $row) {

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->date_created);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->id_user);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->username);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->namalengkap);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->is_ptik);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->nim);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->tanggal_lahir);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->email);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->nohp);

            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');

        header('Content-Disposition: attachment;filename="DataUser.xls"');

        ob_end_clean();
        ob_start();
        $object_writer->save('php://output');
    }
}
