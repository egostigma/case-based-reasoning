<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kerusakan extends MY_Model
{
    public $table       = 'kerusakan';
    public $primary_key = 'konsultasi_id';
    public $fillable    = array('kerusakan_nama', 'kerusakan_solusi');
    public $protected   = array();

    public function __construct()
    {
        $this->timestamps = true;
        /*
        $this->has_one = array(
        'dp' => array('M_bf', 'No_KwDP', 'No_KwDP'),
        );
         */
        parent::__construct();
    }
}
