<?php
    include "connect.php";
    class create extends sql{
        function __construct()
        {
            parent::__construct("jw");
            $sql = "CREATE TABLE courses(
                      sno INT NOT NULL AUTO_INCREMENT,
                      name VARCHAR(50) NOT NULL,
                      id VARCHAR(100) NOT NULL UNIQUE,
                      sup_branch VARCHAR(50) NOT NULL,
                      internal BOOLEAN NOT NULL DEFAULT  0,
                      external BOOLEAN NOT NULL DEFAULT 0,
                      gurl VARCHAR(255) NOT NULL,
                      PRIMARY KEY (sno)
)";
    $this->execute($sql);
    echo "courses: ".$this->result." err: ".$this->err;
    $sql = "CREATE TABLE basic(
              id VARCHAR(100) NOT NULL UNIQUE,
              duration VARCHAR(255),
              seats VARCHAR(255),
              reservation VARCHAR(255),
              intro TEXT,
              PRIMARY KEY (id)
)";
    $this->execute($sql);
    echo "basic: ".$this->result." err: ".$this->err;
    $sql = "CREATE TABLE exam(
              id VARCHAR(100) NOT NULL UNIQUE,
              type VARCHAR(255),
              open VARCHAR(50),
              close VARCHAR(50),
              link TEXT,
              duration VARCHAR(50),
              pattern VARCHAR(255),
              level VARCHAR(255),
              price VARCHAR(255),
              intro TEXT,
              PRIMARY KEY (id)
)";
    $this->execute($sql);
    echo " exam: ".$this->result." err: ".$this->err;
    $sql = "CREATE TABLE seo(
              id VARCHAR(255) NOT NULL UNIQUE, 
              description VARCHAR(255),
              title VARCHAR(50),
              section VARCHAR(50),
              time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (id)
)";
    $this->execute($sql);
    echo " seo: ".$this->result." err: ".$this->err;
        }
    }
    $conn = new create();

?>