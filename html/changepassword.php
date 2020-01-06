<?php
session_start();
echo $_SESSION['idno']; 
$con = mysqli_connect("localhost","root","");
mysqli_select_db($con,"test");
if(count($_POST)>0) 
{
$result = mysqli_query($con,"SELECT *from reg WHERE idno='" . $_SESSION['idno'] . "'");
$row=mysqli_fetch_array($result);
if($_POST["currentPassword"] == $row["password"])
 {
mysqli_query($con,"UPDATE reg set password='" . $_POST["newPassword"] . "' WHERE idno='" . $_SESSION['idno'] . "'");
echo " &nbsp;&nbsp;&nbsp;  Password Changed";
} 
else 
echo "   &nbsp; &nbsp; &nbsp;Current Password is not correct";
}
?>
<html>
<head>
<title>Change Password</title>
<script>
function validatePassword()
{
    var pass1 = document.getElementById("pass1").value;
    var pass2 = document.getElementById("pass2").value;
    var x1 = document.forms["changePwd"]["currentPassword"].value;
    var x2 = document.forms["changePwd"]["newPassword"].value;
    var x3 = document.forms["changePwd"]["confirmPassword"].value;
   if (x1 == null||x1 =="" )
  {
   alert("Enter the current password");
   return false;
   }
   if(x2==""||x2==null)
   {
   alert("Enter the New password");
   return false;
   }
   if(x3==""||x3==null)
   {
   alert("Re-Enter the new password");
   return false;
   }
  if(pass1!=pass2)
  {
  alert("passwords do not match");
  return false;
  }
 } 
 
</script>
<body>
<form name="changePwd" action="changepassword.php"  method="post" onsubmit="return validatePassword ()">
<table align="center">
<tr>
    <td width="40%">Current Password</td>
    <td width="60%"><input type="password" name="currentPassword"/></td>
</tr>
<tr>
    <td width="40%">New Password</td>
    <td width="60%"><input id="pass1" type="password" name="newPassword"/></td>
</tr>
<tr>
    <td width="40%">confirm Password</td>
    <td width="60%"><input id="pass2" type="password" name="confirmPassword"/></td>
</tr>
<tr>
<td></td>
<td align="center"><input type="submit" name="submit" value="Submit"></td>
</tr>
</table>
</form>
</body>
</html>

	 
