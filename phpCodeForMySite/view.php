<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>View Records</title>
</head>
<body>
<?php

include ('connection.php');

$sql = "SELECT * FROM teckdata";
// $result = mysqli_query($conn, $sql);
// $result = mysql_query("SELECT * FROM _data") or die(mysql_error());

echo "<table border='1' cellpadding='10'>";
echo "<tr>
<th><font color='Red'>Id</font></th>
<th><font color='Red'>Object</font></th>
<th><font color='Red'>detils</font></th>
<th><font color='Red'>link</font></th>
<th><font color='Red'>Edit</font></th>
<th><font color='Red'>Delete</font></th>
</tr>";

$query_run = mysqli_query($conn,$sql);
if(mysqli_num_rows($query_run)){
    foreach($query_run as $row)
// }

// while($row = mysql_fetch_array( $result ))
{

echo "<tr>";
echo '<td><b><font color="#663300">' . $row['id'] . '</font></b></td>';
echo '<td><b><font color="#663300">' . $row['Object'] . '</font></b></td>';
echo '<td><b><font color="#663300">' . $row['detils'] . '</font></b></td>';
echo '<td><b><font color="#663300">' . $row['link'] . '</font></b></td>';
echo '<td><b><font color="#663300"><a href="edit.php?id=' . $row['id'] . '">Edit</a></font></b></td>';
echo '<td><b><font color="#663300"><a href="delete.php?id=' . $row['id'] . '">Delete</a></font></b></td>';
echo "</tr>";

}
}
echo "</table>";
?>
<p><a href="insert.php">Insert new record</a></p>
</body>
</html>