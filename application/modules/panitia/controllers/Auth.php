<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    // public function __construct()
    // {
    //     parent::__construct();
    //     // if (($this->session->userdata('id_panitia') == '') || $this->session->userdata('role') != 'panitia') {
    //     //     redirect('error');
    //     // }
    // }


    public function index()
    {
        if ($this->session->userdata('id_panitia') != '') {
            redirect(base_url('panitia/dashboard'), 'refresh');
        }

        $this->load->model('panitia/Panitia_model', 'PM');

        $valid = $this->form_validation;

        $valid->set_rules(
            'username',
            'Username',
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
                'content'   => 'panitia/auth/content/'
            );
            $this->load->view('panitia/auth/login_panitia', $data);
        } else {
            $i          = $this->input;
            $username      = $i->post('username');
            $password   = $i->post('password');
            $cek_login  = $this->PM->loginPanitia($username, $password);
            //print_r($email); die;

            if ($cek_login) {
                if ($cek_login->is_active == 1) {

                    $s = $this->session;
                    $s->set_userdata('id_panitia', $cek_login->id_panitia);
                    $s->set_userdata('role', 'panitia');
                    $s->set_userdata('username', $cek_login->username);
                    $s->set_userdata('namalengkap', $cek_login->namalengkap);
                    $s->set_userdata('posisi', $cek_login->posisi);
                    $s->set_userdata('id_event', $cek_login->id_event);
                    redirect(base_url('panitia/dashboard'), 'refresh');
                } else {
                    $data = array(
                        'error'     => 'Akun anda tidak aktif',
                        'content'   => 'panitia/auth/content/'
                    );
                    $this->load->view('panitia/auth/login_panitia', $data);
                }
            } else {
                $data = array(
                    'error'     => 'Username atau password salah',
                    'content'   => 'panitia/auth/content/'
                );
                $this->load->view('panitia/auth/login_panitia', $data);
            }
        }
    }

    function logout()
    {
        $s = $this->session;
        $s->unset_userdata('id_panitia');
        $s->unset_userdata('role', 'panitia');
        $s->unset_userdata('username');
        $s->unset_userdata('namalengkap');
        $s->unset_userdata('id_event');

        redirect(base_url('panitia/auth'), 'refresh');
    }
}
