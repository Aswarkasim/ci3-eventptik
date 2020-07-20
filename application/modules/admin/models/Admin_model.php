<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function detailEvent($id_event)
    {
        $this->db->select('tbl_event.*, tbl_kategori.*')
            ->from('tbl_event')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_event.id_kategori', 'left')
            ->where('id_event',  $id_event);
        return $this->db->get()->row();
    }
    public function listPanitia($limit = null, $offset = null)
    {
        $this->db->select('tbl_panitia.*, tbl_event.nama_event')
            ->from('tbl_panitia')
            ->join('tbl_event', 'tbl_event.id_event = tbl_panitia.id_event', 'left')
            ->limit($limit)
            ->offset($offset);
        return $this->db->get()->result();
    }

    public function cariUser($where, $limit = null, $offset = null)
    {
        $query = $this->db->select('*')
            ->from('tbl_user')
            ->like('namalengkap', $where)
            ->or_like('nim', $where)
            ->or_like('username', $where)
            ->or_like('email', $where)
            ->limit($limit)
            ->offset($offset)
            ->get();
        return $query->result();
    }
    public function cariAdmin($where)
    {
        $query = $this->db->select('*')
            ->from('tbl_admin')
            ->like('nama_admin', $where)
            ->or_like('username_admin', $where)
            ->or_like('email', $where)
            ->get();
        return $query->result();
    }


    public function cariEvent($where)
    {
        $query = $this->db->select('*')
            ->from('tbl_event')
            ->like('nama_event', $where)
            ->limit(10)
            ->get();
        return $query->result();
    }
}
