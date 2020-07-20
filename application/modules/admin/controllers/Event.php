<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
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

        $config['base_url']     = base_url('admin/event/index/');
        $config['total_rows']   = count($event = $this->Crud_model->listing('tbl_event'));
        $config['per_page']     = 10;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $data = $this->Crud_model->listing('tbl_event', $config['per_page'], $from);
        $data = [
            'event'          => $event,
            'pagination'    => $this->pagination->create_links(),
            'content'       => 'admin/event/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    public function ongoing()
    {
        $this->load->library('pagination');

        $config['base_url']     = base_url('admin/event/index/');
        $config['total_rows']   = count($event = $this->Crud_model->listingOneAll('tbl_event', 'status', 'ongoing'));
        $config['per_page']     = 10;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $event = $this->Crud_model->listingOneAll('tbl_event', 'status', 'ongoing', $config['per_page'], $from);
        $data = [
            'event'          => $event,
            'pagination'    => $this->pagination->create_links(),
            'content'       => 'admin/event/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    public function selesai()
    {
        $this->load->library('pagination');

        $config['base_url']     = base_url('admin/event/index/');
        $config['total_rows']   = count($event = $this->Crud_model->listingOneAll('tbl_event', 'status', 'selesai'));
        $config['per_page']     = 10;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $event = $this->Crud_model->listingOneAll('tbl_event', 'status', 'selesai', $config['per_page'], $from);
        $data = [
            'event'          => $event,
            'pagination'    => $this->pagination->create_links(),
            'content'       => 'admin/event/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
    public function cari()
    {
        $this->load->library('pagination');

        $where =  $this->input->post('where');

        $event = $this->AM->cariEvent($where);
        $data = [
            'event'          => $event,
            'content'       => 'admin/event/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function add()
    {

        $this->load->helper('string');

        $valid = $this->form_validation;

        $valid->set_rules('username', 'Username', 'required|is_unique[tbl_panitia.username]');
        $valid->set_rules('nama_event', 'Nama Event', 'required');
        $valid->set_rules('password', 'Password', 'required|max_length[6]');
        $valid->set_rules('re_password', 'Retype Password', 'required|matches[password]');

        if ($valid->run() === FALSE) {
            $data = [
                'content'   => 'admin/event/add'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $dataEvent = [
                'id_event'      => random_string('numeric', '15'),
                'nama_event'    => $i->post('nama_event'),
                'is_active'    => 0
            ];
            $data = [
                'id_panitia'    => random_string('numeric', '15'),
                'namalengkap'   => $i->post('namalengkap'),
                'username'      => $i->post('username'),
                'id_event'      => $dataEvent['id_event'],
                'password'      => sha1($i->post('password'))
            ];
            $this->Crud_model->add('tbl_event', $dataEvent);
            $this->Crud_model->add('tbl_panitia', $data);
            $this->session->set_flashdata('msg', 'ditambah');
            redirect('admin/event', 'refresh');
        }
    }

    function edit($id_user)
    {
        $user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);

        $valid = $this->form_validation;

        $valid->set_rules('nama_user', 'Nama User', 'required');
        $valid->set_rules('email', 'Email', 'required|valid_email');
        $valid->set_rules('password', 'Password', 'matches[re_password]');
        $valid->set_rules('re_password', 'Retype Password', 'matches[password]');

        if ($valid->run() === FALSE) {
            $data = [
                'title'     => 'Edit ' . $user->nama_user,
                'edit'       => 'admin/user/edit/',
                'back'      => 'admin/user',
                'user'      => $user,
                'content'   => 'admin/user/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;

            $password = "";
            if ($i->post('password') != "") {
                $password = sha1($i->post('password'));
            } else {
                $password = $user->password;
            }
            $data = [
                'id_user'       => $id_user,
                'nama_user'     => $i->post('nama_user'),
                'email'         => $i->post('email'),
                'password'      => $password,
                'role'          => $i->post('role'),
                'is_active'     => $i->post('is_aktif')
            ];
            $this->Crud_model->edit('tbl_user', 'id_user', $id_user, $data);
            $this->session->set_flashdata('msg', 'diedit');
            redirect('admin/user/edit/' . $id_user, 'refresh');
        }
    }

    function detail($id_event)
    {
        $event = $this->AM->detailEvent($id_event);
        $data = [
            'event'      => $event,
            'content'   => 'admin/event/detail'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function delete($id_event)
    {
        $event = $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event);
        if ($event->gambar != "") {
            unlink('assets/uploads/event/' . $event->gambar);
        }
        $peserta = $this->Crud_model->listingOneAll('tbl_peserta', 'id_event', $id_event);
        foreach ($peserta as $row) {
            $this->Crud_model->delete('tbl_peserta', 'id_peserta', $row->id_peserta);
        }
        $panitia = $this->Crud_model->listingOneAll('tbl_panitia', 'id_event', $id_event);
        foreach ($panitia as $row) {
            $this->Crud_model->delete('tbl_panitia', 'id_panitia', $row->id_panitia);
        }

        $absen_panitia = $this->Crud_model->listingOneAll('tbl_absen_panitia', 'id_event', $id_event);
        foreach ($absen_panitia as $row) {
            $this->Crud_model->delete('tbl_absen_panitia', 'id_absen_panitia', $row->id_absen_panitia);
        }

        $this->Crud_model->delete('tbl_event', 'id_event', $id_event);
        $this->session->set_flashdata('msg', 'semua data telah dihapu');
        redirect('admin/event');
    }

    function exportExcel()
    {


        $this->load->library("excel");

        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Date Created", "ID Event", "Nama Event", "tanggal", "waktu", "tempat", "biaya", "bank", "norek", "nama_rekening", "max_peserta", "deskripsi", "status", "is_active", "pendaftaran");

        $column = 0;

        foreach ($table_columns as $field) {

            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

            $column++;
        }

        $data = '';
        if ($this->uri->segment('4') == 'ongoing') {
            $data = $this->Crud_model->listingOneAll('tbl_event', 'status', 'ongoing');
        } else if ($this->uri->segment('4') == 'selesai') {
            $data = $this->Crud_model->listingOneAll('tbl_event', 'status', 'selesai');
        } else {
            $data = $this->Crud_model->listing('tbl_event');
        }

        $excel_row = 2;

        foreach ($data as $row) {

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->date_created);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->id_event);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->nama_event);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->tanggal);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->waktu);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->tempat);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->biaya);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->bank);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->norek);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->nama_rekening);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->max_peserta);
            $object->getActiveSheet()->setCellValueByColumnAndRow(11, $excel_row, $row->deskripsi);
            $object->getActiveSheet()->setCellValueByColumnAndRow(12, $excel_row, $row->status);
            $object->getActiveSheet()->setCellValueByColumnAndRow(13, $excel_row, $row->is_active);
            $object->getActiveSheet()->setCellValueByColumnAndRow(14, $excel_row, $row->pendaftaran);

            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');

        header('Content-Disposition: attachment;filename="DataEvent.xls"');

        ob_end_clean();
        ob_start();
        $object_writer->save('php://output');
    }
}
