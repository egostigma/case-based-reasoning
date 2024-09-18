<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_konsultasi extends MY_Model
{
    public $table       = 'konsultasi';
    public $primary_key = 'konsultasi_id';
    public $fillable    = array('');
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
