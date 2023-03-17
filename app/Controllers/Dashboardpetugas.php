<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboardpetugas extends BaseController
{
	public function index(){
		$data['intro']='<div class="jumbotron mt-0">
		<h1>Halo, '.session()->get('username').'</h1>
		<p><i>Silahkan gunakan halaman ini untuk menampilkan seputar data Aplikasi SPP ini !</i></p>
		<p>Tanggal Login : '.date('d M Y').'</p>
	  </div>';
		return view('Dashboard',$data);
}
}