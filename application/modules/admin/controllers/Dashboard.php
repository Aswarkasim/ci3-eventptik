<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_admin();
    }


    public function index()
    {

        $event = $this->Crud_model->listing('tbl_event');
        $user = $this->Crud_model->listing('tbl_user');
        $panitia = $this->Crud_model->listing('tbl_panitia');
        $admin = $this->Crud_model->listing('tbl_admin');

        $data = [
            'title'     => 'Dashboard',
            'user'      => $user,
            'event'     => $event,
            'panitia'   => $panitia,
            'admin'     => $admin,
            'content'   => 'admin/dashboard/index'
        ];

        $this->load->view('admin/layout/wrapper', $data, FALSE);
    }
}

/* End of file Dashboard.php */
