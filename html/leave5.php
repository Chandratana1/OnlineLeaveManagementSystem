<?php
session_start();
if(isset($_POST["submit"]))
{
//$idno=$_POST["idno"];
//$name=$_POST["name"];
$fdate=$_POST["fdate"];
$sdate=$_POST["sdate"];
$edate=$_POST["edate"];
$purpose=$_POST["purpose"];
//$stat=$_POST["status"};
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"test");
if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$query=mysqli_query($con,"select idno,fdate,sdate,edate,purpose from leaveform where idno='".$_SESSION['idno']."'") or die(mysqli_error($con));
$duplicate=mysqli_num_rows($query);
   if($duplicate==0)
    {
      $query1=mysqli_query($con,"insert into leaveform(idno,fdate,sdate,edate,purpose) values('".$_SESSION['idno']."','$fdate','$sdate','$edate','$purpose')")  or die(mysqli_error($con));
	  echo" <h2> You have been applied for leave</h2><br>";
	  //echo "<h2><a href='login.html'>Now Login</a></h2>";
	  echo"<br>";
	  //include "login.html";
	  
    }
    else
    {
      echo'The username '.$idno.' have already  been applied for a leave!!!';
    }
mysqli_close($con);

}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<title>LEave application form</title>
<script  type="text/javascript">
function validateForm()
{
// var pass1 = document.getElementById("pass1").value;
  //  var pass2 = document.getElementById("pass2").value;
    var x1 = document.forms["leaveform"]["fdate"].value;
    //var x2 = document.forms["leaveform"]["idno"].value;
    var x3 = document.forms["leaveform"]["sdate"].value;
    var x4 = document.forms["leaveform"]["edate"].value;
	var x5 = document.forms["leaveform"]["purpose"].value;
   if (x1 == null||x1 =="" )
  {
   alert("select the todays date of leave");
   return false;
   }
   /*if(x2==""||x2==null)
   {
   alert("Idno field is empty!");
   return false;
   }*/
   if(x3==""||x3==null)
   {
   alert("select the start date");
   return false;
   }
   if(x4==""||x4==null)
   {
   alert("select the end date");
   return false;
   }
   if(x5==""||x5==null)
   {
   alert("enter the purpose of leave");
   return false;
   }
   
 }
 
 
</script>  

</head>
<body>
<center>
<h4>Online leave application form</h4>
<br>

<!--Branch:
<select id="branch" name="branch">
      <option value="cse">CSE</option>
	  <option value="ece">ECE</option>
	  <option value="ece">EEE</option>
	  <option value="ece">MECH</option>
	  <option value="ece">CIV</option>
	  <option value="ece">BT</option>
	  <option value="ece">IT</option>
</select>-->
<form  name="leaveform" method="post" onsubmit="return validateForm()">
Todaydate:<input name="fdate" type="date" id="fdate" value="<?php echo date('Y-m-d'); ?>"/><br><br>
<!--IDNO:<input type="text" name="idno" id="idno" width="20%"><br><br>-->
Startdate:&nbsp;&nbsp;&nbsp;<input type="date" name="sdate"><br><br>
Enddate:&nbsp;&nbsp;&nbsp;&nbsp;<input type="date" name="edate"><br><br>
Purpose Of Leave&nbsp;&nbsp;&nbsp;<br><textarea name="purpose" cols="18" rows="5" ></textarea><br>
<input type="submit" value="submit" name="submit">
<input type="reset" value="reset">
</form>
</center>
</body>
</html>
