<?php
		$servername = "padayon.ts.infra.dranem.me";
		$username = "panday";   
		$password = "panday";       
		$dbname = "dbcapstone"; 

		$conn = mysqli_connect($servername, $username, $password, $dbname);
				if (!$conn) {
	  				die("Connection failed: " . mysqli_connect_error());
				}
?>
