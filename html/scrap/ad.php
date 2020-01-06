<html>
<body>
<?php
session_start();
$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"test");
$status = isset($_POST['status']) ? $_POST['status'] : '';
if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
echo "<h2 align='center'>EMPLOYEE LEAVES<h2><br>";
$result=mysqli_query($con,"select * from leaveform");
echo "<table border=1>";
echo "<tr>
      <th>DATE OF <br> APPLICATION</th>
	  <th>EMPLOYEE IDNO</th>
	  <th>LEAVE FIRST<br> DATE</th>
	  <th>LEAVE LAST<br>DATE</th>
      <th>PURPOSE OF<br> LEAVE</th>
	  <th colspan='2'>APPROVAL</th>
	  </tr>";
echo '<form method="post">';
while($row=mysqli_fetch_array($result))
{
echo "<tr>
      <td>" .$row['idno']. "</td>
	  <td>" .$row['fdate']. "</td>
	  <td>" .$row['sdate']. "</td>
	  <td>" .$row['edate']. "</td>
	  <td>" .$row['purpose']."</td>";
echo '<td><input type="radio" name="status[' .$row['idno'] .']"	value=1>Accept
      <td><input type="radio" name="status[' .$row['idno'] .']"	value=0>Deny</td>';
	  
echo "</tr>";	  
}	  
echo "</form>";

echo "</table>";	
echo '<input type="submit" name"status">';  
?>
</body>
</html>