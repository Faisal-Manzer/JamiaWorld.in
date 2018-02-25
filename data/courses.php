<?php
/**
 */
include 'faisal/connect.php';
class course extends sql
{
  private $r_url;
  private $course;
  private $arr;
  public $json;
  private $title;
  private $basic_info;
  private $studyMaterial = array();
  private $course_main_arr = array();
  private $course_navigate_arr = array();
  private $course_request_arr = array();
  function __construct($path){
    preg_match_all('/[a-z\-A-Z.]+/', $path, $matches);
    $this->r_url = $matches;
    $this->course = $this->r_url[0][0];
    /*
    $this->arr = array(
      "type" => 'card',
      "title" => 'Hi',
      "ig" => 'cap1.jpeg',
      "cont" => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'

    );
    */
    $this->select("SELECT * FROM courses WHERE ");
      $this->arr = array(
          array(
              'type' => 'para',
              'title' => '<h4>B.Sc Maths</h4>',
              'cont' => ''
          ),
          array(
              'type' => 'collapsible',
              'options' => array(
                  'accordion' => false,
                  'active' => 0
              ),
              'items' => array(
                  array(
                      'title' => 'Basic Info',
                      'cont' => '',
                      'eclass' => 'active',
                      'saru' => array(
                          array(
                              'type' => 'table',
                              'items' => array(
                                  array(
                                      '<b>Duration</b>',
                                      '3 Years'
                                  ),
                                  array(
                                      '<b>Total Seat</b>',
                                      '50'
                                  ),
                                  array(
                                      '<b>Reservation',
                                      'Muslim (50) <br> OBC Muslim (30) <br> Muslim Women (34)'
                                  )
                              )
                          ),
                          array(
                              'type' => 'para',
                              'title' => '',
                              'cont' => implode(",", $this->r_url[0])
                          ),
                          array(
                              'type' => 'para',
                              'title' => 'Address',
                              'cont' => 'the map goes here'
                          )
                      )
                  ),
                  array(
                      'title' => 'Examination',
                      'cont' => '',
                      'saru' => array(
                          array(
                              'type' => 'table',
                              'items' => array(
                                  array(
                                      '<b>Exam</b>',
                                      '3 Years'
                                  ),
                                  array(
                                      '<b>Opening Date</b>',
                                      '29 Nov 2017'
                                  ),
                                  array(
                                      '<b>Closing Date</b>',
                                      '3 March 2018'
                                  ),

                                  array(
                                      '<b>Form Date</b>',
                                      '&#x20b9; 300'
                                  ),
                                  array(
                                      '<b>Examination Pattern</b>',
                                      '<b>Objective</b> <br> 100 Marks <br> 100 Questions'
                                  )
                              )
                          ),
                          array(
                              'type' => 'para',
                              'title' => '',
                              'cont' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, magnam.'
                          )
                      )
                  ),
                  array(
                      'title' => 'Study Material',
                      'cont' => '',
                      'saru' => array(
                          'type' => 'table',
                          'items' => array(
                              array(
                                  '<b>Sllabus</b>',
                                  '<a href="#">Download</a>'
                              ),
                              array(
                                  '<b>Previous Years</b>',
                                  '<a href="#">Download</a>'
                              ),
                              array(
                                  '<b>Sample Paper</b>',
                                  '<a href="#">Download</a>'
                              )
                          )
                      )
                  )
              )
          )
      );

      //$this->json = json_encode($this->arr);
    $this->setData();
  }
  function setData(){
    $this->json = json_encode($this->arr);
  }
}
/*

$this->arr = array(
  array(
    'type' => 'para',
    'title' => '<h4>B.Sc Maths</h4>',
    'cont' => ''
  ),
  array(
    'type' => 'collapsible',
    'options' => array(
      'accordion' => false,
      'active' => 0
    ),
    'items' => array(
      array(
        'title' => 'Basic Info',
        'cont' => '',
        'eclass' => 'active',
        'saru' => array(
          array(
            'type' => 'table',
            'items' => array(
              array(
                '<b>Duration</b>',
                '3 Years'
              ),
              array(
                '<b>Total Seat</b>',
                '50'
              ),
              array(
                '<b>Reservation',
                'Muslim (50) <br> OBC Muslim (30) <br> Muslim Women (34)'
              )
            )
          ),
          array(
            'type' => 'para',
            'title' => '',
            'cont' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, magnam.'
          ),
          array(
            'type' => 'para',
            'title' => 'Address',
            'cont' => 'the map goes here'
          )
        )
      ),
      array(
        'title' => 'Examination',
        'cont' => '',
        'saru' => array(
          array(
            'type' => 'table',
            'items' => array(
              array(
                '<b>Exam</b>',
                '3 Years'
              ),
              array(
                '<b>Opening Date</b>',
                '29 Nov 2017'
              ),
              array(
                '<b>Closing Date</b>',
                '3 March 2018'
              ),

              array(
                '<b>Form Date</b>',
                '&#x20b9; 300'
              ),
              array(
                '<b>Examination Pattern</b>',
                '<b>Objective</b> <br> 100 Marks <br> 100 Questions'
              )
            )
          ),
          array(
            'type' => 'para',
            'title' => '',
            'cont' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente, magnam.'
          )
        )
      ),
      array(
        'title' => 'Study Material',
        'cont' => '',
        'saru' => array(
          'type' => 'table',
          'items' => array(
            array(
              '<b>Sllabus</b>',
              '<a href="#">Download</a>'
            ),
            array(
              '<b>Previous Years</b>',
              '<a href="#">Download</a>'
            ),
            array(
              '<b>Sample Paper</b>',
              '<a href="#">Download</a>'
            )
          )
        )
      )
    )
  )
);

*/
 ?>
