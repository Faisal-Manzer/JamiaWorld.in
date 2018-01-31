<?php
include 'faisal/saru.php';
function index()
{
  $tr = array('type'=>'card','eclass'=>'red darken-4 jw-inverted-text --jw-basic','title'=>'Index Page Goes Here','cont'=>'Work to be done here :(');
  echo json_encode($tr);
}
if(isset($_POST['path'])){
  $path = $_POST['path'];
  preg_match_all('/[a-z\-A-Z.]+/', $path, $matches);
  if(isset($matches[0][0])){
    switch ($matches[0][0]) {
      case 'courses':
        include 'courses.php';
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
      case 'index.php':
      case 'index.html':
        index();
        break;
      default:
        $tr = array('type'=>'card','eclass'=>'red darken-4 jw-inverted-text --jw-basic','title'=>'4o4 Not Found','cont'=>'The Requested URl Not found :(');
        echo json_encode($tr);
        break;

    }
  }
  else{
    index();
  }
}
 ?>
