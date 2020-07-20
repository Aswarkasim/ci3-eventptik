<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Panitia extends CI_Controller
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

        $config['base_url']     = base_url('admin/panitia/index/');
        $config['total_rows']   = count($jlh = $this->AM->listPanitia());
        $config['per_page']     = 20;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $panitia = $this->AM->listPanitia($config['per_page'], $from);
        $data = [
            'panitia'          => $panitia,
            'pagination'    => $this->pagination->create_links(),
            'content'       => 'admin/panitia/index'
        ];
        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }

    function edit($id_panitia)
    {
        $panitia = $this->Crud_model->listingOne('tbl_panitia', 'id_panitia', $id_panitia);

        $valid = $this->form_validation;

        $valid->set_rules('namalengkap', 'Nama Lengkap', 'required');
        $valid->set_rules('username', 'Username', 'required');
        $valid->set_rules('password', 'Password', 'matches[re_password]');
        $valid->set_rules('re_password', 'Retype Password', 'matches[password]');

        if ($valid->run() === FALSE) {
            $data = [
                'panitia'       => $panitia,
                'content'       => 'admin/panitia/edit'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;

            $password = "";
            if ($i->post('password') != "") {
                $password = sha1($i->post('password'));
            } else {
                $password = $panitia->password;
            }
            $data = [
                'id_panitia'      => $id_panitia,
                'namalengkap'    => $i->post('namalengkap'),
                'username'      => $i->post('username'),
                'password'      => $password,
                'is_active'     => $i->post('is_aktif')
            ];
            $this->Crud_model->edit('tbl_panitia', 'id_panitia', $id_panitia, $data);
            $this->session->set_flashdata('msg', 'diedit');
            redirect('admin/panitia/edit/' . $id_panitia, 'refresh');
        }
    }

    function delete($id_panitia)
    {
        $this->Crud_model->delete('tbl_panitia', 'id_panitia', $id_panitia);
        $this->session->set_flashdata('msg', 'dihapus');
        redirect('admin/panitia');
    }

    function exportExcel()
    {


        $this->load->library("excel");

        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("Date Created", "ID Panitia", "Username", "Nama Lengkap", "Posisi");

        $column = 0;

        foreach ($table_columns as $field) {

            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);

            $column++;
        }


        $data = $this->Crud_model->listing('tbl_panitia');


        $excel_row = 2;

        foreach ($data as $row) {

            $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $row->date_created);
            $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $row->id_panitia);
            $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->username);
            $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $row->namalengkap);
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

/* End of file Admin.php */
