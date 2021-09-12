<?php

namespace App\Controllers;
//info@Float.com
class Delete extends BaseController
{
  public $conn;
  public function __construct()
  {
    helper(['url']);
    helper(['text']);
    $this->conn = \Config\Database::connect();
  }

  public function index($table)
  {
    $tables = $this->conn->query("SHOW TABLES FROM `" . $this->conn->database . "`  WHERE `Tables_in_" . $this->conn->database . "` LIKE '%" . $table . "%'")->getResult();
    $the_table = 'Tables_in_' . $this->conn->database . '';
    if ($tables[0]->$the_table == $table) {
      $request = \Config\Services::request();
      $rawData = file_get_contents("php://input");
      if ($rawData == '' and $request->getGet('all') == 'true') {
        $this->deleteDataAll($table);
      } else {
        $this->deleteData($table, $rawData);
      }
    } else {
      echo json_encode(array("status" => false, "message" => "Table not found"));
    }
  }

  public function deleteDataAll($table)
  {
    $q = $this->conn->table($table);
    if ($q->emptyTable()) {
      echo json_encode(array("status" => true, "message" => "All data has been deleted"));
    } else {
      echo json_encode(array("status" => false, "message" => "Problem while deleting data, check your data"));
    }
  }
  public function deleteData($table, $rawData)
  {
    $q = $this->conn->table($table);
    $json = json_decode($rawData, true);
    foreach ($json as $key => $val) {
      $q->where($key, $val);
    }
    if ($q->delete()) {
      echo json_encode(array("status" => true, "message" => "Data has been deleted"));
    } else {
      echo json_encode(array("status" => false, "message" => "Problem while deleting data, check your data"));
    }
  }
}
