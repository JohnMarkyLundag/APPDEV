<?php 
  include 'conn.php';
  $ann_id = $_GET['ann_id'];
  
?>
<?php
  error_reporting(0);
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

$sql = "UPDATE `announcement` SET `status`= 'Archive' WHERE `annID` = '$ann_id';";

if (mysqli_query($conn, $sql)) {
  echo '
    <script type="text/javascript">
        swal({
          title: "Announcement Removed Successfully",
          icon: "success",
          button: "Close",
        });
        setTimeout(function(){location.reload(1)},3000000);
    </script>';
  header('Refresh: 1; URL = announcement.php');
}
else {
  $msql = "DELETE FROM announcement WHERE `AnnID` = $ann_id';";
  if (mysqli_query($conn, $sql)) {
    echo '
      <script type="text/javascript">
          swal({
            title: "Announcement Deleted Successfully",
            icon: "success",
            button: "Close",
          });
          setTimeout(function(){location.reload(1)},3000000);
      </script>';
    header('Refresh: 1; URL = announcement.php');
    }
}
?>

</body>
</html>