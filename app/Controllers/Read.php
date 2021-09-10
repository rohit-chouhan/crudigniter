<?php

namespace App\Controllers;

class Read extends BaseController
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
          // if no any stringquiry found
          if(count($_GET)==0){
            $data = $this->conn->table($table)->get()->getResult();
          } else {
            //when custom 
            if(array_key_exists("query",$_GET)){
              $data =  $this->conn->query($request->getGet('custom'))->getResult();;
            } else if(array_key_exists("only",$_GET)) {
                $data = $this->conn->table($table)->select($_GET['only'])->get()->getResult();
            } else if(array_key_exists("columns",$_GET)) {
                $data =  $this->conn->query("SELECT COLUMN_NAME as name, DATA_TYPE as datatype , COLUMN_TYPE as columntype , CHARACTER_MAXIMUM_LENGTH AS length FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'users' AND COLUMN_NAME NOT IN ('USER','CURRENT_CONNECTIONS','TOTAL_CONNECTIONS') AND TABLE_SCHEMA = 'dbapi'")->getResult();
            } else {
              //for all
              $data = $this->conn->table($table);
              foreach($_GET as $key=>$value)
              {
                //ignore not stringquery
                if($key=='not' ){
                  continue;
                }

                if($key=='single'){
                  continue;
                }

                $data = $data->where($key,$value); //getting by one like ?name=Rohit
              }
              
            $data = $data->get()->getResult();
            }
          }
          
          //pass all data to $data
         //ignoring all columns from not StringQuery
          if(array_key_exists("not",$_GET)){
            $where = explode(",",$_GET['not']); 
            for($i=0;$i<count($data);$i++){
              for($j=0;$j<count($where);$j++){
                  $val=$where[$j];
                  unset($data[$i]->$val);
                }
            }
           }

           if(array_key_exists("single",$_GET)){
            echo json_encode($data[0]);
          } else {
            echo json_encode($data);
          }

        } else {
            echo json_encode(array("status"=>false,"message"=>"Table not found"));
        }
	}
}
