<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Absen_panitia extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_panitia();
    }

    public function index()
    {
        $absen_panitia = $this->Crud_model->listing('tbl_absen_panitia');
        $data = array(
            'absen_panitia'    => $absen_panitia,
            'content'       => 'panitia/absen_panitia/index',
        );
        $this->load->view('layout/wrapper', $data, FALSE);
    }

    function printList()
    {
        $id_event = $this->session->userdata('id_event');
        $data['event'] = $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event);
        $data['data'] = $this->Crud_model->listingOneAll('tbl_absen_panitia', 'id_event', $id_event);
        $this->load->view('panitia/absen_panitia/print', $data);
    }

    public function add()
    {
        $id_event = $this->session->userdata('id_event');
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_panitia',
            'Nama Panitia',
            'required',
            array('required' => ' %s harus diisi')
        );

        if ($valid->run() === FALSE) {
            $data = array(
                'content'       => 'panitia/absen_panitia/add',
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'id_absen_panitia'   => $i->post('id_absen_panitia'),
                'id_event'          => $id_event,
                'nama_panitia'       => $i->post('nama_panitia'),
                'nim'                => $i->post('nim'),
                'angkatan'           => $i->post('angkatan'),
                'posisi'             => $i->post('posisi'),
            );
            $this->Crud_model->add('tbl_absen_panitia', $data);
            $this->session->set_flashdata('msg', ' Data telah ditambah');
            redirect('panitia/absen_panitia/add', 'refresh');
        }
    }

    public function edit($id_absen_panitia)
    {
        $absen_panitia = $this->Crud_model->listingOne('tbl_absen_panitia', 'id_absen_panitia', $id_absen_panitia);
        $valid = $this->form_validation;
        $valid->set_rules(
            'nama_panitia',
            'Nama Panitia',
            'required',
            array('required' => ' %s harus diisi')
        );

        if ($valid->run() === FALSE) {
            $data = array(
                'absen_panitia' => $absen_panitia,
                'content'       => 'panitia/absen_panitia/edit',
            );
            $this->load->view('layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = array(
                'id_absen_panitia'   => $id_absen_panitia,
                'id_event'          => $id_event,
                'nim'                => $i->post('nim'),
                'angkatan'           => $i->post('angkatan'),
                'posisi'             => $i->post('posisi'),
            );
            $this->Crud_model->edit('tbl_absen_panitia', 'id_absen_panitia', $id_absen_panitia, $data);
            $this->session->set_flashdata('msg', ' Data telah diedit');
            redirect('panitia/absen_panitia/edit/' . $id_absen_panitia, 'refresh');
        }
    }

    function absen($id_absen_panitia)
    {
        $event = $this->Crud_model->listingOne('tbl_absen_panitia', 'id_absen_panitia', $id_absen_panitia);
        $status = '';
        if ($event->is_hadir == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $data = [
            'is_hadir' => $status
        ];
        $this->Crud_model->edit('tbl_absen_panitia', 'id_absen_panitia', $id_absen_panitia, $data);
        redirect('panitia/absen_panitia', 'refresh');
    }


    function delete($id_absen_panitia)
    {
        $this->Crud_model->delete('tbl_absen_panitia', 'id_absen_panitia', $id_absen_panitia);
        redirect('panitia/absen_panitia', 'refresh');
    }

    function exportExcel()
    {
        $id_event = $this->session->userdata('id_event');

        $this->load->library("excel");

        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Date Created", "NIM", "Nama Lengkap", "Angkatan", "Posisi", "Kehadiran");

        $column = 0;

        foreach ($table_columns as $field) {

            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

            $column++;
        }


        $data = $this->Crud_model->listingOneAll('tbl_absen_panitia', 'id_event', $id_event);


        $excel_row = 2;

        foreach ($data as $row) {

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->date_created);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->nim);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->nama_panitia);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->angkatan);
            $object->getActiveSheet()->setCellValueByColumnAndRow(4, $excel_row, $row->posisi);
            $object->getActiveSheet()->setCellValueByColumnAndRow(5, $excel_row, $row->is_hadir);

            $excel_row++;
        }

        $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');

        header('Content-Type: application/vnd.ms-excel');

        header('Content-Disposition: attachment;filename="DataAbsenPanitia.xls"');

        ob_end_clean();
        ob_start();
        $object_writer->save('php://output');
    }
}
