<?php
include 'faisal/connect.php';
class course extends sql
{
    private $arr;
    public $json;
    private $basicArr = array();
    private $courseArr = array();
    private $examArr = array();

    function __construct($path)
    {
        parent::__construct("jw");
        preg_match_all('/[a-z\-A-Z.]+/', $path, $r_url);
        if (count($r_url[0]) > 2) {
            $this->select("SELECT * FROM courses WHERE name='" . $r_url[0][2] . "' AND sup_branch='" . $r_url[0][1] . "'");
            if(!empty($this->result_arr))
                $this->setAll(end($this->result_arr));
            else
                $this->cnf();
        }
        else if(count($r_url)==2) {
            $this->select("SELECT * FROM courses WHERE name='" . $r_url[0][1] . "' AND sup_branch='" . $r_url[0][1] . "'");
            if(!empty($this->result_arr)){
                $this->courseArr = end($this->result_arr);
                $this->courseArr["name"] = "";
                $this->setAll($this->result_arr);
            }
            else{
                $this->select("SELECT * FROM courses WHERE sup_branch='".$r_url[0][1]);
                if(!empty($this->result_arr)){
                    //-------
                    //---To Hamndel collections
                    //-------
                }
                else{
                    $this->cnf();
                }
            }
        }
        $this->json = json_encode($this->arr);
    }
    private function renameThis(&$name){
        $name = strtoupper($name);
        $name = preg_replace('/-/','.', $name);
    }
    private function sanitize(&$word){
        $word = nl2br($word);
    }
    private function setAll($res){
        $courseArr = $res;
        $id = $courseArr["id"];
        $basicSql = "SELECT * FROM basic WHERE id='".$id."'";
        $examSQl = "SELECT * FROM exam WHERE id='".$id."'";
        $this->select($basicSql);
        $basicArr = end($this->result_arr);
        $this->select($examSQl);
        $examArr = end($this->result_arr);
        //$this->setAll($courseArr,$basicArr,$examArr);
        $this->renameThis($courseArr["name"]);
        $this->renameThis($courseArr["sup_branch"]).".";
        $this->sanitize($basicArr["reservation"]);
        $this->sanitize($basicArr["intro"]);
        $this->sanitize($examArr["pattern"]);
        $this->sanitize($examArr["intro"]);
        if(!empty($examArr["link"])){
            $examArr["link"] = '<a target="_blank" href="'.$examArr["link"].'">Click Here</a>';
        }
        $this->arr = array(
            "type" => "card",
            "title" => "Sorry :(",
            "cont" => implode(",", $courseArr).implode(",",$basicArr).implode(",",$examArr)
        );
        $this->arr = array(
            array(
                'type' => 'para',
                'title' => '<h4>'.$courseArr["sup_branch"]." ".$courseArr["name"].'</h4>',
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
                                        $basicArr["duration"]
                                    ),
                                    array(
                                        '<b>Total Seat</b>',
                                        $basicArr["seats"]
                                    ),
                                    array(
                                        '<b>Reservation',
                                        $basicArr["reservation"]
                                    )
                                )
                            ),
                            array(
                                'type' => 'para',
                                'title' => '',
                                'cont' => $basicArr["intro"]
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
                                        '<b>Entrance Through</b>',
                                        $examArr["type"]
                                    ),
                                    array(
                                        '<b>Opening Date</b>',
                                        $examArr["open"]
                                    ),
                                    array(
                                        '<b>Closing Date</b>',
                                        $examArr["close"]
                                    ),

                                            array(
                                                '<b>Form Price</b>',
                                                $examArr["price"]
                                            ),
                                            array(
                                                '<b>Exam Pattern</b>',
                                                $examArr["pattern"]
                                            ),
                                            array(
                                                '<b>Examination Duration</b>',
                                                $examArr["duration"]
                                            ),
                                            array(
                                                '<b>Exam Level</b>',
                                                $examArr["level"]
                                            ),
                                            array(
                                                '<b>Form Link</b>',
                                                $examArr["link"]
                                            )
                                        )
                                    ),
                                    array(
                                        'type' => 'para',
                                        'title' => '',
                                        'cont' => $examArr["intro"]
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

            }
        private function cnf(){
            $this->arr = array(
                "type" => "para",
                "title" => "Sorry :(",
                "cont" => "The course u requested is currently not available, but u can contact our team for assistance."
            );
        }
}
?>