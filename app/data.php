<?php
include 'saru.php';
$path = "/courses/b-sc.php";
  preg_match_all('/[a-z\-A-Z.]+/', $path, $matches);
  //print_r($matches);
  if(isset($matches[0][0])){
    switch ($matches[0][0]) {
      case 'courses':
        include 'data/courses/class.php';
        $course = new course($path);
        echo $course->json;
        break;
      case 'events':
        echo "events";
        break;
      case 'market':
        echo "market";
        break;
      case 'news':
        echo "news";
        break;
      case 'contact':
        echo "contact";
        break;
      case "about":
        echo "about";
        break;
      default:
         echo '404';
        break;
    }
  }
 ?>
