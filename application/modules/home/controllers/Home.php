<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('home/Home_model', 'HM');
    }


    public function index()
    {
        $ongoing = $this->HM->listingHome('ongoing');
        $selesai = $this->HM->listingHome('selesai');

        $banner = $this->Crud_model->listingOne('tbl_banner', 'id_banner', '26571');
        $utama = $this->HM->bannerUtama('tbl_banner');

        $data = [
            'ongoing'       => $ongoing,
            'selesai'       => $selesai,
            'banner'       => $banner,
            'utama'       => $utama,
            'content'   => 'home/home/index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);

        // $data  = [
        //     'content' => 'home/home/index'
        // ];
        // $this->load->view('home/layout/wrapper', $data);
    }
}
