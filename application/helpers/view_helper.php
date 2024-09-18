<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Jenssegers\Blade\Blade;

if (!function_exists('view')) {
    function view($view, $data = [], $CI = [])
    {

        $CI = &get_instance();

        $path  = APPPATH . 'views';
        $blade = new Blade($path, $path . '\cache');

        echo $blade->make($view, $data, $CI);
    }
}
