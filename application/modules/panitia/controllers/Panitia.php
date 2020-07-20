<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Panitia extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_panitia();
    }


    public function index()
    {
        $id_event = $this->session->userdata('id_event');
        $panitia = $this->Crud_model->listingOneAll('tbl_panitia', 'id_event', $id_event);
        $data = [
            'panitia'   => $panitia,
            'content'   => 'panitia/panitia/index'
        ];
        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }

    function add()
    {

        $this->load->helper('string');

        $valid = $this->form_validation;

        $valid->set_rules('username', 'Username', 'required|is_unique[tbl_panitia.username]');
        $valid->set_rules('password', 'Password', 'required');
        $valid->set_rules('re_password', 'Retype Password', 'required|matches[password]');

        if ($valid->run() === FALSE) {
            $data = [
                'content'   => 'panitia/panitia/add'
            ];
            $this->load->view('panitia/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;

            $data = [
                'id_panitia'    => random_string('numeric', '15'),
                'namalengkap'   => $i->post('namalengkap'),
                'username'      => $i->post('username'),
                'is_active'      => $i->post('is_active'),
                'posisi'      => 'Lainnya',
                'id_event'      => $this->session->userdata('id_event'),
                'password'      => sha1($i->post('password'))
            ];
            $this->Crud_model->add('tbl_panitia', $data);
            $this->load->view('panitia/layout/wrapper', $data, FALSE);
            $this->session->set_flashdata('msg', 'ditambah');
            redirect('panitia/panitia', 'refresh');
        }
    }

    function edit($id_panitia)
    {
        $panitia = $this->Crud_model->listingOne('tbl_panitia', 'id_panitia', $id_panitia);

        $this->load->helper('string');

        $valid = $this->form_validation;

        $valid->set_rules('username', 'Username', 'required');
        $valid->set_rules('namalengkap', 'Nama Lengkap', 'required');

        if ($valid->run() === FALSE) {
            $data = [
                'panitia'    => $panitia,
                'content'   => 'panitia/panitia/edit'
            ];
            $this->load->view('panitia/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;

            $pass = sha1($i->post('password'));

            if ($pass == '') {
                $pass = $panitia->password;
            }

            $data = [
                'id_panitia'    => random_string('numeric', '15'),
                'namalengkap'   => $i->post('namalengkap'),
                'username'      => $i->post('username'),
                'is_active'      => $i->post('is_active'),
                'posisi'      => 'Lainnya',
                'id_event'      => $this->session->userdata('id_event'),
                'password'      => $pass
            ];
            $this->Crud_model->edit('tbl_panitia', 'id_panitia', $id_panitia, $data);
            $this->load->view('panitia/layout/wrapper', $data, FALSE);
            $this->session->set_flashdata('msg', 'diedit');
            redirect('panitia/panitia', 'refresh');
        }
    }

    function delete($id_panitia)
    {
        $this->Crud_model->delete('tbl_panitia', 'id_panitia', $id_panitia);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('panitia/panitia');
    }

    function cetakSertifikat()
    {
        $id_event = $this->session->userdata('id_event');
        $event = $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event);
        $nama_panitia = $this->input->post('nama_panitia');
        $data = [
            'nama_panitia'       => $nama_panitia,
            'sertifikat_panitia' => $event->sertifikat_panitia
        ];
        $this->load->view('panitia/panitia/cetak_sertifikat', $data, FALSE);
    }

    function exportExcel()
    {
        $id_event = $this->session->userdata('id_event');

        $this->load->library("excel");

        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Date Created", "ID Panitia", "Nama Lengkap", "Username", "Posisi");

        $column = 0;

        foreach ($table_columns as $field) {

            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

            $column++;
        }


        $data = $this->Crud_model->listingOneAll('tbl_panitia', 'id_event', $id_event);


        $excel_row = 2;

        foreach ($data as $row) {

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->date_created);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->id_panitia);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->namalengkap);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->username);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->posisi);

            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');

        header('Content-Disposition: attachment;filename="DataPanitia.xls"');

        ob_end_clean();
        ob_start();
        $object_writer->save('php://output');
    }
}
