<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends MY_Model
{
    public $table = 'customer';
    public $primary_key = 'customer_id';

    protected $timestamps = false;
    protected $return_as  = 'array';

    public $has_one = [
        'employee' => [
            'foreign_model'=>'Employee_model',
            'foreign_table'=>'employee',
            'foreign_key'  =>'employee_id',
            'local_key'    =>'sale_employee_id'
        ],
    ];

    public function __construct()
    {
        parent::__construct();
    }

}