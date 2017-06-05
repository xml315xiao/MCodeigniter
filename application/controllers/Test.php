<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller
{
    public function index()
    {
        /*
         * --------------------------------------
         * Session test
         * -------------------------------------
            $this->load->library('session');
            header('Content-type:text/plain;charset=utf-8');
            print_r(get_config());
            $this->session->set_userdata('user', 'XML');
            print_r($this->session->userdata('user'));
            $this->session->username = 'xml315';
            print_r($this->session->userdata());
        */

        /*
         * ---------------------------------------
         * Curl test
         * ---------------------------------------
         *
         */
        $this->load->helper('util');
        header('content-type:text/plain;charset=utf-8');
//        print_r(curl_request('http://www.baidu.com'));
        $this->load->library('curl');
//        print_r($this->curl->simple_get('http://www.baidu.com'));
//        $this->curl->simple_post('controller/method', array('foo'=>'bar'));
//        $this->curl->simple_post('user/test');

//        print_r(fetch_ip_info(random_ip()));

//        $this->load->helper('captcha');
//        $result = create_captcha();
//        echo '<img src="'. $result['image']. '">';



        $this->load->model('Customer_model');
//        $this->Customer_model->test();
        $res = $this->Customer_model->get(1001);
        print_r($this->db->last_query());
        print_r($res->contact_name);
        $res = $this->Customer_model->get_by('contact_name', '刘小姐');
        print_r($this->db->last_query());
        print_r($res);
        $res = $this->Customer_model->get_many_by('contact_name', '刘小姐');
        print_r($this->db->last_query());
        print_r($res);
        $res = $this->Customer_model->get_by(['customer_id'=>'1002']);
        print_r($res);
        $res = $this->Customer_model->get_row('contact_name', ['customer_id'=>1001]);
        print_r($res);
//        $res = $this->c


//        print_r($res);
        /*
         * ----------------------------------------
         *
         * ----------------------------------------
         */

    }

    public function running()
    {
        echo '=============';
    }

}