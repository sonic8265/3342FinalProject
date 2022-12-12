<?php
	require_once ("config.php");
	$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	if (!$con) {
		echo "DB connection failed: ".mysqli_error($con);
		header("location:../todo.php");
		exit();
	}
	print "db connected <br>";
	$TaskID = $_GET['TaskID'];
	print "TaskID => $TaskID <br>";
	$sql = "UPDATE Tasks SET TaskStatus = 0 WHERE TaskID = '$TaskID';";
	$result = mysqli_query($con,$sql);
	print "query worked";
	if (!$result){
		echo "Query failed. ".mysqli_error($con);
		header("location:../todo.php");
		exit();
	}
	
	header("location:../todo.php");
	exit();
?>