<?php
include "connect.php";
print_r($_POST);
class NewForm extends sql
{
    private $name = "";
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

    function __construct()
    {
        parent::__construct("jw");

        $this->courseName = htmlspecialchars($_POST["course-name"]);
        $this->superBranch = htmlspecialchars($_POST["super-branch"]);

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

        if($this->superBranch === ""){
            $this->superBranch = $this->courseName;
            $cousesArr = array(
              "name" => $this->courseName,
                "sup_branch" => $this->superBranch,
                "external" => '1',
                "id" => hash("ripemd160", time())
            );
            print_r($cousesArr);
            echo "Running";
            $this->insert($cousesArr, "courses");
            echo $this->err;
        }
    }
}
$rounak = new NewForm();
?>