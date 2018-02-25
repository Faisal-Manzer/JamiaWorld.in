<?php
include "connect.php";
class insert extends sql
{
    private $courseName = "";
    private $superBranch = "";

    private $courseDuration = "";
    private $totalSeats = "";
    private $reservation = "";
    private $basicInfo = "";

    private $examName = "";
    private $openDate = "";
    private $closeDate = "";
    private $formLink = "";
    private $examDuration = "";
    private $examPattern = "";
    private $examLevel = "";
    private $formPrice = "";
    private $formInfo = "";

    private $title ="";
    private $description = "";

    function __construct()
    {
        parent::__construct("jw");

        $this->courseName = strtolower(htmlspecialchars($_POST["course-name"]));
        $this->superBranch = strtolower(htmlspecialchars($_POST["super-branch"]));

        $this->courseDuration = htmlspecialchars($_POST["course-duration"]);
        $this->totalSeats = htmlspecialchars($_POST["total-seats"]);
        $this->reservation = htmlspecialchars($_POST["reservation"]);
        $this->basicInfo = htmlspecialchars($_POST["basic-info"]);

        $this->examName = htmlspecialchars($_POST["exam-name"]);
        $this->openDate = htmlspecialchars($_POST["open-date"]);
        $this->closeDate = htmlspecialchars($_POST["close-date"]);
        $this->formLink = htmlspecialchars($_POST["form-link"]);
        $this->examDuration = htmlspecialchars($_POST["exam-duration"]);
        $this->examPattern = htmlspecialchars($_POST["exam-pattern"]);
        $this->examLevel = htmlspecialchars($_POST["exam-level"]);
        $this->formPrice = htmlspecialchars($_POST["form-price"]);
        $this->formInfo = htmlspecialchars($_POST["form-info"]);

        $this->title = htmlspecialchars($_POST["title"]);
        $this->description = htmlspecialchars($_POST["description"]);
        $this->gurl = $_POST["gurl"];

        if($this->superBranch === ""){
            $this->superBranch = $this->courseName;
        }
        $nameCorrect = array(
          "/[.]+$/",
          "/[.]+/",
          "/[ ]+/",
            "/[-]+/"
        );
        $nameReplace = array(
          "",
          "-",
          "-",
            "-"

        );
        $this->courseName = preg_replace($nameCorrect,$nameReplace, $this->courseName);
        $this->superBranch = preg_replace($nameCorrect, $nameReplace, $this->superBranch);
        $this->id = hash("ripemd160", time());
        //print_r($cousesArr);
        $this->select("SELECT id FROM courses WHERE name='".$this->courseName."' AND sup_branch='".$this->superBranch."'");
        //print_r($this->result_arr);
        if(!empty($this->result_arr))
            $this->id=end($this->result_arr)["id"];
        $cousesArr = array(
            "name" => $this->courseName,
            "sup_branch" => $this->superBranch,
            "external" => '1',
            "id" => $this->id,
            "gurl" => $this->gurl
        );
        $basicArr = array(
            "id" => $this->id,
            "duration" => $this->courseDuration,
            "seats" => $this->totalSeats,
            "reservation" => $this->reservation,
            "intro" => $this->basicInfo
        );
        $examArr = array(
            "id" => $this->id,
            "type" => $this->examName,
            "open" => $this->openDate,
            "close" => $this->closeDate,
            "link" => $this->formLink,
            "duration" => $this->examDuration,
            "pattern" => $this->examPattern,
            "level" => $this->examLevel,
            "price" => $this->formPrice,
            "intro" => $this->formInfo
        );
        $seoArr = array(
            "title" => $this->title,
            "description" => $this->description,
            "id" => $this->gurl,
            "section" => "preparation"
        );
        if(hash("sha256",$_POST["password"])==="5b7b2519655ef9954642404fed5ac7892c11666017ef9f0e1bc96ddec6445d58"){


        if(!empty($this->result_arr)){
            $this->update($basicArr, "basic", $this->id);
            echo $this->result;
            echo $this->err;
            $this->update($examArr, "exam", $this->id);
            echo $this->result;
            echo $this->err;
            $this->update($seoArr, "seo", $this->gurl);
            echo $this->result;
            echo $this->err;
        }
        else{
            $this->insert($cousesArr,"courses");
            echo $this->result;
            echo $this->err;
            $this->insert($basicArr, "basic");
            echo $this->result;
            echo $this->err;
            $this->insert($examArr, "exam");
            echo $this->result;
            echo $this->err;
            $this->insert($seoArr,"seo");
            echo $this->result;
            echo $this->err;
        }
            echo "Entry Compleate <a href='insert.html'><h1>Click To Continue</h1></a>";
        }
        else{
            echo "Wrong Pass";
        }
    }
}
$rounak = new insert();
?>