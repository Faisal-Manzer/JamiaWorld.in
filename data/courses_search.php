<?php
$int_courses = array('X','XII','Diploma','B Tech.','B E','B Arch','B A','B Sc','B Ed','BComm','M A','M Sc','MBA','M Tech');
$ext_courses = array('VI','IX','XI','B A','B Arch','B E','B Ed','B Sc','B Tech','Diploma','M A','M Sc','Mass Comm','Fine Arts','Physiotherapy');
$all_courses = array_unique(array_merge($ext_courses,$int_courses));
if(1){
    include "faisal/connect.php";
    class idk extends sql{
        function __construct()
        {
            parent::__construct("jw");
            $this->select("SELECT * FROM seo WHERE section='preparation'");
            if(!empty($this->result_arr)){
                $courses = array(
                    "data" => array(),
                "url" => array(),
                );
                for($i=0; $i<count($this->result_arr); $i++){
                    $cou = $this->result_arr[$i]["title"];
                    $courses["data"][$cou] = null;
                    $courses["url"][$cou] = $this->result_arr[$i]["id"];
                }
                echo json_encode($courses);
            }
        }
    }
    $faisal = new idk();
}
 ?>
