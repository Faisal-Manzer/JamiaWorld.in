<?php
/**
 *
 */
class course
{
  private $r_url;
  private $course;
  private $arr;
  public $json;
  private $title;
  private $details = array("branches" => array(), "seats" => "", "cont" => "");
  private $examination = array("Exam"=>"Jamia", );
  function __construct($path)
  {
    preg_match_all('/[a-z\-A-Z.]+/', $path, $matches);
    $this->r_url = $matches;
    //echo "ok fine";
    //print_r($this->r_url);
    $this->course = $this->r_url[0][0];
    $this->arr = array(
      "type" => 'card',
      "title" => 'Hi',
      "cont" => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'
    );
    $this->json = json_encode($this->arr);
    //echo $this->card_json;
  }
}
 ?>
