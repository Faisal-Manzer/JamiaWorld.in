<?php
include "faisal/connect.php";
class indexpage extends sql{
    public $json;
    private $arr;
    function __construct($path)
    {
        parent::__construct("jw");
        $this->arr = array(
            array(
              "type" => "carousel",
                "eclass" => "carousel-slider center",
                "parent" => ".nc",
                "option" => array(
                    'fullWidth' => true,
                    'indicators' => true
                ),
                "items" => array(
                    array(
                        "eclass" => "jw-inverted",
                        "cont" => "<h2>JamiaWorld</h2><p class='white-text'>We provide you assistance through Jamia</p>"
                    ),
                    array(

                        "eclass" => "jw-market",
                        "cont" => "<h2>Entrance Preparation</h2><p class=''>We provide u material for Entrance Preparation for Jamia Exams</p>"
                    )
                )
            ),
            array(
                "type" => "para",
                "title" => "Prepare Ur Self For Jamia Entrance",
                "cont" => ""
            ),
            array(
                "type" => "collection",
                "items" => array()
            )
        );
        $this->select("SELECT * FROM seo WHERE section='preparation' ORDER BY title ASC");
        $rarr = $this->result_arr;
        for($i=0;$i<count($rarr);$i++){
            $tarr = array(
                "title" => "<a href='http://".$_SERVER["HTTP_HOST"].$rarr[$i]["id"]."'>".$rarr[$i]["title"]."</a>",
                "cont" => ""
            );
            //print_r($rarr[$i]);
            array_push($this->arr[2]["items"], $tarr);
        }
        $this->json = json_encode($this->arr);
    }
}
?>