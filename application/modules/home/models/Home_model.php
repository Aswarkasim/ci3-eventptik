<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home_model extends CI_Model
{

    public function listingHome($status)
    {
        $query = $this->db->select('*')
            ->from('tbl_event')
            ->limit(3)
            ->where('status', $status)
            ->where('is_active', '1')
            ->get();
        return $query->result();
    }

    public function listEvent($status, $limit, $offset)
    {
        $query = $this->db->select('*')
            ->from('tbl_event')
            ->where('status', $status)
            ->where('is_active', '1')
            ->limit($limit)
            ->offset($offset)
            ->get();
        return $query->result();
    }

    function listBanner()
    {
        $query = $this->db->select('*')
            ->from('tbl_banner')
            ->order_by('urutan', 'DESC')
            ->get();
        return $query->result();
    }
    function bannerUtama()
    {
        $query = $this->db->select('*')
            ->from('tbl_banner')
            ->where('urutan', '1')
            ->get();
        return $query->row();
    }

    public function cekPeserta($id_user, $id_event)
    {
        $query = $this->db->select('*')->from('tbl_peserta')
            ->where('id_user', $id_user)
            ->where('id_event', $id_event)
            ->get();
        return $query->row();
    }

    public function cekTagihan($id_user, $id_event)
    {
        $query = $this->db->select('*')->from('tbl_tagihan')
            ->where('id_user', $id_user)
            ->where('id_event', $id_event)
            ->get();
        return $query->row();
    }
}

/* End of file ModelName.php */
