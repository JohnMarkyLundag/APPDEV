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

	<title>Fi-CoST</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-user-circle'></i>
			<span class="text">FI-COST</span>
		</a>
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
			<li class="active">
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
			           <p>List of Fishing Vessles</p>
			        <div class="top-table"> 
			          <a href="#" class="add_new_print">
								<i class='bx bx-printer' ></i>
								<span class="text">Print Report</span>
							</a>
					 <a href="#divOne" class="add_new">
								<i class='bx bx-plus' ></i>
								<span class="text">Add Fishing Vessels</span>
							</a><br></div>
			        </div>
			       		<table id="example" class="display nowrap" style="width:100%;" >
			                <thead>
			                    <tr>
								<th>Barangay</th>
								<th>BGS-<br>Nummber</th>
								<th>Fishermen<br>Owner</th>
								<th>Vessel Name</th>
								<th>Length</th>
								<th>Breadth</th>
								<th>Depth</th>
								<th>GT</th>
								<th>NT</th>
								<th>Engine Type</th>
								<th>Horse Power</th>
								<th>Fees</th>
								<th>Serial<br>Number</th>
								<th>Registration<br> Date</th>
								<th>Remarks</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							
								<?php

    $query = "SELECT v.*,  b.barangayname FROM `vessel` v LEFT JOIN barangay b ON v.barangayID = b.barangayID;";

              $result = mysqli_query($conn, $query);
              $n = 1;
              while ($row = mysqli_fetch_array($result)) {
                                           
              echo "<tr >"; 
              echo "<td >" . $row['barangayname'] . "</td>";
              echo "<td >" . $row['bgsnumber'] . "</td>";
              echo "<td >" . $row['ownername'] . "</td>";
              echo "<td >" . $row['vesselname'] . "</td>";
              echo "<td >" . $row['length'] . "</td>";    
              echo "<td >" . $row['breadth'] . "</td>"; 
              echo "<td >" . $row['depth'] . "</td>";
              echo "<td >" . $row['gt'] . "</td>";
              echo "<td >" . $row['nt'] . "</td>";
              echo "<td >" . $row['engine'] . "</td>";
              echo "<td >" . $row['horsepower'] . "</td>";
              echo "<td >" . $row['fee'] . "</td>";
              echo "<td >" . $row['serialnumber'] . "</td>";
              echo "<td >" . $row['registrationdate'] . "</td>";
              echo "<td >" . $row['remarks'] . "</td>";
              echo "<td><button><i class='fa-solid fa-pen-to-square'></i></button> <button><i class='fa-solid fa-trash'></i></button> </td>";
              echo "</tr >";    
              $n++;
               }
               ?>
								
						
						</tbody>
					</table>
				</div>
		</main>
		<!-- MAIN -->
				<div class="overlay" id="divOne" style="overflow:auto;">
					<div class="wrapper">
						<h2>Add Fishing Vessels</h2><a class="close" href="#">&times;</a>
						<div class="content">
							<div class="containers">
								<div class="row">
								  <div class="col-75">
								      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
								        <div class="row" style="margin-top:15px">
								            <div class="col-50">
								                <label>Barangay</label>
								               	<select name="barangay" required >
					            	<option selected hidden>Choose...</option>
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
								            </div>
								            <div class="col-50">
								                <label>BGS-Number</label>
								                <input type="number" id="bgs" name="bgsnumber" style="margin-left: -1px">
								            </div>
								        </div>
								         
								        <div class="row">
								          	<div class="col-50">
								            	<label for="owner">Fishermen Owner</label>
								            	<input type="text" id="owner" name="owner" >
											<div class="row">
								              	<div class="col-50">
								                	<label for="length">Length</label>
								                	<input type="number" id="length" name="length" style="margin-left: -1px;">
								              	</div>
								             	<div class="col-50">
								                	<label for="breadth">Breadth</label>
								                	<input type="number" id="breadth" name="breadth" style="margin-left: -1px;">
								              	</div>
								              		<div class="col-50">
								                		<label for="nt">Net Tonnage</label>
								                		<input type="number" id="nt" name="nt" style="margin-left: -1px;">
								              		</div>
								              		<div class="col-50">
								                		<label for="grt">Gear Type</label>
								                		<select style="font-size: 13px;" name="geartype">
								                			<option selected hidden>Choose...</option>
								                			<option>Hook and Line</option>
								                			<option>Fish Net</option>
								                		</select>
								              		</div>
								            </div>
								          	</div>

								        <div class="col-50">
								            <label for="vname">Vessel Name</label>
								            <input type="text" id="vname" name="vesselname">
								            	<div class="row">
								              		<div class="col-50">
								                		<label for="depth">Depth</label>
								               			 <input type="number" id="depth" name="depth" style="margin-left: -1px;">
								              		</div>
								              		<div class="col-50">
								                		<label for="gt">Gross Tonnage</label>
								                		<input type="number" id="gt" name="gt" style="margin-left: -1px;">
								              		</div>
								              		<div class="col-50">
								                		<label for="et">Engine Type</label>
								                		<select style="font-size:13px;" name="enginetype">
								                			<option selected hidden>Choose...</option>
								                			<option>Motor</option>
								                			<option>Paddle</option>
								                		</select>
								              		</div>
								              		<div class="col-50">
								                		<label for="hp">Horsepower</label>
								                		<input type="number" id="hp" name="hp" style="margin-left: -1px;">
								              		</div>
								            	</div>
								        </div>
										</div>

										<div class="row">
								          
								            <div class="col-20">
								                <label for="fee">Fees</label>
								                <input type="Number" id="fee" name="fee" style="margin-left: -1px;">
								            </div>

								              <div class="col-20">
								                <label>Serial Number</label>
								                <input type="text" id="snumber" name="snumber">
								              </div>

								              <div class="col-20">
								                <label>Registration Date</label>
								                <input type="date" id="registration" style="margin-left:-3px;" name="date">
								              </div>
								        </div>


								        <input type="submit" value="SUBMIT" class="btn-popup" style="background: #3C91E6;" name="submit">
								      </form>
								    </div>
								  </div>
								</div>
							</div>
						</div>
					</div>
	</section>
	<!-- CONTENT -->

<?php

if (isset($_POST['submit'])) {
			
			$barangay = $_POST['barangay'];
			$bgsnumber = $_POST['bgsnumber'];
			$owner = $_POST['owner'];
			$length = $_POST['length'];
			$breadth = $_POST['breadth'];
			$nt = $_POST['nt'];
			$geartype = $_POST['geartype'];
			$vesselname = $_POST['vesselname'];
			$depth = $_POST['depth'];
			$gt = $_POST['gt'];
			$enginetype = $_POST['enginetype'];
			$hp = $_POST['hp'];
			$fee = $_POST['fee'];
			$snumber = $_POST['snumber'];
			$date = $_POST['date'];
		 

	    $sqelss = "SELECT barangayID FROM barangay WHERE barangayname = '$barangay';";
		$resultss = mysqli_query($conn, $sqelss);
	  	$n = 1;
	  	while ($row = mysqli_fetch_array($resultss)) {
	  		$brgy = $row['barangayID'];
	       }


	    //$bgsid = $_SESSION['bgsnumber'];
		$sql = "INSERT INTO `vessel`(`bgsnumber`, `vesselname`, `ownername`, `length`, `breadth`, `depth`, `gt`, `nt`, `engine`, `horsepower`, `fee`, `serialnumber`, `registrationdate`, `barangayID`) VALUES ('$bgsnumber','$vesselname','$owner','$length','$breadth','$depth','$gt','$nt','$enginetype','$hp','$fee','$snumber','$date','$brgy')";

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