<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Edit page</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../assets/css/Navbar-Right-Links-icons.css">
</head>
<?php
	$taskID = $_GET['ID'];
	require_once ("config.php");
	$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	$sql = "select * from Tasks where TaskID = '$taskID';";
	$result = mysqli_query($con,$sql);
	$data = mysqli_fetch_assoc($result);

?>
<body>
    <div class="text-center d-flex flex-column justify-content-center align-items-center py-4 mx-0 px-4" style="width: 1000px;height: 300px;position: relative;">
        <form style="text-align: center;" action="edit_b.php" method="POST">
            <div class="pe-0 mx-5 py-0">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <h1 style="font-family: Times, Times New Roman, serif;">Edit Task</h1>
                        </div>
                        <div class="col-md-12">
							<input type="text" value="<?php echo $data['TaskName'] ?>" name="TaskName" class="form-control my-3" required>
							<input type="hidden" value="<?php echo $data['TaskID'] ?>" name="TaskID">
						</div>
							
                    </div>
                    <div class="row">
                        <div class="col-md-6"><button class="btn btn-outline-success" >Save</button></div>
						<div class="col">
						<button class="btn btn-outline-danger" value="Cancel" onclick="window.location='../MFA/todo.php'">Cancel</button></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>