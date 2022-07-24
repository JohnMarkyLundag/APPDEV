<?php 
  include 'conn.php'
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
</head>
<body style="font-family: Montserrat; color:white;">
  
<?php
  if (isset($_POST['submit'])) {

    $ann_id = $_POST['ann_id'];
    $curDate = date('Y-m-d H:i:s');
    $heads = $_POST['headers'];
    $body = $_POST['body'];
    
   
    $sql = "INSERT INTO `announcement`( `title`, `description`, `dateTime`, `publisher`, `status`) VALUES ('$heads','$body','$curDate','$id','Active')";

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
    header('Refresh: 3; URL = announcement.php');
  }else{
    echo "Error: ".$sql."<br>".mysqli_error($conn);
  }
  }
?>
</body>
</html>