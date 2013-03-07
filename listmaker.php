<?php
include("simple_html_dom.php");
$rawlist = file_get_contents("itemlist.inc");
$listarray = explode("\n", $rawlist);
$offset = $_GET['offset'];
$listarray = array_slice($listarray, $offset, 1000);
$i=0;
//echo "<style>img{height:20px;width:20px;}</style>";


foreach($listarray AS $key=>$value){
$i++;
if($i == 1000){die();}

set_time_limit(30);
$html = file_get_html("http://www.yoopsie.com/query.php?query=".$value."&referer=%2Fquery.php&locale=US&index=All");
//echo $html->find('.info h3', 0)->plaintext;
$img = $html->find('.info_image img', 0);
	if (!is_object($img)) {
        //echo "none";
    }else{
		echo $img->src;
		echo ",".$value;
		echo "<br>";
	}

}









?>