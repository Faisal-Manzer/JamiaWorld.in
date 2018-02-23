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
            $this->select("SELECT * FROM courses");
            if(!empty($this->result_arr)){
                $courses = array();
                for($i=0; $i<count($this->result_arr); $i++){
                    $cou = $this->result_arr[$i];
                    $funa = $cou["sup_branch"]." ".$cou["name"];
                    if($cou["sup_branch"]===$cou["name"])
                        $funa = $cou["name"];
                    $courses[$funa] = null;

                }
                echo json_encode($courses);
            }
        }
    }
    $faisal = new idk();
}
 ?>
