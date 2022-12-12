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
	$sql = "UPDATE Tasks SET TaskStatus = 1 WHERE TaskID = '$TaskID';";
	$result = mysqli_query($con,$sql);
	print "query worked";
	if (!$result){
		echo "Query failed. ".mysqli_error($con);
		header("location:../todo.php");
		exit();
	}
	
	header("location:../todo.php");
	exit();

 /*
		$conn->query("UPDATE `Tasks` SET `TaskStatus` = 0 WHERE `TaskID` = $TaskID") or die(mysqli_errno($con));
		header('location: ../index.php');

	require_once ("config.php");
	$taskID = $_POST['TaskID'];
	$taskName = $_POST['TaskName'];
	print "Webdata: TaskID: $taskID TaskName: $taskName <br>";
	$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	if (!$con) {
		echo "DB connection failed: ".mysqli_error($con);
		header("location:../index.php");
		exit();
	}
	$sql = "UPDATE Tasks SET TaskName = '$taskName' WHERE TaskID = '$taskID';";
	$result = mysqli_query($con,$sql);
	if (!$result){
		echo "Query failed. ".mysqli_error($con);
		header("location:../index.php");
		exit();
	}
	if (mysqli_num_rows($result) != 1) {
		echo "TaskID does not exist."; 
		header("location:../index.php"); 
		exit();
	}
	
	header("location:../index.php");
	exit();
	/*
?>