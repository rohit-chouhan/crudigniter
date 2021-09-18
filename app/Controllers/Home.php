<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index(){
		echo json_encode(array(
			"status"=>true,
			"message"=>"Read documentation here https://rohit-chouhan.github.io/crudigniter/"
		));
	}
}
