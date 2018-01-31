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
  protected $err = "";
  protected $query = "";
  protected $insert_id = "";
  protected $result;

  function __construct($user = "root", $pass = "root", $host = "localhost:8889", $db)
  {
    $this->user = $user;
    $this->password = $pass;
    $this->host = $host;
    $this->db = $db;
    $this->conn = new mysqli($servername, $username, $pass, $db);
    //echo "conn";
  }

  protected function execute($sql){
    
    }
}
?>
