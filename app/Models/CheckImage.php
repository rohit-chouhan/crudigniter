<?php

namespace App\Models;

use CodeIgniter\Model;

class CheckImage extends Model
{
    public function checkImage($image){
		$supported_image = array(
			'gif',
			'jpg',
			'jpeg',
			'png',
			'bmp',
			'pdf',
			'zip',
			'mp4',
			'mp3'
		);
		
		$src_file_name = $image;
		$ext = strtolower(pathinfo($src_file_name, PATHINFO_EXTENSION)); 
		if (in_array($ext, $supported_image)) {
			if(getenv('SUB_DOMAIN_ENABLE') == true){
				return "http://media.".str_replace(['http://','https://'],"",base_url())."/".$image;
			} else {
				return "".base_url()."/uploads/".$image;
			}
		} else {
			return $image;
		}
	}
}
