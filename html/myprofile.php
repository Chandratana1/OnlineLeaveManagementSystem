<?php
session_start();
$idno=$_SESSION['idno'];
//$name=$_SESSION['name'];
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"test");
if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if($result=mysqli_query($con,"select * from reg where  idno='".$_SESSION['idno']."'") or die(mysqli_error($con)));
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    //printf ("%s (%s)\n",$row[0],$row[1]);
   //mysqli_query($con,"select name from reg where idno='idno'");
echo "<table align='center'>" ;
echo  "<tr><td>";
echo  "<img src='unknown.jpg' width=120 >";
echo "</td></tr>";
echo  "<tr>
	  <td>IDNO:</td>
      <td>" .$row[0]. " </td>
	  <tr>
	  <td>NAME:</td>
      <td>" .$row[1]. "</td>
	  </tr>
	  <tr>
	  <td>BRANCH:</td>
      <td>" .$row[2]. "</td>
	  </tr>
	  </tr>";
}	  
 echo "</table>";
 }
 ?>
<?php

?>


 