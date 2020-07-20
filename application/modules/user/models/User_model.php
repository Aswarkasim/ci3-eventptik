<?php


defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{

    public function listEvent($id_user, $limit = null, $offset = null)
    {
        $this->db->select('tbl_peserta.*,
                            tbl_event.nama_event,
                            tbl_event.poster,
                            tbl_event.tempat,
                            tbl_event.biaya,
                            tbl_event.tanggal')
            ->from('tbl_peserta')
            ->join('tbl_event', 'tbl_peserta.id_event = tbl_event.id_event', 'left')
            ->where('tbl_peserta.id_user', $id_user)
            ->where('tbl_peserta.is_hadir', '1')
            ->limit($limit)
            ->offset($offset)
            ->order_by('tbl_event.tanggal', 'DESC');
        return $this->db->get()->result();
    }

    public function listTagihan($id_user, $limit = null, $offset = null)
    {
        $this->db->select('tbl_tagihan.*, 
                        tbl_event.nama_event')
            ->from('tbl_tagihan')
            ->join('tbl_event', 'tbl_event.id_event = tbl_tagihan.id_event', 'left')
            ->where('tbl_tagihan.id_user', $id_user)
            ->limit($limit)
            ->offset($offset)
            ->order_by('tbl_tagihan.date_created', 'DESC');
        return $this->db->get()->result();
    }

    function is($table, $field1, $value1, $field2, $value2)
    {
        $this->db->select('*')
            ->from($table)
            ->where($field1, $value1)
            ->where($field2, $value2);
        return $this->db->get()->result();
    }

    function detailTagihan($id_tagihan)
    {
        $this->db->select('tbl_tagihan.*, 
                        tbl_user.namalengkap,
                        tbl_event.nama_event,
                        tbl_event.bank,
                        tbl_event.norek,
                        tbl_event.nama_rekening,
                        tbl_event.biaya')
            ->from('tbl_tagihan')
            ->join('tbl_user', 'tbl_user.id_user = tbl_tagihan.id_user', 'left')
            ->join('tbl_event', 'tbl_event.id_event = tbl_tagihan.id_event', 'left')
            ->where('id_tagihan', $id_tagihan);
        return $this->db->get()->row();
    }
}

/* End of file User_model.php */
