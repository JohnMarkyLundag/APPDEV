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
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<!-- My CSS -->
	<link rel="stylesheet" href="css/styles.css">
  	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

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
			<li>
				<a href="barangay.php">
					<i class='bx bxs-building-house' ></i>
					<span class="text">Barangay</span>
				</a>
			</li>
			<li class="active">
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
				<img src="img/people.jpg">
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
			            <p>List of Fishermen</p>
			        <div class="top-table"> 
			          <a href="#divOne" class="add_new" style="margin-top:-15px">
								<i class='bx bx-plus' ></i>
								<span class="text">Add Fishermen</span>
							</a></div>
			        </div>
			       <table id="example" class="display nowrap" style="width:100%;">
			                <thead>
			                    <tr>
			                    	<th>BgsNumber</th>
			                        <th>Lastname</th>
			                        <th>Firstname</th>
			                        <th>Middlename</th>
			                        <th>Gender</th>
			                        <th>Address</th>
			                        <th>Contact Number</th>
			                        <th>Status</th>
			                      
			                    </tr>
			                </thead>
			                <tbody>
			                	<?php 
			                		$q = "SELECT a.*, b.*, c.* FROM barangay b RIGHT JOIN fishermen a ON b.barangayID = a.baranagayID LEFT JOIN credentials c ON a.fishermenID = c.userID;";
			                		if ($r = mysqli_query($conn, $q)) {
								      while ($rowed = mysqli_fetch_array($r)) {
			                		?>
			                    <tr>
			                    	<td><?php echo $rowed['bgsnumber'];?></td>
			                        <td><?php echo $rowed['lastname'];?></td>
			                        <td><?php echo $rowed['firstname'];?></td>
			                        <td><?php echo substr($rowed['middlename'], 0, 1);?></td>
			                        <td><?php echo $rowed['gender'];?></td>
			                        <td><?php echo $rowed['barangayname'];?></td>
			                        <td><?php echo $rowed['contact'];?></td>
			                        
			                        <td>
			                        	<button><i class="fa-solid fa-pen-to-square"></i></button>
			                        	<button><i class="fa-solid fa-trash"></i></button>
			                        </td>
			                    </tr>

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
		<!-- MAIN -->
		<div class="overlay" id="divOne" style="overflow:auto">
				<div class="wrapper" style="margin-top:100px;">
					<h2>Add Fishermen</h2><a class="close" href="#">&times;</a>
					<div class="content">
						<div class="containers">
							<div class="row">
							  <div class="col-75">
							      <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
							        <div class="row">
							          <div class="col-50">
							          	<label>Bgs Number<label>
							            <input type="text"  name="bgsnumber" list="bgsnumbers">
							            <datalist id="bgsnumbers">
							            	 <?php
				            		$qreys = "SELECT * FROM vessel;";
				            		$results = mysqli_query($conn, $qreys);
				            		$ns = 1;
								  	while ($rows = mysqli_fetch_array($results)) {
								  			echo "<option value = '".$rows['bgsnumber']."' > ";
								  			$ns++;
								       }
				            	?>
							            </datalist>
							            <label>Last Name<label>
							            <input type="text" id="lname" name="lname" required>
							            <label>First Name</label>
							            <input type="text" id="fname" name="fname" required>
							            <label>Middle Name</label>
							            <input type="text" id="mname" name="mname" required>
							           </div>
							       	      
							          <div class="col-50">
							            <label>Gender</label>
							            <select name="gender" required>
							            	<option>Male</option>
							            	<option>Female</option>
							            </select>		          	
										<label>Barangay</label>
							            <select name="barangay" required>
							            
							        <?php
				            		$qreys = "SELECT * FROM barangay;";
				            		$results = mysqli_query($conn, $qreys);
				            		$ns = 1;
								  	while ($rows = mysqli_fetch_array($results)) {
								  			echo "<option> ".$rows['barangayname']."</option>";
								  			$ns++;
								       }
				            	?>
							            </select>
							            <label>Contact Number</label>
							            <input type="text" id="cnumber" name="cnumber" required>
							            
									</div>
							        </div>
							        <input type="submit" name="submit" value="Submit" class="btn-popup" style="background: #3C91E6;">
							      </form>
							    </div>
							  </div>
							</div>
						</div>
					</div>
	</section>
	<!-- CONTENT -->
	
<?php

if (isset($_POST['submit'])) {
			
			$bgsnumber = $_POST['bgsnumber'];
			$lname = $_POST['lname'];
			$fname = $_POST['fname'];
			$mname = $_POST['mname'];
			$gender = $_POST['gender'];
			$barangay = $_POST['barangay'];
			$cnumber = $_POST['cnumber'];
			

	    $sqelss = "SELECT barangayID FROM barangay WHERE barangayname = '$barangay';";
		$resultss = mysqli_query($conn, $sqelss);

	  	$n = 1;
	  	while ($row = mysqli_fetch_array($resultss)) {
	  		$brgy = $row['barangayID'];
	       }


	    //$bgsid = $_SESSION['bgsnumber'];
		$sql = "INSERT INTO `fishermen`( `bgsnumber`, `lastname`, `firstname`, `middlename`, `gender`, `contact`, `baranagayID`) VALUES ('$bgsnumber','$lname','$fname','$mname','$gender','$cnumber','$brgy')";
		
		$results = mysqli_query($conn,$sql) or die(mysqli_error());

		if ($results) {
			echo '<script>alert("Form submitted successfully")</script>';
		
		}

		else {
			echo '<script>alert("Form not submitted")</script>';
		
			}
		}

?>


	<script src="js/script.js"></script>
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