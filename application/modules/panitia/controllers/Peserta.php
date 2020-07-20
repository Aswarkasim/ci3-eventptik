<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Peserta extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/Panitia_model', 'PM');
        is_logged_in_panitia();

        // if (($this->session->userdata('id_user') == "") || $this->session->userdata('role') != "Admin") {
        //     redirect('error_page');
        // }
    }


    public function index()
    {
        $id_event = $this->session->userdata('id_event');
        $user = $this->PM->listPeserta($id_event);
        $data = [
            'user'      => $user,
            'content'   => 'panitia/peserta/index'
        ];

        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }


    public function print()
    {
        $id_event = $this->session->userdata('id_event');
        $peserta = $this->PM->listPeserta($id_event);

        $data = [
            'peserta'      => $peserta,
            'event'        =>  $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event)
        ];

        $this->load->view('panitia/peserta/print', $data);
    }

    public function fix()
    {
        $id_event = $this->session->userdata('id_event');
        $user = $this->PM->listFix($id_event, 'is_daftar', '1');
        $data = [
            'user'      => $user,
            'content'   => 'panitia/peserta/index'
        ];

        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }

    public function filter()
    {
        $id_event = $this->session->userdata('id_event');
        $params  = $this->input->post('filter');
        if ($params == '') {
            $this->index();
        } else {
            $user = $this->PM->listFilterPeserta($id_event, $params);
            $data = [
                'user'      => $user,
                'content'   => 'panitia/peserta/index'
            ];
            $this->load->view('panitia/layout/wrapper', $data, FALSE);
        }
    }
    public function nonfix()
    {
        $id_event = $this->session->userdata('id_event');
        $user = $this->PM->listFix($id_event, 'is_daftar', '0');
        $data = [
            'user'      => $user,
            'content'   => 'panitia/peserta/index'
        ];

        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }

    function detail($id_peserta)
    {
        $peserta = $this->PM->detailPeserta($id_peserta);

        $data = [
            'peserta'      => $peserta,
            'content'   => 'panitia/peserta/detail'
        ];

        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }

    function absen($id_peserta)
    {
        $event = $this->Crud_model->listingOne('tbl_peserta', 'id_peserta', $id_peserta);
        $status = '';
        if ($event->is_hadir == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $data = [
            'is_hadir' => $status
        ];
        $this->Crud_model->edit('tbl_peserta', 'id_peserta', $id_peserta, $data);
        redirect('panitia/peserta', 'refresh');
    }



    function delete($id_user)
    {
        $this->Crud_model->delete('tbl_user', 'id_user', $id_user);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('admin/user');
    }


    function exportExcel()
    {
        $id_event = $this->session->userdata('id_event');

        $this->load->library("excel");

        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Date Created", "ID User", "Username", "Nama Lengkap", "is_PTIK", "NIM", "Tanggal lahir", "Email", "No HP", "Status Daftar", "Status Hadir");

        $column = 0;

        foreach ($table_columns as $field) {

            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

            $column++;
        }

        if ($this->uri->segment('4') == 'fix') {
            $data = $this->PM->listFix($id_event, 'is_daftar', '1');
        } else if ($this->uri->segment('4') == 'nonfix') {
            $data = $this->PM->listFix($id_event, 'is_daftar', '0');
        } else {
            $data = $this->PM->listPeserta($id_event);
        }

        $excel_row = 2;

        foreach ($data as $row) {

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->date_created);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->id_user);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->username);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->namalengkap);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->is_ptik);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->nim);
            $object->getActiveSheet()->setCellValueByColumnAndRow(6, $excel_row, $row->tanggal_lahir);
            $object->getActiveSheet()->setCellValueByColumnAndRow(7, $excel_row, $row->email);
            $object->getActiveSheet()->setCellValueByColumnAndRow(8, $excel_row, $row->nohp);
            $object->getActiveSheet()->setCellValueByColumnAndRow(9, $excel_row, $row->is_daftar);
            $object->getActiveSheet()->setCellValueByColumnAndRow(10, $excel_row, $row->is_hadir);

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
