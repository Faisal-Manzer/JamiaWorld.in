<?php
include 'data/faisal/saru.php';
header("HTTP/1.1 200 OK");
$appshell = file_get_contents("app/appshell.html");
echo mini($appshell);
?>
