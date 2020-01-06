<html>
<head>
<style></style>
</head>
<body bgcolor="wheat">
<?php
session_start();
?>
<?php
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"test");
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>
<table align="right">
  <tr align="right">
  <!-- The user idno is being displayed-->
    <td align="right"><?php echo "<a>Hello! ".$_SESSION['idno']."</a>";?>
     </td>
  </tr>
</table>
  <table align="center">
<tr>
   <td align="center"><a href="leave5.php">Leave Application</a></td>
   <td align="center"><a href="logout.php">Logout</a></td>
   <td align="center"><a href="change_password.php">Changepassword</a></td>
</tr>
</table>
</body>
</html>
<?php
exit();
?>
   
   
       
