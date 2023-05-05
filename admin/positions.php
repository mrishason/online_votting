<?php
session_start();
$con=mysqli_connect('localhost', 'root', '','poll');

if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
//hapa in select detail kwenye the tbpositions table
$data=("SELECT * FROM tbPositions");
$result= mysqli_query($con,$data);

if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php

if (isset($_POST['Submit']))
{

$newPosition = addslashes( $_POST['position'] ); 

$sql = ( "INSERT INTO tbPositions(position_name) VALUES ('$newPosition')" );
$result=mysqli_query($con,$sql);
      


 header("Location: positions.php");
}
?>
<?php


 if (isset($_GET['id']))
 {

 $id = $_GET['id'];
 

 $datas=("DELETE FROM tbPositions WHERE position_id='$id'");
 
 $result = mysqli_query($con,$datas) or die("The position does not exist ... \n"); 
 

 header("Location: positions.php");
 }
 else

    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administration Control Panel:Positions</title>

<script language="JavaScript" src="js/admin.js">
</script>
</head>
<body bgcolor="">
<center><img src = "images/logo.jpg" alt="site logo"width="75"height="75"></a></center><br>  
<center><b><font color = "brown" size="6">TPSC ONLINE VOTING SYSTEM</font></b></center><br><br>
<div id="page">
<div id="header">
<table border="1"width="800"height="400"align="center"bgcolor="tan"><tr><td>
  <center><h1>MANAGE POSITIONS</h1></center>
  <table width="700"height="45"border="0"align="center"bgcolor="black"><tr><td>
  <td><a href="admin.php"><font color="white">Home</a></td> 
  <td><a href="manage-admins.php"><font color="white">Manage Administrators</a> </td>
  <td><a href="positions.php"><font color="white">Manage Positions</a></td> 
  <td><a href="candidates.php"><font color="white">Manage Candidates</a> </td>
  <td><a href="refresh.php"><font color="white">Results</a></td> 
  <td><a href="logout.php"><font color="white">Logout</a></td>
</div>
</td></tr></table>
<div id="container">
<table width="380" align="center">
<CAPTION><h3>ADD NEW POSITION</h3></CAPTION>
<form name="fmPositions" id="fmPositions" action="positions.php" method="post" onsubmit="return positionValidate(this)">
<tr>
    <td>Position Name</td>
    <td><input type="text" name="position" /></td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table border="0" width="420" align="center">
<CAPTION><h3>AVAILABLE POSITIONS</h3></CAPTION>
<tr>
<th>Position ID</th>
<th>Position Name</th>
</tr>

<?php
//hapa una loop data ili uzi retrieve 
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['position_id']."</td>";
echo "<td>" . $row['position_name']."</td>";
echo '<td><a href="positions.php?id=' . $row['position_id'] . '">Delete Position</a></td>';
echo "</tr>";
}
?>
</table>
<hr>
</div>
</td></tr></table>
<div id="footer"> 
<center><div class="bottom_addr">&copy; 2018 Tpsc Online Voting System. All Rights Reserved</center></div>
</div>
</div>
</body>
</html>