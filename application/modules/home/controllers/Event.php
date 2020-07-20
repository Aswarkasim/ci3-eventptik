<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('home/Home_model', 'HM');
    }


    public function index()
    {
        $event  = $this->Crud_model->listing('tbl_event');
        $data  = [
            'event' => $event,
            'content' => 'home/event/index'
        ];
        $this->load->view('home/layout/wrapper', $data);
    }

    public function ongoing()
    {
        $this->load->library('pagination');

        $config['base_url']     = base_url('home/event/ongoing/');
        $config['total_rows']   = count($event = $this->Crud_model->listingOneAll('tbl_event', 'status', 'ongoing'));
        $config['per_page']     = 6;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $ongoing = $this->HM->listEvent('ongoing', $config['per_page'], $from);
        $data = [
            'ongoing'       => $ongoing,
            'pagination'    => $this->pagination->create_links(),
            'content'       => 'home/event/ongoing_index'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }
    public function eventselesai()
    {
        $this->load->library('pagination');

        $config['base_url']     = base_url('home/event/eventselesai/');
        $config['total_rows']   = count($event = $this->Crud_model->listingOneAll('tbl_event', 'status', 'selesai'));
        $config['per_page']     = 6;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $data = $this->HM->listEvent('selesai', $config['per_page'], $from);
        $data = [
            'data'       => $data,
            'pagination'    => $this->pagination->create_links(),
            'content'       => 'home/event/eventselesai'
        ];
        $this->load->view('layout/wrapper', $data, FALSE);
    }


    public function detail($id_event)
    {
        if ($this->session->userdata('id_event')) {
            $this->session->unset_userdata('id_event');
        }
        $id_user = $this->session->userdata('id_user');
        $peserta = $this->Crud_model->listingOneAll('tbl_peserta', 'id_event', $id_event);

        $kepesertaan = $this->HM->cekPeserta($id_user, $id_event);

        $event  = $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event);
        $data  = [
            'event'         => $event,
            'peserta'         => $peserta,
            'kepesertaan'   => $kepesertaan,
            'content' => 'home/event/detail'
        ];
        $this->load->view('home/layout/wrapper', $data);
    }

    function ikuti($id_event)
    {
        //is_logged_in_user();
        if ($this->session->userdata('id_user') == '') {
            $this->session->set_userdata('id_event', $id_event);
            redirect('home/auth');
        }

        $id_user = $this->session->userdata('id_user');
        $this->load->helper('string');
        $event = $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event);

        $peserta = $this->Crud_model->listingOneAll('tbl_peserta', 'id_event', $id_event);
        $jumlahPeserta = count($peserta);

        if ($jumlahPeserta == ($event->max_peserta - 1)) {
            $data = [
                'pendaftaran'     => 0
            ];
            $this->Crud_model->edit('tbl_event', 'id_event', $id_event, $data);
        }

        if ($event->biaya == "0") {
            $data = [
                'id_peserta' => random_string('numeric', '12'),
                'id_user'    => $id_user,
                'id_event'    => $id_event,
                'is_daftar'     => '1'
            ];
            $this->Crud_model->add('tbl_peserta', $data);
            redirect('home/event/detail/' . $id_event, 'refresh');
        } else {
            $dataPeserta = [
                'id_peserta' => random_string('numeric', '12'),
                'id_user'    => $id_user,
                'id_event'    => $id_event,
                'is_daftar'     => '2'
            ];
            $this->Crud_model->add('tbl_peserta', $dataPeserta);

            $data = [
                'id_tagihan'    => random_string('numeric', '12'),
                'id_user'       => $id_user,
                'id_event'      => $id_event,
                'id_peserta'    => $dataPeserta['id_peserta'],
                'is_valid'      => '2'
            ];
            $this->Crud_model->add('tbl_tagihan', $data);
            redirect('user/tagihan/detail/' . $data['id_tagihan'], 'refresh');
        }
    }

    function batal($id_event)
    {
        $id_user = $this->session->userdata('id_user');
        $kepesertaan = $this->HM->cekPeserta($id_user, $id_event);
        $tagihan = $this->HM->cekTagihan($id_user, $id_event);



        $this->Crud_model->delete('tbl_peserta', 'id_peserta', $kepesertaan->id_peserta);
        $this->Crud_model->delete('tbl_tagihan', 'id_tagihan', $tagihan->id_tagihan);

        $event = $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event);
        $peserta = $this->Crud_model->listingOneAll('tbl_peserta', 'id_event', $id_event);
        $jumlahPeserta = count($peserta);
        if ($jumlahPeserta < $event->max_peserta) {
            $data = [
                'pendaftaran'     => 1
            ];
            $this->Crud_model->edit('tbl_event', 'id_event', $id_event, $data);
        }

        redirect('home/event/detail/' . $id_event);
    }

    function cetakSertifikat($id_event)
    {
        $id_user = $this->session->userdata('id_user');
        $event = $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event);
        $user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);
        $data = [
            'event' => $event,
            'user'  => $user
        ];
        $this->load->view('home/event/cetak_sertifikat', $data, FALSE);
    }
}
