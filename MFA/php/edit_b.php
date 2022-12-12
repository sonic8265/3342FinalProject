<?php
	require_once ("config.php");
	$taskID = $_POST['TaskID'];
	$taskName = $_POST['TaskName'];
	print "Webdata: TaskID: $taskID TaskName: $taskName <br>";
	$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	if (!$con) {
		echo "DB connection failed: ".mysqli_error($con);
		header("location:../todo.php");
		exit();
	}
	$sql = "UPDATE Tasks SET TaskName = '$taskName' WHERE TaskID = '$taskID';";
	$result = mysqli_query($con,$sql);
	if (!$result){
		echo "Query failed. ".mysqli_error($con);
		header("location:../todo.php");
		exit();
	}
	if (mysqli_num_rows($result) != 1) {
		echo "TaskID does not exist."; 
		header("location:../todo.php"); 
		exit();
	}
	
	header("location:../todo.php");
	exit();
?>