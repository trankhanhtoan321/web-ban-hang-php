<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!function_exists('get_excerpt'))
{
    function get_excerpt($string,$num=256)
    {
    	$s=strip_tags($string);
    	$s=substr($s, 0,$num);
    	return $s;
    }
}