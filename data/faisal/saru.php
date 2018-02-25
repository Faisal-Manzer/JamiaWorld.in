<?php
function mini($html)
{
$search = array(
'/\>[^\S ]+/s', // strip whitespaces after tags, except space
'/[^\S ]+\</s', // strip whitespaces before tags, except space
'/(\s)+/s', // shorten multiple whitespace sequences
'/<!--(.|\s)*?-->/',
'/>(\s)*?</' // Remove HTML comments
);
$replace = array( '>', '<', '\\1', '', '><' ); $html = preg_replace($search, $replace, $html);
return $html;
}
class title extends sql{
    public $title;
    public $desc;
    function __construct()
    {
        parent::__construct("jw");
        $path = $_SERVER["REQUEST_URI"];
        $this->select("SELECT * FROM seo WHERE id='".$path."'");
        if(!empty($this->result_arr)){
            $arr = end($this->result_arr);
            $this->title = $arr["title"];
            $this->desc = $arr["description"];
        }
        else {
            $this->title = "JamiaWorld Welcome's U";
            $this->desc = "JamiaWorld is an idea to access all possible piece of info. & junk of JMI and Entrances collectively at one place ";
        }
    }
}
?>
