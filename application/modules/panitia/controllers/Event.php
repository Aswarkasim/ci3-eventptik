<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Event extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        is_logged_in_panitia();
        $this->load->model('Panitia_model', 'PM');
    }

    public function dataEvent()
    {
        $id_event = $this->session->userdata('id_event');
        $event = $this->PM->listingEventPanitia($id_event);
        $data = [
            'event'      => $event,
            'content'   => 'panitia/event/index'
        ];

        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }

    public function edit()
    {
        $id_event = $this->session->userdata('id_event');
        $event = $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event);
        $kategori = $this->Crud_model->listing('tbl_kategori');


        $required = '%s tidak boleh kosong';
        $valid = $this->form_validation;
        $valid->set_rules('nama_event', 'Nama Event', 'required', array('required' => $required));
        $valid->set_rules('tanggal', 'Tanggal', 'required', array('required' => $required));
        $valid->set_rules('waktu', 'Waktu', 'required', array('required' => $required));
        $valid->set_rules('tempat', 'Tempat', 'required', array('required' => $required));
        $valid->set_rules('biaya', 'Biaya', 'required', array('required' => $required));
        $valid->set_rules('max_peserta', 'Maksimal Peserta', 'required', array('required' => $required));

        if ($valid->run() === FALSE) {
            $data = [
                'event'         => $event,
                'kategori'      => $kategori,
                'content'       => 'panitia/event/edit'
            ];

            $this->load->view('panitia/layout/wrapper', $data, FALSE);
        } else {
            $i = $this->input;
            $data = [
                'id_event'       => $id_event,
                'nama_event'    => $i->post('nama_event'),
                'tanggal'    => $i->post('tanggal'),
                'id_kategori'    => $i->post('id_kategori'),
                'waktu'    => $i->post('waktu'),
                'tempat'    => $i->post('tempat'),
                'bank'    => $i->post('bank'),
                'norek'    => $i->post('norek'),
                'nama_rekening'    => $i->post('nama_rekening'),
                'biaya'    => $i->post('biaya'),
                'max_peserta'    => $i->post('max_peserta'),
            ];
            $this->Crud_model->edit('tbl_event', 'id_event', $id_event, $data);
            $this->session->set_flashdata('msg', 'event diubah');
            redirect('panitia/event/dataEvent', 'referesh');
        }
    }
    public function poster()
    {
        $id_event = $this->session->userdata('id_event');
        $event = $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event);

        $valid = $this->form_validation;
        $valid->set_rules('bantuan', 'Bantuan', 'required', ['required' => '%s tidak boleh kosong']);

        if (!empty($_FILES['poster']['name'])) {
            $config['upload_path']   = './assets/uploads/poster/';
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
            $config['max_size']      = '2048'; // KB 
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('poster')) {

                $data = [
                    'event'      => $event,
                    'error'     => $this->upload->display_errors(),
                    'content'   => 'panitia/event/poster'
                ];
            } else {

                if ($event->poster != "") {
                    unlink('assets/uploads/poster/' . $event->poster);
                }

                $upload_data = ['uploads' => $this->upload->data()];

                $data = [
                    'id_event'      => $id_event,
                    'poster'        => $upload_data['uploads']['file_name']
                ];
                $this->Crud_model->edit('tbl_event', 'id_event', $id_event, $data);
                $this->session->set_flashdata('msg', 'Poster diubah');
                redirect('panitia/event/poster');
            }
        }

        $data = [
            'event'      => $event,
            'error'     => $this->upload->display_errors(),
            'content'   => 'panitia/event/poster'
        ];

        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }
    public function sertifikat()
    {
        $id_event = $this->session->userdata('id_event');
        $event = $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event);


        $valid = $this->form_validation;
        $valid->set_rules('bantuan', 'Bantuan', 'required', ['required' => '%s tidak boleh kosong']);

        if (!empty($_FILES['sertifikat']['name'])) {
            $config['upload_path']   = './assets/uploads/sertifikat/';
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
            $config['max_size']      = '2048'; // KB 
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('sertifikat')) {

                $data = [
                    'event'      => $event,
                    'error'     => $this->upload->display_errors(),
                    'content'   => 'panitia/event/sertifikat'
                ];
            } else {
                if ($event->sertifikat != "") {
                    unlink('assets/uploads/sertifikat/' . $event->sertifikat);
                }

                $upload_data = ['uploads' => $this->upload->data()];

                $data = [
                    'id_event'      => $id_event,
                    'sertifikat'        => $upload_data['uploads']['file_name']
                ];
                $this->Crud_model->edit('tbl_event', 'id_event', $id_event, $data);
                $this->session->set_flashdata('msg', 'Sertfikat diubah');
                redirect('panitia/event/sertifikat');
            }
        }

        $data = [
            'event'      => $event,
            'content'   => 'panitia/event/sertifikat'
        ];

        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }

    public function sertifikatPanitia()
    {
        $id_event = $this->session->userdata('id_event');
        $event = $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event);


        $valid = $this->form_validation;
        $valid->set_rules('bantuan', 'Bantuan', 'required', ['required' => '%s tidak boleh kosong']);

        if (!empty($_FILES['sertifikat']['name'])) {
            $config['upload_path']   = './assets/uploads/sertifikat/';
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
            $config['max_size']      = '2048'; // KB 
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('sertifikat')) {

                $data = [
                    'event'      => $event,
                    'error'     => $this->upload->display_errors(),
                    'content'   => 'panitia/event/sertifikat_panitia'
                ];
            } else {
                if ($event->sertifikat_panitia != "") {
                    unlink('assets/uploads/sertifikat/' . $event->sertifikat_panitia);
                }

                $upload_data = ['uploads' => $this->upload->data()];

                $data = [
                    'id_event'      => $id_event,
                    'sertifikat_panitia'        => $upload_data['uploads']['file_name']
                ];
                $this->Crud_model->edit('tbl_event', 'id_event', $id_event, $data);
                $this->session->set_flashdata('msg', 'Sertfikat diubah');
                redirect('panitia/event/sertifikatPanitia');
            }
        }

        $data = [
            'event'      => $event,
            'content'   => 'panitia/event/sertifikat_panitia'
        ];

        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }

    function activePost()
    {
        $id_event = $this->session->userdata('id_event');
        $event = $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event);
        $status = '';
        if ($event->is_active == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $data = [
            'is_active' => $status
        ];
        $this->Crud_model->edit('tbl_event', 'id_event', $id_event, $data);
        $this->session->set_flashdata('msg', 'Selesai');
        redirect('panitia/event/dataEvent', 'refresh');
    }
    function activePendaftaran()
    {
        $id_event = $this->session->userdata('id_event');
        $event = $this->Crud_model->listingOne('tbl_event', 'id_event', $id_event);
        $status = '';
        if ($event->pendaftaran == 0) {
            $status = 1;
        } else {
            $status = 0;
        }
        $data = [
            'pendaftaran' => $status
        ];
        $this->Crud_model->edit('tbl_event', 'id_event', $id_event, $data);
        $this->session->set_flashdata('msg', 'Selesai');
        redirect('panitia/event/dataEvent', 'refresh');
    }

    function formatSertifikat()
    {
        $this->load->helper('download');
        force_download('assets/uploads/sertifikat/template.jpg', null);
    }
}
