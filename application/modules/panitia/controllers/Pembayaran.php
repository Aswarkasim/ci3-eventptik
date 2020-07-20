<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pembayaran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('panitia/Panitia_model', 'PM');
        is_logged_in_panitia();
    }


    public function index()
    {
        $id_event = $this->session->userdata('id_event');
        $data = $this->PM->listPembayaran($id_event);
        $data = [
            'data'      => $data,
            'content'   => 'panitia/pembayaran/index'
        ];

        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }
    public function valid()
    {
        $id_event = $this->session->userdata('id_event');
        $data = $this->PM->listPembayaranValid($id_event, 'is_valid', '1');
        $data = [
            'data'      => $data,
            'content'   => 'panitia/pembayaran/index'
        ];

        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }

    public function print()
    {
        $id_event = $this->session->userdata('id_event');
        $data = $this->PM->listPembayaran($id_event);

        $data = [
            'data'         => $data,
            'event'        =>  $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event)
        ];

        $this->load->view('panitia/pembayaran/print', $data);
    }

    public function notValid()
    {
        $id_event = $this->session->userdata('id_event');
        $data = $this->PM->listPembayaranValid($id_event, 'is_valid', '0');
        $data = [
            'data'      => $data,
            'content'   => 'panitia/pembayaran/index'
        ];

        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }

    function detail($id_tagihan)
    {
        $dataRead = [
            'is_read_panitia' => '1'
        ];
        $this->Crud_model->edit('tbl_tagihan', 'id_tagihan', $id_tagihan, $dataRead);

        $tagihan = $this->PM->detailPembayaran($id_tagihan);
        $data = [
            'tagihan'      => $tagihan,
            'content'   => 'panitia/pembayaran/detail'
        ];

        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }

    function ubahStatus()
    {
        $this->load->helper('string');

        $is_valid = $this->uri->segment('4');
        $id_tagihan = $this->uri->segment('5');
        $tagihan = $this->Crud_model->listingOne('tbl_tagihan', 'id_tagihan', $id_tagihan);
        if ($is_valid == 1) {
            $data = [
                'is_daftar'  => 1
            ];
            $this->Crud_model->edit('tbl_peserta', 'id_peserta', $tagihan->id_peserta, $data);
        } else {
            $data = [
                'is_daftar'  => 0
            ];
            $this->Crud_model->edit('tbl_peserta', 'id_peserta', $tagihan->id_peserta, $data);
        }
        $data = [
            'is_valid' => $is_valid
        ];
        $this->Crud_model->edit('tbl_tagihan', 'id_tagihan', $id_tagihan, $data);
        $this->session->set_flashdata('msg', 'Status diubah');
        redirect('panitia/pembayaran/detail/' . $id_tagihan, 'refresh');
    }

    function delete($id_tagihan)
    {
        $this->Crud_model->delete('tbl_tagihan', 'id_tagihan', $id_tagihan);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('panitia/pembayaran');
    }


    function exportExcel()
    {
        $id_event = $this->session->userdata('id_event');

        $this->load->library("excel");

        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Date Created", "ID User", "Username", "Nama Lengkap", "Status Valid");

        $column = 0;

        foreach ($table_columns as $field) {

            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

            $column++;
        }

        $data = '';
        if ($this->uri->segment('4') == 'valid') {
            $data = $this->PM->listPembayaranValid($id_event, 'is_valid', '1');
        } else if ($this->uri->segment('4') == 'notValid') {
            $data = $this->PM->listPembayaranValid($id_event, 'is_valid', '0');
        } else {
            $data = $this->PM->listPembayaran($id_event);
        }

        $excel_row = 2;

        foreach ($data as $row) {

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->date_created);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->id_user);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->username);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->namalengkap);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->is_valid);

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
