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
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!-- My CSS -->
    <link rel="stylesheet" href="css/styles.css">

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
           <div class="card-container">
            <img class="round" src="img/people.jpg" alt="user" style="width: 40%;" />
            <div class="profile1">
                <?php echo "$name";?><br>
                <?php echo "$role";?>       
            </div>
    <div class="skills">
        <h6>Personal Information</h6>
        <ul>
            <li>Gender :&emsp;&emsp;&emsp; Male</li><br>
            <li>Address:&emsp;&emsp;&emsp;Balayan, Batangas</li><br>
            <li>Username:&emsp;&emsp;RaymartPanday</li>

        </ul>
    </div>
</div>

        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    

    <script src="js/script.js"></script>
   
</body>
</html>