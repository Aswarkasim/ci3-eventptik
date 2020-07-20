<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('user/User_model', 'UM');
    }


    public function index()
    {

        $id_user = $this->session->userdata('id_user');
        $countTagihan = $this->UM->listTagihan($id_user, null, null);

        $this->load->library('pagination');

        $config['base_url']     = base_url('user/tagihan/index/');
        $config['total_rows']   = count($countTagihan);
        $config['per_page']     = 10;

        $from = $this->uri->segment(4);
        $this->pagination->initialize($config);
        $tagihan = $this->UM->listTagihan($id_user, $config['per_page'], $from);
        $is_read = $this->UM->is('tbl_tagihan', 'id_user', $id_user, 'is_read', '1');
        $jlh_tag = $this->UM->is('tbl_tagihan', 'id_user', $id_user, 'is_valid', '0');

        $data = [
            'pagination'    => $this->pagination->create_links(),
            'tagihan'       => $tagihan,
            'jumlah_read'   => count($is_read),
            'jlh_tag'       => count($jlh_tag),
            'content'       => 'user/tagihan/index'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }

    public function detail($id_tagihan)
    {
        $this->session->unset_userdata('id_event');
        $this->load->helper('string');

        $id_user = $this->session->userdata('id_user');
        is_read('tbl_tagihan', 'id_tagihan', $id_tagihan);

        $tagihan = $this->UM->detailTagihan($id_tagihan);


        $data = [
            'tagihan'       => $tagihan,
            'content'       => 'user/tagihan/detail'
        ];
        $this->load->view('home/layout/wrapper', $data, FALSE);
    }

    function kirim()
    {
        $id_tagihan = $this->input->post('id_tagihan');

        // $valid = $this->form_validation;
        // $valid->set_rules('bantuan', 'Bantuan', 'required', ['required' => '%s tidak boleh kosong']);

        if (!empty($_FILES['bukti']['name'])) {
            $config['upload_path']   = './assets/uploads/bukti/';
            $config['allowed_types'] = 'gif|jpg|png|svg|jpeg';
            $config['max_size']      = '24000'; // KB 
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('bukti')) {

                $data = [
                    'error'     => $this->upload->display_errors(),
                    'content'   => 'user/tagihan/bukti'
                ];
            } else {

                $tagihan = $this->Crud_model->listingOne('tbl_tagihan', 'id_tagihan', $id_tagihan);
                $i = $this->input;

                if ($tagihan->bukti != "") {
                    unlink('assets/uploads/bukti/' . $tagihan->bukti);
                }

                $upload_data = ['uploads' => $this->upload->data()];

                $data = [
                    'id_tagihan'   => $id_tagihan,
                    'metode'       => $i->post('metode'),
                    'tanggal'      => $i->post('tanggal'),
                    'is_valid'     => 2,
                    'bukti'        => $upload_data['uploads']['file_name']
                ];
                $this->Crud_model->edit('tbl_tagihan', 'id_tagihan', $id_tagihan, $data);
                $this->session->set_flashdata('msg', 'Tagihan dikirim diubah');
                redirect('user/tagihan/detail/' . $id_tagihan);
            }
        }

        $data = [
            'content'   => 'user/tagihan/bukti'
        ];

        $this->load->view('panitia/layout/wrapper', $data, FALSE);
    }

    function cetak($id_tagihan)
    {
        $data = [
            'tagihan' => $this->UM->detailTagihan($id_tagihan)
        ];
        $this->load->view('user/tagihan/cetak', $data, FALSE);
    }

    function delete($id_tagihan)
    {
        $this->Crud_model->delete('tbl_tagihan', 'id_tagihan', $id_tagihan);
        $this->session->flashdata('msg', 'Tagihan dihapus');
        redirect('user/tagihan/');
    }
}
