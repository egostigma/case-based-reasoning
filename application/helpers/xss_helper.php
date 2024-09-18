<?php
defined('BASEPATH') or exit('No direct script access allowed');

function clean($str)
{
    echo htmlentities($str, ENT_QUOTES, 'UTF-8');
}
