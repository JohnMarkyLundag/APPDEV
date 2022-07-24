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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

	<title>Fi-CoST</title>

</head>
		<body>
					<!-- SIDEBAR -->
					<section id="sidebar">
						<a href="#" class="brand">
							<img src="img/logo.png" style="width: 185px; margin-left:5px; margin-top: 15px;"> </a>
						<ul class="side-menu top">
							<li>
								<a href="index.php">
									<i class='bx bxs-dashboard' ></i>
									<span class="text">Dashboard</span>
								</a>
							</li>
							<li class="active">
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
						<main>
				 			<div class="table">
							        <div class="table_header">
							            <p>List of Catch Record</p>
							        <div class="top-table"> 
							          <a href="#divOne" class="add_new">
										<i class='bx bx-printer' ></i>
										<span class="text">Print Report</span>
									  </a><br></div>
							        </div>
							        <div class="table_section">
							            <table class="table-long">
										<thead>
											<tr>
												<th>Date</th>
												<th>Vessels Name</th>
												<th>Vessels Type</th>
												<th>Fishing Type</th>
												<th>Total Catch</th>
												<th>Weight</th>
												<th>Fish Name</th>
												<th>Price</th>
												<th>Weight</th>
												<th>Fishing Location</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>06-01-2022</td>
												<td>Alfonso</td>
												<td>Engine</td>
												<td>Hook</td>
												<td>10</td>
												<td>Kilograms</td>
												<td>Bangus</td>
												<td>230</td>
												<td>per Kilograms</td>
												<td>Balayan Bay</td>
												<td><button><i class="fa-solid fa-pen-to-square"></i></button> <button><i class="fa-solid fa-trash"></i></button> </td>
											</tr>
											
										</tbody>
									</table>
								</div>
						</main>
						<!-- MAIN -->
					</section>
	<!-- CONTENT -->
	

	<script src="js/script.js"></script>
</body>
</html>