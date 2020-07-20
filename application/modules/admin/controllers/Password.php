<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Password extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
    }


    public function index()
    {
        $id_admin = $this->session->userdata('id_admin');
        $admin = $this->Crud_model->listingOne('tbl_admin', 'id_admin', $id_admin);
        // print_r($admin);
        // die;

        $valid = $this->form_validation;

        $valid->set_rules('password_lama', 'Password Lama', 'required');
        $valid->set_rules('password', 'Password', 'required');
        $valid->set_rules('re_password', 'Password', 'required|matches[password]');

        if ($valid->run() === FALSE) {
            $data = [
                'admin'    => $admin,
                'content'   => 'admin/admin/password'
            ];
            $this->load->view('admin/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;

            $pass = sha1($i->post('password_lama'));

            if ($pass != $admin->password) {
                $data = [
                    'error'     => 'Password lama yang dimasukkan tidak sama',
                    'content'   => 'admin/admin/password'
                ];
                $this->load->view('admin/layout/wrapper', $data, FALSE);
            } else {

                $data = [
                    'password'      => sha1($i->post('password'))
                ];
                $this->Crud_model->edit('tbl_admin', 'id_admin', $id_admin, $data);
                $this->load->view('admin/layout/wrapper', $data, FALSE);
                $this->session->set_flashdata('msg', 'diedit');
                redirect('admin/password', 'refresh');
            }
        }
    }
}
