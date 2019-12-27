<?php
function get_data()
{
	$connect =mysqli_connect("localhost","root","","cms");
	$query="SELECT post_id,outedge from posts";
	$result=mysqli_query($connect,$query);
	$data=array();
	while($row=mysqli_fetch_array($result))
	{
		$data[]=array
		(
			'postid' => $row["post_id"],
			'outedge' => $row["outedge"]
		);
	}
	//print_r($data);
	return json_encode($data);
}
/*// echo '<pre>';
// print_r(get_data());
// echo '</pre>';*/
$file='data.json';
if(file_put_contents($file,get_data()))
{
	echo "success";

	//calling py

	// $command = escapeshellcmd('C:/xampp/htdocs/test/t.py');
	// $output = shell_exec($command);
	// echo "called py";
	// echo $output;
}
else
{
	echo "error";
}
?>