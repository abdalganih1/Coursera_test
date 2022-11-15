<?php
include('connection.php');

if (isset($_GET['id']) && is_numeric($_GET['id']))
{
$id = $_GET['id'];

$result = mysqli_query($conn,"DELETE FROM teckdata WHERE id=$id")
or die(mysql_error());

header("Location: view.php");
}
else

{
header("Location: view.php");
}
?>