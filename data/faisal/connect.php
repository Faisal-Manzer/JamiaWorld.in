<?php
/*
$user = 'root';
$password = 'root';
$db = 'inventory';
$host = 'localhost';
$port = 8889;

$link = mysql_connect(
   "$host:$port",
   $user,
   $password
);
*/
/**
 *
 */
class sql
{
  private $user;
  private $pass;
  private $db;
  private $host;
  private $port;
  protected $conn;
  protected $is_conn = 0;
  protected $conn_err= '';
  protected $err = "";
  protected $query = "";
  protected $insert_id = "";
  protected $result;

  function __construct($db, $user = "root", $pass = "root", $host = "localhost:8889"){
    $this->user = $user;
    $this->password = $pass;
    $this->host = $host;
    $this->db = $db;
    $this->conn = new mysqli($servername, $username, $pass, $db);
    if ($this->conn->connect_error) {
      $this->conn_err = $this->conn->connect_error;
      $this->is_conn = 0;
    }
    else{
      $this->is_conn = 1;
    }
  }

  protected function execute($sql){
    $this->result = $this->conn->query(htmlspecialchars($sql));
  }

}
?>
