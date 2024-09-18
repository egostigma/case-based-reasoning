<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_gejala extends MY_Model
{
    public $table       = 'gejala';
    public $primary_key = 'gejala_id';
    public $fillable    = array('gejala_nama');
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
