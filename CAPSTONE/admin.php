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
							<a href="admin.php">
								<i class='bx bxs-dashboard' ></i>
								<span class="text">Dashboard</span>
							</a>
						</li>
						<li>
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
							<a href="location.php">
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
					<div class="row">
					<canvas id="myChart" style="width:100%; max-width: 330px;max-height:175px; background-color: #f5f5f5; margin-top: 20px; padding: 10px; border-radius: 10px; margin-left: 20px;"></canvas>

					<canvas id="chart1" style="width:100%; max-height: 700px;max-width:680px;background-color: #f5f5f5; margin-top: 20px; padding: 25px; border-radius: 10px; margin-left: 20px;"></canvas>
				</div>
				<canvas id="chart2" style="width:100%; max-width: 330px;max-height:180px; background-color: #f5f5f5; margin-top: -175px; padding: 12px; border-radius: 10px; margin-left: 5px;"></canvas>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
	<script src="js/script.js"></script>
	
	<script>
	var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
	var yValues = [55, 49, 44, 24, 15];
	var barColors = [
	  "#b91d47",
	  "#00aba9",
	  "#2b5797",
	  "#e8c3b9",
	  "#1e7145"
	];

	new Chart("myChart", {
	  type: "doughnut",
	  data: {
	    labels: xValues,
	    datasets: [{
	      backgroundColor: barColors,
	      data: yValues
	    }]
	  },
	  options: {
	    title: {
	      display: false,
	      text: "World Wide Wine Production 2018"
	    }
	  }
	});

var xValues = [50,60,70,80,90,100,110,120,130,140,150];
var yValues = [7,8,8,9,9,9,10,11,14,14,15];

new Chart("chart1", {
  type: "line",
  data: {
    labels: xValues,
    datasets: [{
      fill: true,
      lineTension: 0,
      backgroundColor: "rgba(0,0,255,0.7)",
      borderColor: "rgba(0,0,255,0.1)",
      data: yValues
    }]
  },
  options: {
    legend: {display: true},
    scales: {
      yAxes: [{ticks: {min: 6, max:16}}],
    }
  }
});

var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
var yValues = [55, 49, 44, 24, 15];
var barColors = ["red", "green","blue","orange","brown"];

new Chart("chart2", {
  type: "bar",
  data: {
    labels: xValues,
    datasets: [{
      backgroundColor: barColors,
      data: yValues
    }]
  },
  options: {
    legend: {display: false},
    title: {
      display: true,
      text: "World Wine Production 2018"
    }
  }
});
	</script>

</body>
</html>