<?php
	require_once ("config.php");
	echo $taskID = $_GET['ID'];
	$sql = "delete from Tasks where TaskID = $taskID;";
	$result = mysqli_query($con,$sql);
	header("location:../todo.php")
?>