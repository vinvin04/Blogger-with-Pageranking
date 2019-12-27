<?php

// Read JSON file
$json = file_get_contents('ranks.json');

//Decode JSON
$json_data = json_decode($json,true);

$n=sizeof($json_data);

//echo $n;

for ($i=0; $i <$n ; $i++) 
{ 
	# code...
	$json_data[$i]=(int)$json_data[$i];
	echo $json_data[$i]."\n";
}
//Print data
//print_r($json_data);

?>