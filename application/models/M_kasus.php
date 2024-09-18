<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kasus extends MY_Model
{
    public $table       = 'kasus';
    public $primary_key = 'kasus_id';
    public $fillable    = array('kerusakan_id', 'gejala_id', 'kasus_bobot');
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
