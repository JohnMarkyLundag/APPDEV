
<?php

session_start();

include 'conn.php';


if(isset($_POST['submit'])) {
  $uname = $_POST['uname'];
  $pass = $_POST['pass'];
  $sql = "SELECT a.name as name, a.role as role, a.adminID as adminID FROM `credentials` c LEFT JOIN admin a ON c.userID = a.adminID WHERE username = '$uname' AND password = '$pass';";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['adminID'] = $row['adminID'];
    $_SESSION['name'] = $row['name'];
    $_SESSION['role'] = $row['role'];
    header("Location:admin.php");

  }

  else {
    echo "<script> alert('Invalid username or password!')</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Fi-CoST</title>

  <link rel="stylesheet" href="css/login.css" />
</head>
<body>
  <div class="page-wrap">
    
    <div class="left-panel">
      <div class="illustration">
        <img src="img/logo3.png" alt="Illustration" class="image" />
      </div>
      <h2><strong>Fi</strong>shery <strong>C</strong>ontrol and <strong>S</strong>upply <strong>T</strong>racker</h2>
    </div>

    <div class="right-panel">
      <img src="img/logo1.png" style="width:10%; margin-bottom: -62px; margin-left: 5px;">
      <h1>
        <strong>SIGN IN  </strong>
      
      </h1>
      <form class="animated-form" method="POST" action="<?php echo $_SERVER['PHP_SELF']?>">
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" name="uname" id="username" class="username" required />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="pass" id="password" class="password" required />
        </div>
        <div class="lost-password" style="margin-top: -30px;">
          <a href="#" class="link">Forgot your password?</a>
        </div>
        <div class="form-group flex-end">
          <input type="submit" name="submit" value="LOGIN" class="button" />
        </div>

      </form>
    </div>

  </div>

  <script type="text/javascript">
    let input_fields = document.querySelectorAll('input');
    
    for (let i = 0; i < input_fields.length; i++) {
      let field = input_fields[i];
      field.addEventListener('input', function (e) {
        if (e.target.value != "") {
          e.target.parentNode.classList.add('has-content');
        } else if (e.target.value == "") {
          e.target.parentNode.classList.remove('has-content');
        }
      });
    }
  </script>
</body>
</html>