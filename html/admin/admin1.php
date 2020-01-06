<html>
<body>
<?php
session_start();
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"test");
if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "<h2 align='center'>EMPLOYEE LEAVES<h2><br>";
$result=mysqli_query($con,"select * from leaveform");
echo "<table align='center' border=1>";
echo "<tr>
	  <th>EMPLOYEE IDNO</th>
	  <th>SEE LEAVE</th>
	  </tr>";
while($row=mysqli_fetch_row($result))
{
echo "<tr>
      <td>" .$row[0]. "</td>
	  <td><a href='view-leave.php'>Viewleave</a></td>";
	  echo "</tr>";	  
}	  
echo "</table>";	
?>
</body>
</html>