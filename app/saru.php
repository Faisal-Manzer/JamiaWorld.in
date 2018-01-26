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
?>
