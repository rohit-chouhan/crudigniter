<?php

namespace App\Controllers;

class Home extends BaseController
{
	// public $key;
	// public function __construct(){
	// 	$ok = 123;
	// 	if($ok == 123){
	// 		echo 'ok';
	// 	} else {
	// 		echo 'not ok';
	// 	}
	// }
	public function index()
	{
		return view('welcome_message');
	}

	public function form(){
		return view('form');
	}
}
