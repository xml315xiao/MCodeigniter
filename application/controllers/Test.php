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
//        header('Content-type:text/plain;');
        $res = $this->Customer_model->get(1001);
        $res = $this->Customer_model->get_all();
        $res = $this->Customer_model->where('customer_name', '上海')->get();
        $res = $this->Customer_model->where_customer_name('上海')->get();
        $res = $this->Customer_model->where('customer_name', 'like', '上海')->get();
        $res = $this->db->like('customer_name', '上海')->from('customer')->limit(1)->get()->row();

        $res = $this->Customer_model->where('customer_name', 'like', '上海')->get_all();
        $res = $this->Customer_model->where([['customer_name', 'like', '上海'], ['contact_name', 'like', '刘']])->get_all();

//        $res = $this->Customer_model->insert(['customer_name'=>'XXXX', 'contact_name'=>'XXXX', 'phone'=>'0000-000000']);
        $res = $this->Customer_model->where('customer_name', 'XXXX')->limit(1)->update(['phone'=>'0571-888888']);
        $res = $this->Customer_model->as_object()->get(1001);

        $res = $this->Customer_model->fields('customer_name, contact_name, customer_id')->get(1001);
        $res = $this->Customer_model->fields('*count*')->get();

//        $res = $this->Customer_model->delete(1030);
//        $res = $this->Customer_model->trashed(1028);

        $res = $this->Customer_model->with_employee('fields:*count*')->get(1001);
        $this->load->model(['Employee_model', 'Office_model']);

        $res = $this->Employee_model->where('gender', '男')->with_customer('fields:*count*')->order_by('employee_id', 'desc')->get_all();

        $res = $this->Customer_model->count_rows();

        echo '<pre>';
        print_r($res);
        echo '</pre>';
//        $this->render_text();

//        print_r($res->contact_name);
//        $res = $this->Customer_model->get_by('contact_name', '刘小姐');
//        print_r($res);
//        $res = $this->Customer_model->get_many_by('contact_name', '刘小姐');
//        print_r($res);
//        $res = $this->Customer_model->get_by(['customer_id'=>'1002']);
//        print_r($res);
//        $res = $this->Customer_model->get_row('contact_name', ['customer_id'=>1001]);
//        print_r($res);

//        $this->set_var('username', 'xml');
//        $this->render(['data'=>['username'=>'xml']]);
//        $this->view('test/index')->render();

//        $this->render_text();
//        print_r($res);
        /*
         * ----------------------------------------
         *
         * ----------------------------------------
         */


    }

    public function running()
    {
        $this->view('test/index')->render();
    }

}