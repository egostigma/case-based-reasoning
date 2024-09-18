<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_konsultasi_gejala extends MY_Model
{
    public $table       = 'konsultasi_gejala';
    public $primary_key = 'konsultasi_gejala_id';
    public $fillable    = array('konsultasi_id', 'gejala_id');
    public $protected   = array();

    public function __construct()
    {
        $this->timestamps = false;
        /*
        $this->has_one = array(
        'dp' => array('M_bf', 'No_KwDP', 'No_KwDP'),
        );
         */
        parent::__construct();
    }
}
