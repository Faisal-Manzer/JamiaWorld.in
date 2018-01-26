<?php
include 'app/appshell.php';
include 'app/saru.php';
header("HTTP/1.1 200 OK");
$appshell = file_get_contents("app/appshell.html");
echo mini($appshell);
?>
