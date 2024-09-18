<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_users extends MY_Model
{
    public $table       = 'users';
    public $primary_key = 'user_id';
    public $fillable    = array('user_name', 'user_email', 'user_pass', 'user_role');
    public $protected   = array();

    public function __construct()
    {
        $this->timestamps = false;
        parent::__construct();
    }
}
