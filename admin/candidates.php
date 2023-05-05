<?php
session_start();
$con=mysqli_connect('localhost', 'root', '','poll');
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
} 
//hapa una select datails kwenye table ya  tbcandidates table
$data=("SELECT * FROM tbCandidates");
$result=mysqli_query($con,$data) or die("There are no records to display ... \n" . mysqli_error()); 
if (mysqli_num_rows($result)<1){
    $result = null;
}
?>
<?php
//hapa una retrieve data kutoka kweny table ya tbPositions
$select=("SELECT * FROM tbPositions");
$positions_retrieved=mysqli_query($con,$select) or die("There are no records to display ... \n" . mysqli_error()); 
*/
?>
<?php

if (isset($_POST['Submit']))
{

$newCandidateName = addslashes( $_POST['name'] ); 
$newCandidatePosition = addslashes( $_POST['position'] ); 

$sql = ( "INSERT INTO tbCandidates(candidate_name,candidate_position) VALUES ('$newCandidateName','$newCandidatePosition')" );
$result=mysqli_query($con,$sql)or die("Could not insert candidate at the moment". mysqli_error() );


 header("Location: candidates.php");
}
?>
<?php

 if (isset($_GET['id']))
 {
//hapa una vuta id kama utataka kuitumia kokote
 $id = $_GET['id'];
 
//hapa una delete query yako
$select=("DELETE FROM tbCandidates WHERE candidate_id='$id'");
 $result = mysqli_query($con,$select) or die("The candidate does not exist ... \n"); 
 
 // hapa una rudi kwenye candidate.php
 header("Location: candidates.php");
 }
 else
  
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administration Control Panel:Candidates</title>

<script language="JavaScript" src="js/admin.js">
</script>
</head>
<body bgcolor="">
<center><img src = "images/logo.jpg" alt="site logo"width="75"height="75"></a></center><br>  
<center><b><font color = "brown" size="6">TPSC ONLINE VOTING SYSTEM</font></b></center><br><br>
<div id="page">
<div id="header">
<table border="1"width="800"height="400"align="center"bgcolor="tan"><tr><td>
  <center><h1>MANAGE CANDIDATES</center></h1>
   <table width="700"height="45"border="0"align="center"bgcolor="black"><tr><td>
  <td><a href="admin.php"><font color="white">Home</font></a> </td>
  <td><a href="manage-admins.php"><font color="white">Manage Administrators</font></a></td> 
  <td><a href="positions.php"><font color="white">Manage Positions</font></a></td> 
  <td><a href="candidates.php"><font color="white">Manage Candidates</font></a> </td>
  <td><a href="refresh.php"><font color="white"> Results</font></a></td> 
  <td><a href="logout.php"><font color="white">Logout</font></a></td>
</div>
</td></tr></table>
<div id="container">
<table width="380" align="center">
<CAPTION><h3>ADD NEW CANDIDATE</h3></CAPTION>
<form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
<tr>
    <td>Candidate Name</td>
    <td><input type="text" name="name" /></td>
</tr>
<tr>
    <td>Candidate Position</td>
    <!--<td><input type="combobox" name="position" value="<?php echo $positions; ?>"/></td>-->
    <td><SELECT NAME="position" id="position">select
    <OPTION VALUE="select">select
    <?php

    while ($row=mysqli_fetch_array($positions_retrieved)){
 
    }
    ?>
    </SELECT>
    </td>
</tr>
<tr>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table border="0" width="620" align="center">
<CAPTION><h3>AVAILABLE CANDIDATES</h3></CAPTION>
<tr>
<th>Candidate ID</th>
<th>Candidate Name</th>
<th>Candidate Position</th>
</tr>

<?php

while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['candidate_id']."</td>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td>" . $row['candidate_position']."</td>";
echo '<td><a href="candidates.php?id=' . $row['candidate_id'] . '">Delete Candidate</a></td>';
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