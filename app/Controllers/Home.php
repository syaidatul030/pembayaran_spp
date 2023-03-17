<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('/v_login_siswa');
	}

	public function home()
	{
		return view('/welcome_message');
	}


}
