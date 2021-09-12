<?php

namespace App\Controllers;

class Update extends BaseController
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
      $records = json_decode($rawData, true);
      $this->updateData($records, $table, $_GET);
    } else {
      echo json_encode(array("status" => false, "message" => "Table not found"));
    }
  }
  public function updateData($arr, $table, $get)
  {
    $q = $this->conn->table($table);
    if (array_key_exists("all", $get)) {
    } else {
      foreach ($get as $key => $value) {
        $q = $q->where($key, $value);
      }
    }
    $data = $arr;
    if ($q->update($data)) {
      echo json_encode(array("status" => true, "message" => "Update successfully"));
    } else {
      echo json_encode(array("status" => false, "message" => "Problem while updating data, check your data"));
    }
  }
}
