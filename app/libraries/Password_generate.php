<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Password_generate
{
	public function encode($s)
	{
		return md5(sha1(sha1(sha1(sha1(sha1($s))))));
	}
	public function verify($pass,$string_encode)
	{
		if($string_encode === self::encode($pass))
			return TRUE;
		return FALSE;
	}
}