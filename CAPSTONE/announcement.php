<?php 

include 'conn.php';

session_start();

?>

<?php
$name = $_SESSION['name'];
$role = $_SESSION['role'];
$id = $_SESSION['adminID'];
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
	<link rel="stylesheet" href="css/announce.css">
	 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
	<title>Fi-CoST</title>

</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<img src="img/logo.png" style="width: 185px; margin-left:5px; margin-top: 15px;"> </a>
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
			<li class="active">
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
			<div class="head-title">
				<div class="left">
					<h1>Announcement</h1>
				</div>
			</div>


	<div class="wrapper">
		<form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="form"  >
			<div class="row">
			</div>
                <input type="text" name="ann_id" value="<?php echo"$id"; ?>" hidden >
				<div class="input-group" style="margin-top:15px;">
				<label for="comment">Header</label>

				<textarea id="comment" name="headers" style="resize: none; height: 70px;" required></textarea>
			</div>
			<div class="input-group textarea">
				<label for="comment" style="margin-top: 90px;">Description</label>
				<textarea id="comment" name="body"  required></textarea>
			</div>
			<div class="input-group">
				<button name="submit" class="btn">Post Announcement</button>
			</div>
		</form>
	</div>

<div class="wrapper2" style="overflow: auto; font-size: 20px">
		<label style="font-weight: 600;">Recent Announcement</label>
		<div >
	<?php
	
		        $oid = $_SESSION['adminID'];
		        $query = "SELECT a.annID, a.title, a.description, MONTHNAME(a.dateTime) as month, DAY(a.dateTime) as day, YEAR(a.dateTime) as year,  d.name
						FROM `announcement` a 
						INNER JOIN admin d 
						ON a.publisher = d.adminID
						WHERE a.status = 'Active' ORDER BY a.dateTime desc;";

		          	$result = mysqli_query($conn, $query);
		          	$n = 1;
		          	while ($row = mysqli_fetch_array($result)) {
		          		$ann_id = $row['annID'];

		          		echo "<details>
		          		<summary> "

		          		  .$row['month'].' '.$row['day'].', '.$row['year']. 

		          		"<a href ='ann-delete.php?ann_id=$ann_id' ><i class='bx bxs-trash' style='color:red; cursor: pointer; font-size: 26px; padding: 12px;' ></i></a></summary>

		          		<article> <br> Title:
		          		"
		          		.$row['title']. "<br> <br>".
		          		$row['description']."<br> <br> <h6> - "


	          			.$row['name']. 


	          			"</h6> <br>
		          		</article>
		          		</details>";
		          		     
		          	
			           $n++;
			           }
		        ?>
</div>
	</div>



</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	
<?php
  if (isset($_POST['submit'])) {

    $ann_id = $_POST['ann_id'];
    $curDate = date('Y-m-d H:i:s');
    $heads = $_POST['headers'];
    $body = $_POST['body'];
    
   
    $sql = "INSERT INTO `announcement`( `title`, `description`, `dateTime`, `publisher`, `status`) VALUES ('$heads','$body','$curDate','$ann_id','Active')";

  if (mysqli_query($conn,$sql)) {
    echo '
    <script type="text/javascript">
        swal({
          title: "Announcement Posted Successfully",
          icon: "success",
          button: "Close",
        });
        setTimeout(function(){location.reload(1)},3000000);
    </script>';
    header('Refresh: 1; URL = announcement.php');
  }else{
    echo "Error: ".$sql."<br>".mysqli_error($conn);
  }
  }
?>


	<script src="js/script.js"></script>
</body>
</html>