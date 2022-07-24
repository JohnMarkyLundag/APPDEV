<?php 

include 'conn.php';

session_start();

?>

<?php
$name = $_SESSION['name'];
$role = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

	<!-- My CSS -->
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<title>Fi-CoST</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="img/logo.png" style="width: 185px; margin-left:5px; margin-top: 15px;"></a>

		<ul class="side-menu top">
			<li>
				<a href="admin.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="active">
				<a href="barangay.php">
					<i class='bx bxs-building-house' ></i>
					<span class="text">Barangay</span>
				</a>
			</li>
			<li>
				<a href="fishermen.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Fishermen</span>
				</a>
			</li>
			<li>
				<a href="enumerator.php">
					<i class='bx bxs-group' ></i>
					<span class="text">Enumerator</span>
				</a>
			</li>
			<li>
				<a href="vessels.php">
					<i class='bx bxs-ship' ></i>
					<span class="text">Fishermen Vessels</span>
				</a>
			</li>
			<li>
				<a href="#">
					<i class='bx bxs-map' ></i>
					<span class="text">Fishing Location</span>
				</a>
			</li>
			<li>
				<a href="catch.php">
					<i class='bx bxs-file' ></i>
					<span class="text">Catch Record</span>
				</a>
			</li>
			<li>
				<a href="announcement.php">
					<i class='bx bxs-megaphone' ></i>
					<span class="text">Announcement</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="#">
			</form>
			<div class="role">
				<?php echo "$name";?><br>
				<?php echo "$role";?>		
			</div>
			<div class="profile">
				<img src="img/people.jpg" alt="">
				<ul class="profile-link">
					<li><a href="admin_profile.php"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="account_setting.php"><i class='bx bxs-cog' ></i> Settings</a></li>
					<li><a href="index.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
 			<div class="table">
			        <div class="table_header">
			            <p>List of Barangay</p>
			        <div class="top-table"> 
			          <a href="#divOne" class="add_new" style="margin-top:5px">
						<i class='bx bx-plus' ></i>
						<span class="text">Add Barangay</span>
					  </a><br></div>
			        </div>
			        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
			        <table id="example" class="display nowrap cell-border" style="width:100%;">
			                <thead>
			                    <tr>
			                        <th>Barangay Name</th>
			                        <th>Action</th>
			                    </tr>
			                </thead>
			                <tbody>
			                	<?php
			                		$s = "SELECT * FROM barangay ORDER BY barangayname ASC;";
			                		if ($t = mysqli_query($conn, $s)) {
								      while ($n = mysqli_fetch_array($t)) {
								      	$brgyID = $n['barangayID'];

			                	?>
			                	
			                    <tr>
			                        <td><?php echo $n['barangayname']; ?></td>
			                        <td>
			                        	<button name="update">
			                        		<i class="fa-solid fa-pen-to-square"></i>
			                        	</button>
			                        	<button name="delete">
			                        		<i class="fa-solid fa-trash"></i>
			                        	</button>
			                        	<input type="hidden" name="barangayID" value= "<?php echo $n['barangayID'] ?> ">
			                       
			                    </td>

			                    </tr>
			                     </form> 
			                    <?php
									}
								    }
								    else{
								      echo "MAY MALI";
								    }
			                    ?>
			                </tbody>
			            </table>
				</main>

				<?php

				try {
					if (isset($_POST['delete'])) {
					$brgyID = $_POST['barangayID'];
					$sqls = "DELETE FROM `barangay` WHERE `barangayID` = '$brgyID';";
					$results = mysqli_query($conn,$sqls) or die(mysqli_error());

				if ($results) {
					echo '<script>
								swal({title: "Barangay deleted Successfully!",
								type:"success"}).then(function() {
								    window.location = "barangay.php";
								});
							</script>';

				}else {
					echo '<script>alert("Form not submitted")</script>';
				}
						}
				}
				catch (Exception $e) {
				    echo '<script>
								swal({title: "Unable to delete it contains records!",
								type:"success"}).then(function() {
								    window.location = "barangay.php";
								});
							</script>';
				}

						?>

		<!-- MAIN -->
			<div class="overlay" id="divOne" style="overflow:auto;">
				<div class="wrapper" style="margin-top:150px;">
					<h2>Add Barangay</h2><a class="close" href="#">&times;</a>
					<div class="content">
						<div class="containers">
							<div class="row">
							  <div class="col-75">
							      <form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
							        <div class="row">
							          <div class="col-50">
							            <label for="brgyname">Barangay Name</label>
							            <input type="text" name="barangay" id="brgyname">
							          </div>
							        <input type="submit" name="submit" class="btn-popup" style="background: #3C91E6;">
							      </form>
							    </div>
							  </div>
							</div>
						</div>
					</div>

<?php

	if (isset($_POST['submit'])) {
		$brgy = $_POST['barangay'];

		$sql = "INSERT INTO `barangay`( `barangayname`) VALUES ('$brgy')";
		$result = mysqli_query($conn,$sql) or die(mysqli_error());

		if ($result) {
			echo '<script>
						swal({title: "Barangay Added Successfully!",
						type:"success"}).then(function() {
						    window.location = "barangay.php";
						});
					</script>';
		}
		else {
			echo '<script>alert("Form not submitted")</script>';
		}
	}

?>
	</section>
	<!-- CONTENT -->
	<script src="js/script.js"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
	<script>
			$(document).ready(function () {
    $('#example').DataTable({
    	scrollY: 300,
        scrollX: true,
	});

});
	</script>
</body>
</html>