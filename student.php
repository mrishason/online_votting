<?php
$con=mysqli_connect('localhost', 'root', '','poll');
session_start();
?>
<html><head>

</head><body bgcolor="">

<center><b><font color = "brown" size="6">TPSC ONLINE VOTING SYSTEM</font></b></center><br><br>
<div id="page">
<div id="header">
<table border="1"width="600"height="200"align="center"bgcolor="tan"><tr><td>
<center><h1>STUDENT HOME</center> </h1>
<table width="600"height="45"border="0"align="center" border="1" ><tr>
<td border="1"><a href="student.php">Home</a></td> 
<td><a href="vote.php">Current Election</a></td>
<td><a href="manage-profile.php">Manage My Profile</a></td>
<td><a href="logout.php">Logout</a></td>
</td></tr></table>
</div>

<div id="container">
<p> Click a link above to do some operation.</p>
</div>
</td></tr></table>
<div id="footer">
<center><div class="bottom_addr">&copy; 2018 Tpsc Online Voting System. All Rights Reserved</center></div>
</div>
</div>
</body></html>