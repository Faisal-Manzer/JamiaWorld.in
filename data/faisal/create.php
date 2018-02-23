<?php
    include "connect.php";
    class create extends sql{
        function __construct($db, $user = "root", $pass = "root", $host = "localhost:8889")
        {
            parent::__construct($db, $user, $pass, $host);
            $sql = "CREATE TABLE course(
                      sno INT NOT NULL AUTO_INCREMENT,
                      name VARCHAR(50) NOT NULL,
                      id VARCHAR(100) NOT NULL UNIQUE,
                      sup_branch VARCHAR(50) NOT NULL,
                      internal BOOLEAN NOT NULL DEFAULT  'FALSE',
                      external BOOLEAN NOT NULL 'FALSE',
                      PRIMARY (sno)
)";
    $this->execute($sql);
    echo "courses: ".$this->result." err: ".$this->err;
    $sql = "CREATE TABLE basic(
              id VARCHAR(100) NOT NULL UNIQUE,
              duration VARCHAR(255),
              seats VARCHAR(255),
              reservation VARCHAR(255),
              intro  
)";
        }
    }
    $conn = new create("jw");

?>