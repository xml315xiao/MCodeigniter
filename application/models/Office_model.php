<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Office_model extends MY_Model
{
    public $table = 'office';
    public $primary_key = 'office_id';

    public function __construct()
    {
        parent::__construct();
    }

}