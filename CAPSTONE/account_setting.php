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
    <link rel="stylesheet" type="text/css" href="css/setting.css">
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
        <main class="update_profile">
            <div class="row">
                <div class="column1">
                    <div class="card1">
                         <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" style="margin-top: 30px;">
                        <div class="container">
                            <figure class="image-container">
                                <img id="chosen-image">
                                <figcaption id="file-name"></figcaption>
                            </figure>

                            <input type="file" id="upload-button" name="pic" accept="image/*" value="<?php echo"$pic" ?>">
                            <label for="upload-button">
                                <i class="fas fa-upload"></i> &nbsp; Choose A Photo
                            </label>
                        </div>
                    </div>
              </div>

              <div class="column2">
                <div class="card2">
                    <h3 style="margin-top:30px">Admin Profile Settings</h3><br>
                     
                        <div class="row">
                            <div class="col">
                            
                                <label>Lastname</label>
                                <input type="text" name="lname" >
                                <label>Firstname</label>
                                <input type="text" name="fname" >
                                <label>Middlename</label>
                                <input type="text" name="mname" >                                
                            </div>

                          <div class="col">
                            <div class="hide-md-lg">
                            </div>
                            <label>Gender</label>
                            <input type="text" name="gender" >
                            <label>Address</label>
                            <input type="text" name="address" >
                            <label>Username</label>
                            <input type="text" name="uname" >
                          </div>

                          <a href="#divOne" class="add_new_update" name="submit"><span>Update</span></a>

<?php
/*
$ql = "UPDATE `admininfo` SET `admin_id`='[value-1]',`lastname`='[value-2]',`firstname`='[value-3]',`middlename`='[value-4]',`gender`='[value-5]',`address`='[value-6]',`username`='[value-7]' WHERE 1";
*/
?>

                          <a href="#divOnes" class="add_new_password"><span>Password</span></a>
                        </div>
                      </form>
                    </div>
                </div>
              </div>
            </div>
        </main>
        <!-- MAIN -->
        <div class="overlay" id="divOne" style="overflow: auto;">
                <div class="wrapper" style="margin-top:80px;">
                    <h2>Update Profile</h2><a class="close" href="#">&times;</a>
                    <div class="content">
                        <div class="containers">
                            <div class="row">
                              <div class="col-75">
                                  <form action="#">
                                    <div class="row">
                                      <div class="col-50">
                                        <label>Lastame<label>
                                        <input type="text" id="lname">
                                        <label>Firstname</label>
                                        <input type="text" id="fname">
                                        <label>Middlename</label>
                                        <input type="text" id="mname">
                                        <label>Contact Number</label>
                                        <input type="text" id="cnumber">
                                       </div>
                                          
                                      <div class="col-50">
                                        <label>Gender</label>
                                        <select>
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>  
                                        <label>Role</label>
                                        <select>
                                            <option>Head Admin</option>
                                            <option>Admin</option>
                                        </select>                 
                                        <label>Address</label>
                                        <input type="text" id="addr">
                                    </div>
                                    </div>
                                    <input type="submit" value="UPDATE" class="btn-popup" style="background: #3C91E6; margin-left:1px; color:#fff">
                                  </form>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>
                   
    </section>
    <!-- CONTENT -->
     <div class="overlay" id="divOnes" style="overflow:auto;">
                <div class="wrapper" style="margin-top:120px;">
                    <h2>Change Password</h2><a class="close" href="#">&times;</a>
                    <div class="content">
                        <div class="containers">
                            <div class="row">
                              <div class="col-75">
                                  <form action="#">
                                    <div class="row">
                                      <div class="col-50">
                                        <label for="brgyname">Old Password</label>
                                        <input type="text" id="brgyname">
                                        <label for="brgyname">New Password</label>
                                        <input type="text" id="brgyname">
                                        <label for="brgyname">Confirm Password</label>
                                        <input type="text" id="brgyname">
                                      </div>
                                    <input type="submit" value="SAVE" class="btn-popup" style="background: #3C91E6; margin-left: 1px; color: #fff;">
                                  </form>
                                </div>
                              </div>
                            </div>
                        </div>
                    </div>

    <script src="js/script.js"></script>
   <script>
       let uploadButton = document.getElementById("upload-button");
        let chosenImage = document.getElementById("chosen-image");
        let fileName = document.getElementById("file-name");

        uploadButton.onchange = () => {
            let reader = new FileReader();
            reader.readAsDataURL(uploadButton.files[0]);
            reader.onload = () => {
                chosenImage.setAttribute("src",reader.result);
            }
            fileName.textContent = uploadButton.files[0].name;
        }
   </script>
</body>
</html>