<?php

    header("Pragma: public");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Content-Type: application/force-download");
    header("Content-Type: application/octet-stream");
    header("Content-Type: application/download");
    header("Content-Disposition: attachment;filename=3k_Products_Full_CSV.csv");
    header("Content-Transfer-Encoding: binary");

// Make a MySQL Connection
mysql_connect("localhost", "root", "") or die(mysql_error());
mysql_select_db("ods_db") or die(mysql_error());

$rawlist = file_get_contents("product_images_sku.txt");
$listarray = explode("\n", $rawlist);
foreach ($listarray AS $key=>$value){

	$result = mysql_query("SELECT * FROM sheet1 WHERE O = $value LIMIT 1") 
	or die(mysql_error());  

	$i=0;
	// keeps getting the next row until there are no more to get
	while($row = mysql_fetch_row( $result )) {
		foreach ($row AS $key=>$value){
				echo $value;
				echo ";";
		}
	} 

	echo PHP_EOL;

}


// Get all the data from the "example" table


?>