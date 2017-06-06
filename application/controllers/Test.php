<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends MY_Controller
{

    protected $model_file   = ['Customer_model'];
    protected $library_file = ['curl'];
    protected $help_file    = ['util'];

    public function index()
    {
        /*
         * --------------------------------------
         * Session test
         * -------------------------------------
            $this->load->library('session');
            header('Content-type:test/plain;charset=utf-8');
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
//        $this->load->helper('util');
//        header('content-type:test/plain;charset=utf-8');
//        print_r(curl_request('http://www.baidu.com'));
//        $this->load->library('curl');
//        print_r($this->curl->simple_get('http://www.baidu.com'));
//        $this->curl->simple_post('controller/method', array('foo'=>'bar'));
//        $this->curl->simple_post('user/test');
//        print_r(fetch_ip_info(random_ip()));

//        $this->load->helper('captcha');
//        $result = create_captcha();
//        echo '<img src="'. $result['image']. '">';

//        $this->Customer_model->test();
        $res = $this->Customer_model->get(1001);
        print_r($res->contact_name);
        $res = $this->Customer_model->get_by('contact_name', '刘小姐');
        print_r($res);
        $res = $this->Customer_model->get_many_by('contact_name', '刘小姐');
        print_r($res);
        $res = $this->Customer_model->get_by(['customer_id'=>'1002']);
        print_r($res);
        $res = $this->Customer_model->get_row('contact_name', ['customer_id'=>1001]);
        print_r($res);

        $this->set_var('username', 'xml');
        $this->render(['data'=>['username'=>'xml']]);

        $this->render_text();
//        print_r($res);
        /*
         * ----------------------------------------
         *
         * ----------------------------------------
         */

    }

    public function running()
    {

    }

}