<?php
defined('BASEPATH') or exit('No direct script access allowed');

use Jenssegers\Blade\Blade;

class Template
{
    public function __construct()
    {
        $path = [
            APPPATH . 'views'
        ];
        $cachePath = APPPATH . 'views\cache';
        
        
        $this->factory = new Blade($path, $cachePath);
    }
    public function view($path, $vars = [])
    {
        echo $this->factory->make($path, $vars);
    }
    public function exists($path)
    {
        return $this->factory->exists($path);
    }
    public function share($key, $value)
    {
        return $this->factory->share($key, $value);
    }
    public function render($path, $vars = [])
    {
        return $this->factory->make($path, $vars)->render();
    }
}