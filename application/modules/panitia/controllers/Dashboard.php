<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in_panitia();
        // if ($this->session->userdata('id_user') == "") {
        //     redirect('panitia/auth');
        // }
        $this->load->model('panitia/Panitia_model', 'PM');
    }


    public function index()
    {
        $id_event = $this->session->userdata('id_event');
        $peserta = $this->Crud_model->listingOneAll('tbl_peserta', 'id_event', $id_event);
        $tagihan = $this->Crud_model->listingOneAll('tbl_tagihan', 'id_event', $id_event);
        $hadir = $this->PM->hadir($id_event, '1');
        $tdkhadir = $this->PM->hadir($id_event, '0');
        $data = [
            'title'     => 'Dashboard',
            'peserta'      => $peserta,
            'hadir'      => $hadir,
            'tagihan'      => $tagihan,
            'tdkhadir'      => $tdkhadir,
            'content'   => 'panitia/dashboard/index'
        ];

        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }
}

/* End of file Dashboard.php */
