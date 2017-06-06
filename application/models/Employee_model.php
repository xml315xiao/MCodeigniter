<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends MY_Model
{
    public $table = 'employee';
    public $primary_key = 'employee_id';

    public $has_one = [
        'office' => [
            'foreign_model' => 'Office_model',
            'foreign_table' => 'office',
            'foreign_key'   => 'office_id',
            'local_key'     => 'office_id'
        ],
    ];

    public $has_many = [
        'customer' => [
            'foreign_model' => 'Customer_model',
            'foreign_table' => 'customer',
            'foreign_key'   => 'sale_employee_id',
            'local_key'     => 'employee_id'
        ]
    ];

    public function __construct()
    {
        parent::__construct();
    }
}