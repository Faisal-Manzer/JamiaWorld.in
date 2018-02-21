<?php
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
  protected $result_arr = array();

  function __construct($db, $user = "root", $pass = "root", $host = "localhost:8889"){
    $this->user = $user;
    $this->password = $pass;
    $this->host = $host;
    $this->db = $db;
    $this->conn = new mysqli($host, $user, $pass, $db);
    if ($this->conn->connect_error) {
      $this->conn_err = $this->conn->connect_error;
      $this->is_conn = 0;
    }
    else{
      $this->is_conn = 1;
    }
  }
  protected function execute($sql)
  {
      $this->query = $sql;
      $this->result = mysqli_query($this->conn, $sql);
      $this->insert_id = $this->conn->insert_id;
      $this->err = mysqli_error($this->conn);
      echo $this->err;
  }
  protected function select($sql){
      $this->execute($sql);
      echo $this->err;
      if ($this->result->num_rows > 0) {
          while($row = $this->result->fetch_assoc()) {
              array_push($this->result_arr, $row);
          }
      }
  }
  protected function insert($rows, $table){
      $row = "";
      $values = "";
      foreach ($rows as $name => $value){
          $row .= $name.", ";
          $values .= "'".$value."', ";
      }
      $row = substr($row, 0, -2);
      $values = substr($values, 0, -2);

      $sql = "INSERT INTO ".$table." (".$row.") VALUE (".$values.");";
      $this->execute($sql);

  }

}
?>
