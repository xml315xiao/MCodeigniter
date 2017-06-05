<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function index()
    {
        $this->load->library('session');
//        header('Content-type:text/plain;charset=utf-8');
//        print_r(get_config());
        $this->session->set_userdata('user', 'XML');
        print_r($this->session->userdata('user'));
        $this->session->username = 'xml315';
        print_r($this->session->userdata());

    }
}