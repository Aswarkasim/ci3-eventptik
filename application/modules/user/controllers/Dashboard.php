<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model', 'UM');
    }


    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $countevent = $this->UM->listEvent($id_user, null, null);

        $this->load->library('pagination');

        $config['base_url']     = base_url('user/dashboard/index/');
        $config['total_rows']   = count($countevent);
        $config['per_page']     = 1;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $event = $this->UM->listEvent($id_user, $config['per_page'], $from);

        $data = [
            'event'         => $event,
            'pagination'    => $this->pagination->create_links(),
            'content'       => 'user/dashboard/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }
}
