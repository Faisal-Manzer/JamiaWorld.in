<?php
$int_courses = array('X','XII','Diploma','B Tech.','B E','B Arch','B A','B Sc','B Ed','BComm','M A','M Sc','MBA','M Tech');
$ext_courses = array('VI','IX','XI','B A','B Arch','B E','B Ed','B Sc','B Tech','Diploma','M A','M Sc','Mass Comm','Fine Arts','Physiotherapy');
$all_courses = array_unique(array_merge($ext_courses,$int_courses));
if(isset($_REQUEST)){
  $courses = array_fill_keys($all_courses,null);
  echo json_encode($courses);
}
 ?>
