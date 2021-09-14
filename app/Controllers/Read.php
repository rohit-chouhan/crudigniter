<?php

namespace App\Controllers;

class Read extends BaseController
{
  public $conn;
  public $auth;
  public $request;
  public function __construct()
  {
    helper(['url']);
    helper(['text']);
    $this->conn = \Config\Database::connect();
    $this->auth = new \App\Models\Auth();
    $this->request = \Config\Services::request();
  }

  public function index($table)
  {
    if($this->auth->AuthCheck()){
    $tables = $this->conn->query("SHOW TABLES FROM `" . $this->conn->database . "`  WHERE `Tables_in_" . $this->conn->database . "` LIKE '%" . $table . "%'")->getResult();
    $the_table = 'Tables_in_' . $this->conn->database . '';
    if ($tables[0]->$the_table == $table) {
     
      // if no any stringquiry found
      if (count($_GET) == 0) {
        $data = $this->conn->table($table)->get()->getResult();
      } else {
        //when custom 
        if (array_key_exists("query", $_GET)) {

          $fword = explode(' ', trim($this->request->getGet('query')));
          if ($fword[0] == 'select' || $fword[0] == 'SELECT') {
            $data =  $this->conn->query($this->request->getGet('query'))->getResult();
          } else {
            $data = array(
              "status" => false,
              "message" => "only select query will apply."
            );
          }
        } else if (array_key_exists("only", $_GET)) {
          $data = $this->conn->table($table)->select($_GET['only'])->get()->getResult();
        }
        //--- joins
        else if (array_key_exists("leftjoin", $_GET)) {
          $to = explode(",", $_GET['on']);
          $data = $this->conn->table($table)->select('*')->join($_GET['leftjoin'], '' . $table . '.' . $to[0] . ' = ' . $_GET['leftjoin'] . '.' . $to[1] . '', 'left')->get()->getResult();
        } else if (array_key_exists("rightjoin", $_GET)) {
          $to = explode(",", $_GET['on']);
          $data = $this->conn->table($table)->select('*')->join($_GET['rightjoin'], '' . $table . '.' . $to[0] . ' = ' . $_GET['rightjoin'] . '.' . $to[1] . '', 'right')->get()->getResult();
        } else if (array_key_exists("innerjoin", $_GET)) {
          $to = explode(",", $_GET['on']);
          $data = $this->conn->table($table)->select('*')->join($_GET['innerjoin'], '' . $table . '.' . $to[0] . ' = ' . $_GET['innerjoin'] . '.' . $to[1] . '', 'inner')->get()->getResult();
        } else if (array_key_exists("leftouterjoin", $_GET)) {
          $to = explode(",", $_GET['on']);
          $data = $this->conn->table($table)->select('*')->join($_GET['leftouterjoin'], '' . $table . '.' . $to[0] . ' = ' . $_GET['leftouterjoin'] . '.' . $to[1] . '', 'left outer')->get()->getResult();
        } else if (array_key_exists("rightouterjoin", $_GET)) {
          $to = explode(",", $_GET['on']);
          $data = $this->conn->table($table)->select('*')->join($_GET['rightouterjoin'], '' . $table . '.' . $to[0] . ' = ' . $_GET['rightouterjoin'] . '.' . $to[1] . '', 'right outer')->get()->getResult();
        } else if (array_key_exists("fullouterjoin", $_GET)) {
          $to = explode(",", $_GET['on']);
          $data = $this->conn->table($table)->select('*')->join($_GET['fullouterjoin'], '' . $table . '.' . $to[0] . ' = ' . $_GET['fullouterjoin'] . '.' . $to[1] . '', 'full outer')->get()->getResult();
        }
        //-- joins
        else if (array_key_exists("columns", $_GET)) {
          $data =  $this->conn->query("SELECT COLUMN_NAME as name, DATA_TYPE as datatype , COLUMN_TYPE as columntype , CHARACTER_MAXIMUM_LENGTH AS length FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = N'users' AND COLUMN_NAME NOT IN ('USER','CURRENT_CONNECTIONS','TOTAL_CONNECTIONS') AND TABLE_SCHEMA = 'dbapi'")->getResult();
        } else {
          //for all
          $data = $this->conn->table($table);
          foreach ($_GET as $key => $value) {
            //ignore not stringquery
            if ($key == 'not') {
              continue;
            }

            if ($key == 'single') {
              continue;
            }

            $data = $data->where($key, $value); //getting by one like ?name=Rohit
          }

          $data = $data->get()->getResult();
        }
      }

      //pass all data to $data
      //ignoring all columns from not StringQuery
      if (array_key_exists("not", $_GET)) {
        $where = explode(",", $_GET['not']);
        for ($i = 0; $i < count($data); $i++) {
          for ($j = 0; $j < count($where); $j++) {
            $val = $where[$j];
            unset($data[$i]->$val);
          }
        }
      }

      if (array_key_exists("single", $_GET)) {
        echo json_encode($data[0]);
      } else {
        echo json_encode($data);
      }
    } else {
      echo json_encode(array("status" => false, "message" => "Table not found"));
    }
    } else {
      echo json_encode(array("status" => false, "message" => "Failed to auth, token is invalid"));
    }
  }
}
