<?php
session_start();
$con=mysqli_connect('localhost', 'root', '','poll');

if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
?>
<html><head>

</head><body bgcolor="">
<center><img src = "images/logo.jpg" alt="site logo"></a></center><br>     
<center><b><font color = "brown" size="6">TPSC ONLINE VOTING SYSTEM</font></b></center><br><br>
<div id="page">
<div id="header">
<table border="1"width="700"height="200"align="center"><tr><td>
<center><h1>ADMINISTRATION CONTROL PANEL</center> </h1>
<table width="700"height="45"border="0"align="center"bgcolor="black"><tr><td>
 <a href= "admin.php"><font color="white">Home</a></td>
 <td><a href="manage-admins.php"><font color="white">Manage Administrators</font></a> </td>
 <td><a href="positions.php"><font color="white">Manage Positions</font></a> </td>
 <td><a href="candidates.php"><font color="white">Manage Candidates</font></a> </td>
 <td><a href="refresh.php"><font color="white">Vote Results</font></a> </td>
 <td><a href="logout.php"><font color="white">Logout</font></a></td>
 </td></tr></table>
</div>
<p align="center">&nbsp;</p>
<div id="container">

<p>Click a link above to perform an administrative operation.</p>


</div>
</td></tr></table>
<div id="footer">
<center><div class="bottom_addr">&copy; 2018 Tpsc Online Voting System. All Rights Reserved</center></div>
</div>
</div>
</body></html>