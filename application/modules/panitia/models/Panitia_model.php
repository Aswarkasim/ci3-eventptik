<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Panitia_model extends CI_Model
{
    public function listingEventPanitia($id_event)
    {
        $this->db->select('tbl_event.*, tbl_kategori.*')
            ->from('tbl_event')
            ->join('tbl_kategori', 'tbl_kategori.id_kategori = tbl_event.id_kategori', 'left')
            ->where('id_event',  $id_event);
        return $this->db->get()->row();
    }

    public function loginPanitia($username, $password)
    {
        $this->db->select('*')
            ->from('tbl_panitia')
            ->where(array(
                'username'      => $username,
                'password'   => sha1($password)
            ));
        $query = $this->db->get();
        return $query->row();
    }
    public function hadir($id_event, $value)
    {
        $this->db->select('*')
            ->from('tbl_peserta')
            ->where('id_event', $id_event)
            ->where('is_hadir', $value);
        $query = $this->db->get();
        return $query->result();
    }

    function listPeserta($id_event)
    {
        $this->db->select('tbl_peserta.*, 
                            tbl_user.*')
            ->from('tbl_peserta')
            ->join('tbl_user', 'tbl_user.id_user = tbl_peserta.id_user', 'left')
            ->join('tbl_event', 'tbl_event.id_event = tbl_peserta.id_event', 'left')
            ->where('tbl_peserta.id_event',  $id_event);
        return $this->db->get()->result();
    }
    function listFix($id_event, $field, $where)
    {
        $this->db->select('tbl_peserta.*, 
                            tbl_user.*')
            ->from('tbl_peserta')
            ->join('tbl_user', 'tbl_user.id_user = tbl_peserta.id_user', 'left')
            ->join('tbl_event', 'tbl_event.id_event = tbl_peserta.id_event', 'left')
            ->where('tbl_peserta.id_event',  $id_event)
            ->where($field, $where);
        return $this->db->get()->result();
    }

    function listFilterPeserta($id_event, $params)
    {
        $this->db->select('tbl_peserta.*, 
                            tbl_user.*')
            ->from('tbl_peserta')
            ->join('tbl_user', 'tbl_user.id_user = tbl_peserta.id_user', 'left')
            ->join('tbl_event', 'tbl_event.id_event = tbl_peserta.id_event', 'left')
            ->where('tbl_peserta.id_event',  $id_event)
            ->where('tbl_user.is_ptik', $params);
        return $this->db->get()->result();
    }

    function listPembayaran($id_event)
    {
        $this->db->select('tbl_tagihan.*, 
                            tbl_user.namalengkap,
                            tbl_user.nohp,
                            tbl_user.nim,
                            tbl_event.nama_event')
            ->from('tbl_tagihan')
            ->join('tbl_user', 'tbl_user.id_user = tbl_tagihan.id_user', 'left')
            ->join('tbl_event', 'tbl_event.id_event = tbl_tagihan.id_event', 'left')
            ->where('tbl_tagihan.id_event',  $id_event);
        return $this->db->get()->result();
    }
    function listPembayaranValid($id_event, $field, $where)
    {
        $this->db->select('tbl_tagihan.*, 
                            tbl_user.namalengkap,
                            tbl_user.nohp,
                            tbl_user.nim,
                            tbl_event.nama_event')
            ->from('tbl_tagihan')
            ->join('tbl_user', 'tbl_user.id_user = tbl_tagihan.id_user', 'left')
            ->join('tbl_event', 'tbl_event.id_event = tbl_tagihan.id_event', 'left')
            ->where('tbl_tagihan.id_event',  $id_event)
            ->where($field,  $where);
        return $this->db->get()->result();
    }

    function detailPembayaran($id_tagihan)
    {
        $this->db->select('tbl_tagihan.*, 
                        tbl_user.namalengkap,
                        tbl_event.nama_event,
                        tbl_event.biaya')
            ->from('tbl_tagihan')
            ->join('tbl_user', 'tbl_user.id_user = tbl_tagihan.id_user', 'left')
            ->join('tbl_event', 'tbl_event.id_event = tbl_tagihan.id_event', 'left')
            ->where('id_tagihan', $id_tagihan);
        return $this->db->get()->row();
    }

    function detailPeserta($id_peserta)
    {
        $this->db->select('tbl_peserta.*, 
                            tbl_user.*,
                            tbl_event.nama_event')
            ->from('tbl_peserta')
            ->join('tbl_user', 'tbl_user.id_user = tbl_peserta.id_user', 'left')
            ->join('tbl_event', 'tbl_event.id_event = tbl_peserta.id_event', 'left')
            ->where('tbl_peserta.id_peserta',  $id_peserta);
        return $this->db->get()->row();
    }
}
