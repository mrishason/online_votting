<?php
session_start();
$con=mysqli_connect('localhost', 'root', '','poll');


//hapa una select taarifa zote kutoka kwenye table ya members
$data=("SELECT * FROM tbMembers WHERE member_id = '$_SESSION[member_id]'");
$result=mysqli_query($con,$data)or die("There are no records to display ... \n" . mysqli_error()); 
if (mysqli_num_rows($result)<1){
    $result = null;
}
$row = mysqli_fetch_array($result);
if($row)
 {
 // hapa una capture data kutoka kwenye database
 $stdId = $row['member_id'];
 $firstName = $row['first_name'];
 $lastName = $row['last_name'];
 $email = $row['email'];
 }
?>
<?php
//hapa una update query yako
if (isset($_POST['update'])){
$myId = addslashes( $_GET[id]);
$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); //hii ni fuction ya ku encript password yako 

$datas=( "UPDATE tbMembers SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', password='$newpass' WHERE member_id = '$myId'" );
$sql = mysqli_query($con,$datas) or die( mysql_error() );

// hapa itakurudisha kwenye profile yako ikiwa hiyo query ya update hapo juu ime fanikiwa ku update
 header("Location: manage-profile.php");
}
?>

<html >
<head>

<title>tpsc</title>

<script language="JavaScript" src="js/user.js">
</script>
</head>
<body bgcolor="">
<center><img src = "images/logo2.jpg" alt="site logo"width="75"height="75"></a></center><br>   
<center><b><font color = "brown" size="6">TPSC ONLINE VOTING SYSTEM</font></b></center><br><br>
<div id="page">
<div id="header">
<table width="500"height="100"border="1"align="center"><tr><td>
  <center><h1>MANAGE MY PROFILE</center></h1>
  <table width="400"height="50"border="1"align="center"bgcolor="tan"><tr><td>
  <a href="student.php">Home</a></td>
  <td><a href="vote.php">Current Election</a></td>
  <td><a href="manage-profile.php">Manage My Profile</a></td>
  <td><a href="logout.php">Logout</a></td>
  </td></tr></table>
</div>
</td></tr></table>
<div id="container">
<table>
<tr>
<td>
<table width="380" align="center">
<CAPTION><h3>MY PROFILE</h3></CAPTION>
<tr>
    <td>Student Id:</td>
    <td><?php echo $stdId; ?></td>
</tr>
<tr>
    <td>First Name:</td>
    <td><?php echo $firstName; ?></td>
</tr>
<tr>
    <td>Last Name:</td>
    <td><?php echo $lastName; ?></td>
</tr>
<tr>
    <td>Email:</td>
    <td><?php echo $email; ?></td>
</tr>
<tr>
    <td>Password:</td>
    <td>Encrypted</td>
</tr>
</table>
</td>
<td>
<table border="0" width="620" align="center">
<CAPTION><h3>UPDATE PROFILE</h3></CAPTION>
<form action="manage-profile.php?id=<?php echo $_SESSION['member_id']; ?>" method="post" onsubmit="return updateProfile(this)">
<table align="center">
<tr><td>First Name:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="firstname" maxlength="15" value=""></td></tr>
<tr><td>Last Name:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="lastname" maxlength="15" value=""></td></tr>
<tr><td>Email Address:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="email" maxlength="100" value=""></td></tr>
<tr><td>New Password:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="password" maxlength="5" value=""></td></tr>
<tr><td>Confirm New Password:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="ConfirmPassword" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td></td><td><input type="submit" name="update" value="Update Profile"></td></tr>
</table>
</form>
</td>
</tr>
</table>
<hr>
</div>
<div id="footer"> 
<center><div class="bottom_addr">&copy; 2018 Tpsc Online Voting System. All Rights Reserved</center></div>
</div>
</div>
</body>
</html>