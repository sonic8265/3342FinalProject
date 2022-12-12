<?php
	//need DB credentials
	require_once ("config.php");
	//connect to db 
	$con = mysqli_connect (SERVER, USER, PASSWORD, DATABASE) or die("connection failed");
	print "DATABASE connected <br>";
	echo $LIST = $_POST['list'];
	$query = "INSERT INTO Tasks (TaskName, TaskStatus) values ('$LIST', 0);";
	$result = mysqli_query($con, $query);
	header("location:../todo.php");
	exit();
?>