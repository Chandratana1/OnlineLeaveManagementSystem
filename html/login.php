<?php
session_start();
?>
<html>
	<head>
		<title>Login Page</title>
		<script type="text/javascript">
		 function validateForm()
  {
  var x1 = document.forms["logForm"]["idno"].value;
  var x2 = document.forms["regForm"]["password"].value;
  if(x1==null||x1=='')
  {
   alert("please enter the idno");
   return false'
   }
  if(x2==null||x2=='')
{
  alert("please enter the  password");
  return false;
}
   }
</script>  
		</head>
<style type='text/css'>
 
</style>
<body>
<form  name="logForm" method="post" action="login.php">
	<table   align="center"> 
	<tr>	
		<td align="center" colspan='5'><h1>Login form</h1></td>
	</tr>
	 <tr>	
		<td align='center'>IDNO:</td>
		<td><input type='text' name='idno' /></td>
	</tr>
	<tr>	
		<td align='center'>Password:</td>
		<td><input type='password' name='password' /></td>
	</tr>
	<tr>	
		<td colspan='5' align='center'>
		<input type='submit' name='login' value='Login' /></td>
	</tr>
	     <td colspan='5' align='center'>
		<input type='submit' name='adminlogin' value='adminlogin' /></td>

	</table>
</form>
<center>
<font color='orange' size='5'>Registration Done???</font><a href='registration.html'>Enroll Here</a>
</font>
</body>
</html>
<?php 
//require_once('dbcon.php');
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"test");
if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//employee login
if(isset($_POST['login']))
{
  $password = $_POST['password'];
	$idno = $_POST['idno'];
	//$name=$_POST['name'];
	
	$check_idno = "select * from reg where password='$password' AND idno='$idno'";
	
	$run = mysqli_query($con,$check_idno);
	$dup = mysqli_num_rows($run);
	if($dup > 0)
	{
	
	$_SESSION['idno']=$idno;
	//$_SESSION['name']=$name;
	
	echo "<script>window.open('new1.html','_self')</script>";
	}
	else 
	{
	echo "<script>alert('Email or password is incorrect!')</script>";
	}
}
//adminlogin
if(isset($_POST['adminlogin']))
{
  $password = $_POST['password'];
	$idno = $_POST['idno'];
	//$name=$_POST['name'];
	
	$check_idno = "select * from adminlogin where password='$password' AND idno='$idno'";
	
	$run = mysqli_query($con,$check_idno);
	$dup = mysqli_num_rows($run);
	if($dup > 0)
	{
	
	$_SESSION['idno']=$idno;
	//$_SESSION['name']=$name;
	echo "<script>window.open('admin/adminhome.html','_self')</script>";
	//echo "<script>window.open('admin1.php','_self')</script>";
	}
	else 
	{
	echo "<script>alert('Email or password is incorrect!')</script>";
	}
}
?>







