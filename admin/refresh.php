<?php
$con=mysqli_connect('localhost', 'root', '','poll');
// hapa inawavuta wagombea kulingana na nafasi zao
if (isset($_POST['Submit'])){   

  $position = addslashes( $_POST['position'] );
  
  $data=("SELECT * FROM tbCandidates where candidate_position='$position'");
    $results = mysqli_query($con,$data);

    $row1 = mysqli_fetch_array($results); // Kwa mgombea wa kwanza
    $row2 = mysqli_fetch_array($results); // Kwa mgombea wa pili
      if ($row1){
      $candidate_name_1=$row1['candidate_name']; // hapa ina vuta jina la mgombea wa kwanza
      $candidate_1=$row1['candidate_cvotes']; // hapa ina vuta kura zake alizo pata
      }

      if ($row2){
      $candidate_name_2=$row2['candidate_name']; // hapa ina vuta jina la mgombea wa pili
      $candidate_2=$row2['candidate_cvotes']; // hapa ina vuta kura zake alizo pata
      }
}
    else
        // do nothing
?> 
<?php
// hapa ina select all kutoka kwenye table ya position
$ready=("SELECT * FROM tbPositions");
$positions=mysqli_query($con,$ready) or die("There are no records to display ... \n" . mysqli_error()); 
?>


<?php if(isset($_POST['Submit'])){$totalvotes=$candidate_1+$candidate_2;} ?>

<html><head>

<script language="JavaScript" src="js/admin.js">
</script>
</head><body bgcolor="">
<center><img src = "images/logo.jpg" alt="site logo"width="75"height="75"></a></center><br>
<center><b><font color = "brown" size="6">TPSC ONLINE VOTING SYSTEM</font></b></center><br><br>
<div id="page">
<div id="header">
<table border="1"width="800"height="400"align="center"bgcolor="tan"><tr><td>
<center><h1> RESULTS</center> </h1>
 <table width="800"height="45"border="0"align="center"bgcolor="black"><tr>
 <td bgcolor="red"><a href="admin.php"><font color="white">Home</font></a></td> 
 <td bgcolor="red"><a href="manage-admins.php"><font color="white">Manage Administrators</font></a></td> 
 <td bgcolor="red"><a href="positions.php"><font color="white">Manage Positions</font></a></td> 
 <td bgcolor="red"><a href="candidates.php"><font color="white">Manage Candidates</font></a></td> 
 <td bgcolor="red"><a href="refresh.php"><font color="white"> Results</font></a></td> 
 <td bgcolor="red"><a href="logout.php"><font color="white">Logout</font></a></td>
</div>
</td></tr></table>
<div id="container">
<table width="420" align="center">
<form name="fmNames" id="fmNames" method="post" action="refresh.php" onSubmit="return positionValidate(this)">
<tr>
    <td>Choose Position</td>
    <td><SELECT NAME="position" id="position">
    <OPTION VALUE="select">select
    <?php 
    //loop through all table rows
    while ($row=mysqli_fetch_array($positions)){
    echo "<OPTION VALUE=$row[position_name]>$row[position_name]"; 
   
    }
    ?>
    </SELECT></td>
    <td><input type="submit" name="Submit" value="See Results" /></td>
</tr>
<tr>
    <td>&nbsp;</td> 
    <td>&nbsp;</td>
</tr>
</form> 
</table>
<?php if(isset($_POST['Submit'])){echo $candidate_name_1;} ?>:<br>
<img src="images/candidate-1.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_1/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>votes <?php if(isset($_POST['Submit'])){ echo $candidate_1;} ?>
<br>
<br>
<?php if(isset($_POST['Submit'])){ echo $candidate_name_2;} ?>:<br>
<img src="images/candidate-2.gif"
width='<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>'
height='20'>
<?php if(isset($_POST['Submit'])){ if ($candidate_2 || $candidate_1 != 0){echo(100*round($candidate_2/($candidate_2+$candidate_1),2));}} ?>% of <?php if(isset($_POST['Submit'])){echo $totalvotes;} ?> total votes
<br>votes <?php if(isset($_POST['Submit'])){ echo $candidate_2;} ?>
</div>
</td></tr></table>
<div id="footer">
<center><div class="bottom_addr">&copy; 2018 Tpsc Online Voting System. All Rights Reserved</center></div>
</div>
</div>
</body></html>