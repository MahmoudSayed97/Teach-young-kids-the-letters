<?php
header("Access-Control-Allow-Origin: *");
$con=new mysqli("localhost","root","","webdb");
if (isset($_POST['object'])) {
	$vall=json_decode($_POST['object'],TRUE);
	//print_r($vall) ;
	if ($con->connect_error) {
		die($con->connect_error);
	}
	for ($i=0;$i<count($vall);$i++) {
		$type=$vall[$i]['type'];
		$target=$vall[$i]['target'];
		$content=$vall[$i]['content'];
		$time=$vall[$i]['time'];
		//echo "'$type','$content','$target','$time')";
		$sql="insert into tbdata values ('$type','$content','$target','$time')";
		$con->query($sql);
	}
	if ($con->affected_rows>0) 
		echo "inserted successfully";
    else
		echo "Failed!";
	}
	if (isset($_GET['retrive'])) {
		//echo "done";
		$sql2="select* from tbdata order by _time";
		if ($data=$con->query($sql2)) {
			$rows=array();
			if ($data->num_rows>0) {
				while ($r=$data->fetch_assoc()) {
					array_push($rows,$r);
				}
				echo json_encode($rows);
		}
	}
}
?>