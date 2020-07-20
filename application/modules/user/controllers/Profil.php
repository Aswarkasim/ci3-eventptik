<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{

    public function index()
    {
        $id_user = $this->session->userdata('id_user');
        $profil = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);
        $data = [
            'profil'    => $profil,
            'content'   => 'user/profil/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }



    // Edit
    public function edit()
    {

        $id_user = $this->session->userdata('id_user');
        $user = $this->Crud_model->listingOne('tbl_user', 'id_user', $id_user);
        $i = $this->input;
        $valid = $this->form_validation;
        $valid->set_rules('namalengkap', 'Nama Lengkap', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('email', 'Email', 'required', ['required' => '%s tidak boleh kosong']);
        $valid->set_rules('nohp', 'Nomor HP', 'required', ['required' => '%s tidak boleh kosong']);


        if ($valid->run()) {
            if (!empty($_FILES['gambar']['name'])) {
                $config['upload_path']   = './assets/uploads/images/';
                $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
                $config['max_size']      = '24000'; // KB 
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('gambar')) {
                    $data = [
                        'user'      => $user,
                        'error'     => $this->upload->display_errors(),
                        'content'   => 'user/profil/edit'
                    ];
                    $this->load->view('home/layout/wrapper', $data, FALSE);
                } else {
                    if ($user->gambar != "") {
                        unlink('assets/uploads/images/' . $user->gambar);
                    }

                    $upload_data = ['uploads' => $this->upload->data()];

                    $data = [
                        'id_user'       => $id_user,
                        'namalengkap'   => $i->post('namalengkap'),
                        'nim'           => $i->post('nim'),
                        'tgl'           => $i->post('tgl'),
                        'bulan'           => $i->post('bulan'),
                        'tahun'           => $i->post('tahun'),
                        'email'         => $i->post('email'),
                        'nohp'          => $i->post('nohp'),
                        'gambar'        => $upload_data['uploads']['file_name']
                    ];
                    $this->Crud_model->edit('tbl_user', 'id_user', $id_user, $data);
                    $this->session->set_flashdata('msg', 'Profil diubah');
                    redirect('user/profil');
                }
            } else {
                $data = [
                    'id_user'       => $id_user,
                    'namalengkap'   => $i->post('namalengkap'),
                    'nim'           => $i->post('nim'),
                    'tgl'           => $i->post('tgl'),
                    'bulan'           => $i->post('bulan'),
                    'tahun'           => $i->post('tahun'),
                    'email'         => $i->post('email'),
                    'nohp'          => $i->post('nohp')
                ];
                $this->Crud_model->edit('tbl_user', 'id_user', $id_user, $data);
                $this->session->set_flashdata('msg', 'Profil diubah');
                redirect('user/profil');
            }
        }
        $data = [
            'user'      => $user,
            'content'   => 'user/profil/edit'
        ];

        $this->load->view('home/layout/wrapper', $data, FALSE);
    }
}
