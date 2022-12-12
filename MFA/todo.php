<?php
	require_once ("php/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Homepage</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
	<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="assets/css/Navbar-Right-Links-icons.css">
    <link rel="stylesheet" href="assets/css/index.css">
	<script src="js/api.js"></script>
</head>

<body>
    <nav class="navbar navbar-light navbar-expand-md py-3">
        <div class="container"><img src="assets/img/check_logo.svg"><a class="navbar-brand d-flex align-items-center" href="#"><span>TU-DO</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                </ul><a class="btn btn-dark ms-md-2" role="button" href="php/logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <section>
        <div class="text-center">
            <div class="text-center d-flex flex-column justify-content-center align-items-center py-4 mx-0 px-4">
			<!-- form -->
			   <form style="width: 50;" action="php/insert.php" method="POST">
                    <div>
                        <div class="row">
                            <div class="col-8"><input name="list" class="form-control" type="text"
							placeholder="New task.." required></div>
                            <div class="col-4"><button class="btn btn-dark" type="submit">Add task</button></div>
                        </div>
                    </div>
                </form>
            </div>
			<div id="quote" class="lead font-italic"></div>
            <div class="header">
			  <h1>TU-DO Lists</h1>
			</div>


<!-- getting data -->
<?php
	$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);
	$sql = "select * from Tasks;";
	$result = mysqli_query($con,$sql);
	$resultChecks = mysqli_num_rows($result);
	
	if ($resultChecks > 0 ){
		while ($row = mysqli_fetch_assoc($result)){

?>			
			<div class="container">
			<div class="col-8">
			<table class="table">
				<tbody>
					<thead></thead>
					<tr>
						<td>
							<?php
								if($row['TaskStatus'] != 1){
									echo 
									'<a href="php/taskStatus.php?TaskID='.$row['TaskID'].'" class="btn btn-dark"
									style="background-color: #A9E0F1;">Done</a>';
								} else { 
									echo 
									'<a href="php/undoStatus.php?TaskID='.$row['TaskID'].'" class="btn btn-dark"
									style="background-color: #A9E0F1;">Undo</a>';
									?>
								<div style="color:red;"><small> Task completed </small></div>
									<?php
								}
							?>
						</td>
						<td>
						<td> <?php echo $row['TaskName']?>
						</td>
						</td>
						<td> <a href="php/edit.php?ID=<?php echo $row['TaskID']?>" class="btn btn-outline-success">Edit</td>
						<td> <a href="php/delete.php?ID=<?php echo $row['TaskID']?>" class="btn btn-outline-danger">Delete</td>
					</tr>
				</tbody>
				<?php 
					}
				} else {
					echo "No task has been added yet.";
				?>

			</table>
			<?php
				}
			?>
			</div>
			</div>
        </div>
		
    </section>
    <footer>
        <div>
            <p style="position: fixed; left: 0; bottom: 0; width: 100%;text-align: center;">Copyright (c) 2022 PA3 | All Rights Reserved</p>
        </div>
    </footer>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
