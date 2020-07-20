<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_panitia extends CI_Controller
{


    public function set_session($id_event)
    {
        $id_admin = $this->session->userdata('id_admin');
        $panitia = $this->Crud_model->listingOne('tbl_admin', 'id_admin', $id_admin);

        $s = $this->session;
        $s->set_userdata('id_panitia', $id_admin);
        $s->set_userdata('id_event', $id_event);
        $s->set_userdata('role', 'panitia');
        $s->set_userdata('username', $panitia->username_admin);
        $s->set_userdata('namalengkap', $panitia->nama_admin);


        redirect('panitia/dashboard', 'refresh');
    }
}
