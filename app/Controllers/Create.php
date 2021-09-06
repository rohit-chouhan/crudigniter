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
        $tables=$this->conn->query("SHOW TABLES FROM `".$this->conn->database."`  WHERE `Tables_in_".$this->conn->database."` LIKE '%users%'")->getResult();
        if($tables[0]->Tables_in_dbapi == $table) {
            $request = \Config\Services::request();
            $rawData = file_get_contents("php://input");
            $records = json_decode($rawData,true);
            $this->createData($records,$table);
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
