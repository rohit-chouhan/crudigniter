<?php

namespace App\Models;

use CodeIgniter\Model;

class Auth extends Model
{
	//check authorization is true or not
    public function AuthCheck(){
        if(getenv('SECURITY_CONFIG') == true){
			if($this->getToken() == getenv('TOKEN_KEY')) {
				return true;
			} else {
				return false;
			}
		} else {
			return true;
		}
    }

	//method to read bearer token
    public function getToken(){
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        }
        else if (isset($_SERVER['HTTP_AUTHORIZATION'])) { 
            $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
        } elseif (function_exists('apache_request_headers')) {
            $requestHeaders = apache_request_headers();
            $requestHeaders = array_combine(array_map('ucwords', array_keys($requestHeaders)), array_values($requestHeaders));
            if (isset($requestHeaders['Authorization'])) {
                $headers = trim($requestHeaders['Authorization']);
            }
        }
		if (!empty($headers)) {
			if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
				return $matches[1];
			}
			return null;
		}
    }
}
