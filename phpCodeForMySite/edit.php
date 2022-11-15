<?php
function valid($id, $Object, $detils,$link, $error)
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Edit Records</title>
</head>
<body>
<?php

if ($error != '')
{
echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?>

<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<table border="1">
<tr>
<td colspan="2"><b><font color='Red'>Edit Records </font></b></td>
</tr>
<tr>
<td width="179"><b><font color='#663300'>Object<em>*</em></font></b></td>
<td><label>
<input type="text" name="Object" value="<?php echo $Object; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>detils<em>*</em></font></b></td>
<td><label>
<input type="text" name="detils" value="<?php echo $detils; ?>" />
</label></td>
</tr>

<tr>
<td width="179"><b><font color='#663300'>link<em>*</em></font></b></td>
<td><label>
<input type="text" name="link" value="<?php echo $link; ?>" />
</label></td>
</tr>

<tr align="Right">
<td colspan="2"><label>
<input type="submit" name="submit" value="Edit Records">
</label></td>
</tr>
</table>
</form>
</body>
</html>
<?php
}

include('connection.php');

if (isset($_POST['submit']))
{

if (is_numeric($_POST['id']))
{

$id = $_POST['id'];
$Object = mysqli_real_escape_string($conn,htmlspecialchars($_POST['Object']));
$detils = mysqli_real_escape_string($conn,htmlspecialchars($_POST['detils']));
$link = mysqli_real_escape_string($conn,htmlspecialchars($_POST['link']));


if ($Object == '' || $detils == '' || $link == '')
{

$error = 'ERROR: Please fill in all required fields!';


valid($id, $Object, $detils,$link, $error);
}
else
{

mysqli_query($conn,"UPDATE teckdata SET Object='$Object', detils='$detils' ,link='$link' WHERE id='$id'")
or die(mysql_error());

header("Location: view.php");
}
}
else
{

echo 'Error!';
}
}
else

{

if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)
{

$id = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM teckdata WHERE id=$id")
or die(mysql_error());
$row = mysqli_fetch_array($result);

if($row)
{

$Object = $row['Object'];
$detils = $row['detils'];
$link = $row['link'];

valid($id, $Object, $detils,$link,'');
}
else
{
echo "No results!";
}
}
else

{
echo 'Error!';
}
}
?>
