<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class custom_presets
{

	protected $CI;
	public function Usertypes()
	{
		return array(
			'student' => 1,
			'teacher' => 2,
			'admin' => 3,
			'external' => 4,
		);

	}
	
	
}