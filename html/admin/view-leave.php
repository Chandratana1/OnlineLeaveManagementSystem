<?php
session_start();
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"test");


if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result1=mysqli_query($con,"select idno from leaveform");
while($row1=mysqli_fetch_array($result1))
{
//$id=$_GET['idno'];
$result=mysqli_query($con,"select * from leaveform where idno='".$row1[0]."'");
  {
  printf("%s",$row1[0]);
  // Fetch one and one row
 if($row=mysqli_fetch_row($result))
 {
  if($row1[0]==$row[0])
{
	$n=1;
	while($n==1)
	{
	$n++;
echo "<table align='center'>" ;
echo  "<tr><td>";
echo  "<img src='unknown.jpg' width=120 >";
echo "</td></tr>";
echo  "<tr>
	  <td>IDNO:</td>
      <td>" .$row[0]. " </td>
	  <tr>
	  <td>Applied<br>Date</td>
      <td>" .$row[1]. "</td>
	  </tr>
	  <tr>
	  <td>Start<br>Date</td>
      <td>" .$row[2]. "</td>
	  </tr>
	  <tr>
	  <td>End<br>Date</td>
      <td>" .$row[3]. "</td>
	  </tr>
	  <tr>
	  <td>purpose</td>
      <td>" .$row[4]. "</td>
	  
	  </tr>";
    
	  }	 
} 

 echo "</table>";
 //}
 }
 }
 }
 ?>