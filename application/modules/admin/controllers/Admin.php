<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('role') != 'Super Admin') {
            redirect('admin/dashboard');
        }
        is_logged_in_admin();
    }


    public function index()
    {
        $this->load->library('pagination');

        $config['base_url']     = base_url('admin/admin/index/');
        $config['total_rows']   = count($this->Crud_model->listing('tbl_admin'));
        $config['per_page']     = 20;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $admin = $this->Crud_model->listing('tbl_admin', $config['per_page'], $from);
        $data = [
            'admin'          => $admin,
            'pagination'    => $this->pagination->create_links(),
            'content'       => 'admin/admin/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function add()
    {
        $this->load->helper('string');


        $valid = $this->form_validation;

        $valid->set_rules('nama_admin', 'Nama Admin', 'required');
        $valid->set_rules('username_admin', 'Username', 'required|is_unique[tbl_admin.username_admin]');
        $valid->set_rules('email', 'Email', 'required|is_unique[tbl_admin.email]|valid_email');
        $valid->set_rules('password', 'Password', 'required');
        $valid->set_rules('re_password', 'Retype Password', 'required|matches[password]');

        if ($valid->run() === FALSE) {
            $data = [
                'content'   => 'admin/admin/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'id_admin'     => random_string('numeric', '15'),
                'nama_admin'     => $i->post('nama_admin'),
                'username_admin'     => $i->post('username_admin'),
                'email'         => $i->post('email'),
                'password'      => sha1($i->post('password')),
                'role'          => $i->post('role'),
                'is_active'     => $i->post('is_aktif')
            ];
            $this->Crud_model->add('tbl_admin', $data);
            $this->session->set_flashdata('msg', 'ditambah');
            redirect('admin/admin/add', 'refresh');
        }
    }

    function edit($id_admin)
    {
        $admin = $this->Crud_model->listingOne('tbl_admin', 'id_admin', $id_admin);

        $valid = $this->form_validation;

        $valid->set_rules('nama_admin', 'Nama Admin', 'required');
        $valid->set_rules('username_admin', 'IUsername', 'required');
        $valid->set_rules('email', 'Email', 'required|valid_email');
        $valid->set_rules('password', 'Password', 'matches[re_password]');
        $valid->set_rules('re_password', 'Retype Password', 'matches[password]');

        if ($valid->run() === FALSE) {
            $data = [
                'admin'      => $admin,
                'content'   => 'admin/admin/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;

            $password = "";
            if ($i->post('password') != "") {
                $password = sha1($i->post('password'));
            } else {
                $password = $admin->password;
            }
            $data = [
                'id_admin'      => $id_admin,
                'nama_admin'    => $i->post('nama_admin'),
                'username_admin'      => $i->post('username_admin'),
                'email'         => $i->post('email'),
                'password'      => $password,
                'role'          => $i->post('role'),
                'is_active'     => $i->post('is_aktif')
            ];
            $this->Crud_model->edit('tbl_admin', 'id_admin', $id_admin, $data);
            $this->session->set_flashdata('msg', 'diedit');
            redirect('admin/admin/edit/' . $id_admin, 'refresh');
        }
    }

    function delete($id_admin)
    {
        $this->Crud_model->delete('tbl_admin', 'id_admin', $id_admin);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('admin/admin');
    }
    function cari()
    {
        $this->load->model('admin/Admin_model', 'AM');

        $where = $this->input->post('where');

        $admin = $this->AM->cariAdmin($where);
        $data = [
            'admin'          => $admin,
            'content'       => 'admin/admin/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function exportExcel()
    {


        $this->load->library("excel");

        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Date Created", "ID Admin", "Username", "Nama", "Email", "Role", "Status");

        $column = 0;

        foreach ($table_columns as $field) {

            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

            $column++;
        }


        $data = $this->Crud_model->listing('tbl_admin');


        $excel_row = 2;

        foreach ($data as $row) {

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->date_created);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->id_admni);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->username_admin);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->nama_admin);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->email);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->role);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->is_active);

            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');

        header('Content-Disposition: attachment;filename="DataAadmin.xls"');

        ob_end_clean();
        ob_start();
        $object_writer->save('php://output');
    }
}
