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
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/setting.css">

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

	<title>Fi-CoST</title>
</head>

<body>

				<!-- SIDEBAR -->
				<section id="sidebar">
					<a href="#" class="brand">
						<img src="img/logo.png" style="width: 185px; margin-left:5px; margin-top: 15px;"> </a>
					<ul class="side-menu top">
						<li class="active">
							<a href="index.php">
								<i class='bx bxs-dashboard' ></i>
								<span class="text">Dashboard</span>
							</a>
						</li>
						<li>
							<a href="catch.php">
								<i class='bx bxs-file' ></i>
								<span class="text">Catch Record</span>
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
										<li><a href="user_profile.php"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
										<li><a href="account_setting.php"><i class='bx bxs-cog' ></i> Settings</a></li>
										<li><a href="index.php"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
									</ul>
								</div>
							</nav>
							<!-- NAVBAR -->

							<!-- MAIN -->
							<main style="margin-top: -30px; overflow:auto;">
				
								<ul class="box-info">
									<li>
										<i class='bx bxs-group' ></i>
										<span class="text">
											<h3>250</h3>
											<p>Fishermen</p>
										</span>
									</li>
									<li>
										<i class='bx bxs-ship' ></i>
										<span class="text">
											<h3>283</h3>
											<p>Fishing Vessels</p>
										</span>
									</li>
									<li>
										<i class='bx bxs-building-house' ></i>
										<span class="text">
											<h3>48</h3>
											<p>Barangay</p>
										</span>
									</li>
								</ul>
					</div>

		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<script src="js/script.js"></script>
	
	
</body>
</html>