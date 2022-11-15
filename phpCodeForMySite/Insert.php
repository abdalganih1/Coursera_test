<?php
function valid($Object, $detils,$link, $error)
{
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
<title>Insert Records</title>
</head>
<body>
<?php

if ($error != '')
{
echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?>

<form action="" method="post">
<table border="1">
<tr>
<td colspan="2"><b><font color='Red'>Insert Records </font></b></td>
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
<input type="submit" name="submit" value="Insert Records">
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

$Object = mysqli_real_escape_string($conn,htmlspecialchars($_POST['Object']));
$detils = mysqli_real_escape_string($conn,htmlspecialchars($_POST['detils']));
$link = mysqli_real_escape_string($conn,htmlspecialchars($_POST['link']));

if ($Object == '' || $detils == '' || $link == '')
{

$error = 'Please enter the details!';

valid($Object, $detils, $link,$error);
}
else
{

mysqli_query($conn,"INSERT teckdata SET Object='$Object', detils='$detils', link='$link'")
or die(mysql_error());

header("Location: view.php");
}
}
else
{
valid('','','','');
}
?>