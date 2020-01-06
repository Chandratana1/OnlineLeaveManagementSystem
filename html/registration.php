<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>Registration</title>
</head>
<body>
<?php
session_start();
//require_once('dbcon.php');
?>
<?php
if(isset($_POST["submit"]))
{
$idno=$_POST["idno"];
//$_SESSION['idno']=$idno;
$name=$_POST["name"];
//$_SESSION['name']=$name;
$password=$_POST["password"];
//$confirmpass=$_POST["confirmpass"];
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"test");
if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
//mysqli_query($con,"INSERT INTO register(name,password,confirmpass)
//VALUES ('$name','$password','$confirmpass')");
$query=mysqli_query($con,"select * from reg where idno='".$idno."'") or die(mysqli_error($con));
$duplicate=mysqli_num_rows($query);
   if($duplicate==0)
    {
      $query1=mysqli_query($con,"insert into reg(idno,name,password) values('".$idno."','$name','$password')")  or die(mysqli_error($con));
	  echo" <h2> You have been successfully registered</h2><br>";
	  echo "<h2><a href='login.php'>Now Login</a></h2>";
	  echo"<br>";
	  //include "login.html";
	  
    }
    else
    {
      echo'The username '.$idno.' have been registered already!!!';
    }
mysqli_close($con);
}
?>

</form>
</body>
</html>