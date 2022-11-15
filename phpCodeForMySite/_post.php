<?php
include "connection.php";


$Object = $_POST['Object'];
$detils = $_POST['detils'];
$link = $_POST['link'];


$sql = "INSERT INTO teckdata (Object, detils, link) VALUES ('$Object', '$detils', '$link')";
if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>