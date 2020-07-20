<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_panitia();
    }


    public function index()
    {
        $id_panitia = $this->session->userdata('id_panitia');
        $panitia = $this->Crud_model->listingOne('tbl_panitia', 'id_panitia', $id_panitia);
        // print_r($panitia);
        // die;

        $valid = $this->form_validation;

        $valid->set_rules('password_lama', 'Password Lama', 'required');
        $valid->set_rules('password', 'Password', 'required');
        $valid->set_rules('re_password', 'Password', 'required|matches[password]');

        if ($valid->run() === FALSE) {
            $data = [
                'panitia'    => $panitia,
                'content'   => 'panitia/panitia/password'
            ];
            $this->load->view('panitia/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;

            $pass = sha1($i->post('password_lama'));

            if ($pass != $panitia->password) {
                $data = [
                    'error'     => 'Password lama yang dimasukkan tidak sama',
                    'content'   => 'panitia/panitia/password'
                ];
                $this->load->view('panitia/layout/wrapper', $data, FALSE);
            } else {

                $data = [
                    'password'      => sha1($i->post('password'))
                ];
                $this->Crud_model->edit('tbl_panitia', 'id_panitia', $id_panitia, $data);
                $this->load->view('panitia/layout/wrapper', $data, FALSE);
                $this->session->set_flashdata('msg', 'diedit');
                redirect('panitia/password', 'refresh');
            }
        }
    }
}
