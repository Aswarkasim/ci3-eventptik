<?php


defined('BASEPATH') or exit('No direct script access allowed');

class NewTemplate extends CI_Controller
{

    public function index()
    {
        $this->load->view('template');
    }

    function barulagi()
    {
        $this->load->view('barulagi');
    }
}

/* End of file NewTemplate.php */
