<html>
      <head>
	        <title>LEAVE APLLICATIONS</title>
	  </head>
 <body>
 <?php
     $con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"test");
if (mysqli_connect_errno()) 
{
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$result= mysqli_query($con,"select * from leaveform");

echo "<table border=1>";
echo "<tr>
      <th>IDNO</th>
	  <th>Applied date</th>
	  <th>First date of leave</th>
	  <th>Last date of leave</th>
	  <th>purpose</th>
	  