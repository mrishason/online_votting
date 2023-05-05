<?php
$con=mysqli_connect('localhost', 'root', '','poll');

session_start();

if(empty($_SESSION['member_id'])){
 header("location:access-denied.php");
}
?>
<?php
// hapa una select details kwenye table ya tbPosition
$position=("SELECT * FROM tbPositions");
$positions=mysqli_query($con,$position)or die("There are no records to display ... \n" . mysqli_error()); 
?>
<?php
    

 if (isset($_POST['Submit']))
 {

 $position = addslashes( $_POST['position'] ); 
 
 
 $data=("SELECT * FROM tbCandidates WHERE candidate_position='$position'");
 $result = mysqli_query($con,$data) or die(" There are no records at the moment ... \n"); 
 

 }
 else

  
?>
<html>
<head>

<title>tpsc</title>
 
<script language="JavaScript" src="js/user.js">
</script>
<script type="text/javascript">
function getVote(int)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

	if(confirm("Your vote is for "+int))
	{
	xmlhttp.open("GET","save.php?vote="+int,true);
	xmlhttp.send();
	}
	else
	{
	alert("Choose another candidate ");	
	}
	
}

function getPosition(String)
{
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }

xmlhttp.open("GET","vote.php?position="+String,true);
xmlhttp.send();
}
</script>
<script type="text/javascript">
$(document).ready(function(){
   var j = jQuery.noConflict();
    j(document).ready(function()
    {
        j(".refresh").everyTime(1000,function(i){
            j.ajax({
              url: "admin/refresh.php",
              cache: false,
              success: function(html){
                j(".refresh").html(html);
              }
            })
        })
        
    });
   j('.refresh').css({color:"green"});
});
</script>
</head>
<body bgcolor="">
<center><img src = "images/logo.jpg" alt="site logo"height="95"></a></center><br>
<center>
<b><font color = "brown" size="6">TPSC ONLINE VOTING SYSTEM</font></b></center><br><br>
<body>
<div id="page">
<div id="header">
<table border="1"width="600"height="200"align="center"bgcolor="tan"><tr><td>
<table width="600"height="45"border="0"align="center" border="1" ><tr>
<td border="1"><a href="student.php">Home</a></td> 
<td><a href="vote.php">Current Election</a></td>
<td><a href="manage-profile.php">Manage My Profile</a></td>
<td><a href="logout.php">Logout</a></td>
</div>
</td></tr></table>
</div>
<div class="refresh">
</div>
<div id="container">
<table width="420" align="center">
<form name="fmNames" id="fmNames" method="post" action="vote.php" onSubmit="return positionValidate(this)">
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position" onclick="getPosition(this.value)">
    <OPTION VALUE="select">select
    <?php 

    while ($row=mysqli_fetch_array($positions)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
   
    }
    ?>
    </SELECT></td>
    <td><input type="submit" name="Submit" value="See Candidates" /></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form> 
</table>
<table width="270" align="center">
<form>
<tr>
    <th>Candidates:</th>
</tr>
<?php

  if (isset($_POST['Submit']))
  {
while ($row=mysqli_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['candidate_name']."</td>";
echo "<td><input type='radio' name='vote' value='$row[candidate_name]' onclick='getVote(this.value)' /></td>";
echo "</tr>";
}
  }
?>

</form>
</table>
</div>
</td></tr><table>
<div id="footer"> 
<center><div class="bottom_addr">&copy; 2018 Tpsc Online Voting System. All Rights Reserved</center></div>
</div>
</div>
</body>
</html>