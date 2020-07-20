<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Crud_model extends CI_Model
{

    public function listing($table, $limit = null, $offset = null)
    {
        $query = $this->db->select('*')
            ->from($table)
            ->limit($limit)
            ->offset($offset)
            ->get();
        return $query->result();
    }

    public function listingOne($table, $field, $where)
    {
        $query = $this->db->select('*')
            ->from($table)
            ->where($field, $where)
            ->get();
        return $query->row();
    }





    public function listingOneAll($table, $field, $where, $limit = null, $offset = null)
    {
        $query = $this->db->select('*')
            ->from($table)
            ->where($field, $where)
            ->limit($limit)
            ->offset($offset)
            ->get();
        return $query->result();
    }

    public function add($table, $data)
    {
        $this->db->insert($table, $data);
    }

    public function edit($table, $field, $where, $data)
    {
        $this->db->where($field, $where);
        $this->db->update($table, $data);
    }

    public function delete($table, $field, $where)
    {
        $this->db->where($field, $where);
        $this->db->delete($table);
    }

    public function login($username, $password)
    {
        $this->db->select('*')
            ->from('tbl_user')
            ->where(array(
                'username'      => $username,
                'password'   => sha1($password)
            ));
        $query = $this->db->get();
        return $query->row();
    }
    public function loginAdmin($username, $password)
    {
        $this->db->select('*')
            ->from('tbl_admin')
            ->where(array(
                'username_admin'      => $username,
                'password'   => sha1($password)
            ));
        $query = $this->db->get();
        return $query->row();
    }

    public function loginUsername($username, $password)
    {
        $this->db->select('*')
            ->from('tbl_user')
            ->where(array(
                'username'      => $username,
                'password'   => sha1($password)
            ));
        $query = $this->db->get();
        return $query->row();
    }

    function listingUser()
    {
        $this->db->select('tbl_user.*,
                            tbl_user_role.role')
            ->from('tbl_user')
            ->join('tbl_user_role', 'tbl_user_role.id_role = tbl_user.id_role', 'LEFT');
        return $this->db->get()->result();
    }

    function countTanggapan($id_post)
    {
        $tgp = $this->db->select('*')
            ->from('tbl_tanggapan')
            ->where('id_post', $id_post)
            ->get();
        return $tgp->result();
    }
}
