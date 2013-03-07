<?php

$rawlist = file_get_contents("product_images.txt");
$listarray = explode("\n", $rawlist);



foreach($listarray AS $key=>$value){
//echo "<p>Key: ".$key."</br>";
//echo "Value: ".$value."</br></p>";

$urlupc = explode(",", $value);

$url = $urlupc[0];
$img = trim($urlupc[1]).'.jpg';
echo $url."<br>".trim($urlupc[1])."<br>";
echo "<img src=".$url.">";
file_put_contents($img, file_get_contents($url));


}
?>