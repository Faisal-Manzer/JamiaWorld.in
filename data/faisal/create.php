<?php
    include "connect.php";
    class create extends sql{
        function __construct($db, $user = "root", $pass = "root", $host = "localhost:8889")
        {
            parent::__construct($db, $user, $pass, $host);
            $sql = "CREATE TABLE course(
                      sno INT NOT NULL AUTO_INCREMENT,
                      name VARCHAR(50) NOT NULL,
                      token VARCHAR(50) NOT NULL,
                      jid VARCHAR(50),
                      branch INT NOT NULL,
                      internal BOOLEAN NOT NULL DEFAULT  'FALSE',
                      external BOOLEAN NOT NULL 'FALSE',
)";
    $this->execute($sql);
    $sql = "CREATE TABLE basic(
              sno INT NOT NULL AUTO_INCREMENT,
              token VARCHAR(50) NOT NULL,
              time INT,
              seat INT,
              reservation VARCHAR(255),
              branch VARCHAR(255),
              intro LONGTEXT 
)";
        }
    }
    $conn = new create("jw");

?>