<?php

namespace App\Controllers;

class Create extends BaseController
{
    public $conn;
    public function __construct(){
            helper(['url']);
            helper(['text']);
            $this->conn = \Config\Database::connect();
    }

	public function index($table)
	{
          $tables=$this->conn->query("SHOW TABLES FROM `".$this->conn->database."`  WHERE `Tables_in_".$this->conn->database."` LIKE '%".$table."%'")->getResult();
          $the_table = 'Tables_in_'.$this->conn->database.'';
          if($tables[0]->$the_table == $table) {
           $request = \Config\Services::request();
           $rawData = file_get_contents("php://input");
           $records = json_decode($rawData,true);

           if(count($_GET)==0){
              $this->createData($records,$table);
           } else if(array_key_exists("form",$_GET)){

              if(array_key_exists("image",$_GET)){
                $images = explode(",",$_GET['image']);
                for($i=0;$i<count($images);$i++){
                  $file = $request->getFile($images[$i]);
                  $file->move('./uploads',$file->getRandomName());
                  $_POST[$images[$i]]=$file->getName();
                }
              }
              
              $this->createData($_POST,$table);

           }

        } else {
            echo json_encode(array("status"=>false,"message"=>"Table not found"));
        }
	}
    public function createData($arr,$table){
      $q = $this->conn->table($table);
      $data = $arr;

      if($q->insert($data)){
        echo json_encode(array("status"=>true,"message"=>"Records added successfully"));
      } else {
        echo json_encode(array("status"=>false,"message"=>"Problem while adding data, check your data"));
      }
    }
}
