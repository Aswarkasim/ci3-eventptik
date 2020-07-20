<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }


    public function index()
    {

        if ($this->session->userdata('id_admin') != '') {
            redirect(base_url('admin/dashboard'), 'refresh');
        }

        $valid = $this->form_validation;

        $valid->set_rules(
            'email',
            'Email',
            'required',
            array('required' => '%s harus diisi')
        );
        $valid->set_rules(
            'password',
            'Password',
            'required|min_length[6]',
            array(
                'required'     => 'Password harus diisi',
                'min_length'  => 'Password minimal 6 karakter'
            )
        );

        if ($valid->run() === FALSE) {
            $data = array(
                'title'     => 'Login Admin Ananda Private',
                'content'   => 'admin/auth/content/'
            );
            $this->load->view('admin/auth/login_admin', $data);
        } else {

            $i          = $this->input;
            $email      = $i->post('email');
            $password   = $i->post('password');
            $cek_login  = $this->Crud_model->loginAdmin($email, $password);
            //print_r($email); die;

            if (!empty($cek_login) == 1) {
                if ($cek_login->is_active == 1) {
                    $s = $this->session;
                    $s->set_userdata('id_admin', $cek_login->id_admin);
                    $s->set_userdata('username_admin', $cek_login->username_admin);
                    $s->set_userdata('namalengkap_admin', $cek_login->nama_admin);
                    $s->set_userdata('role', $cek_login->role);

                    redirect(base_url('admin/dashboard'), 'refresh');
                } else {
                    $data = array(
                        'is_active' => 'Akun anda tidak aktif',
                        'content'   => 'admin/auth/content/'
                    );
                    $this->load->view('admin/auth/login_admin', $data);
                }
            } else {
                $data = array(
                    'error'     => 'Email atau password salah',
                    'content'   => 'admin/auth/content/'
                );
                $this->load->view('admin/auth/login_admin', $data);
            }
        }
    }

    function logout()
    {
        session_destroy();
        redirect(base_url('admin/auth'), 'refresh');
    }
}
