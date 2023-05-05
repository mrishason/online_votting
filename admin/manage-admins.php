<?php
session_start();
$con=mysqli_connect("localhost","root","","poll");
?>
<html><head>

<script language="JavaScript" src="js/admin.js">
</script>
</head><body bgcolor="">
<center><img src = "images/logo.jpg" alt="site logo"width="75"height="75"></a></center><br>     
<center><b><font color = "brown" size="6">TPSC ONLINE VOTING SYSTEM</font></b></center><br><br>
<div id="page">
<div id="header">
<table border="1"width="800"height="400"align="center"bgcolor="tan"><tr><td>
<center><h1>MANAGE ADMINISTRATORS</center> </h1>
<table width="700"height="45"border="0"align="center"bgcolor="black"><tr><td>
 <td><a href="admin.php"><font color="white">Home</a></font> </td>
<td><a href="manage-admins.php"><font color="white">Manage Administrators</font></a> </td>
 <td><a href="positions.php"><font color="white">Manage Positions</font></a> </td>
 <td><a href="candidates.php"><font color="white">Manage Candidates</font></a></td> 
 <td><a href="refresh.php"><font color="white">Poll Results</font></a> </td>
 <td><a href="logout.php"><font color="white">Logout</font></a></td>
</div>
</td></tr></table>
<div id="container">
<?php
//hapa ina check session kama haijafanyika vizur,kwenye login kwa ajili ya security
if(empty($_SESSION['admin_id'])){
 header("location:access-denied.php");
}
//Process
if (isset($_POST['submit']))
{

$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); //hapa unaifanya password yako kua encrypted kwa kutumia hii function ya md5,kwa ajili ya ulinzi wa password yako

$sql = ( "INSERT INTO tbAdministrators(first_name, last_name, email, password) VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass')" );
 $result= mysqli_query($con,$sql)or die( mysqli_error() );

die( "A new administrator account has been created." );
}
//Process
if (isset($_GET['id']) && isset($_POST['update']))
{
$myId = addslashes( $_GET['id']);
$myFirstName = addslashes( $_POST['firstname'] ); //prevents types of SQL injection
$myLastName = addslashes( $_POST['lastname'] ); //prevents types of SQL injection
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); //hapa unaifanya password yako kua encrypted kwa kutumia hii function ya md5,kwa ajili ya ulinzi wa password yako

$con=mysqli_connect("localhost","root","","poll");
$data=( "UPDATE tbAdministrators SET first_name='$myFirstName', last_name='$myLastName', email='$myEmail', password='$newpass' WHERE admin_id = '$myId'" );
 $result=mysqli_query($con,$data);

die( "An administrator account has been updated." );
}
?>
<table align="center">
<tr>
<td>
<form action="manage-admins.php?id=<?php echo $_SESSION['admin_id']; ?>" method="post" onSubmit="return updateProfile(this)">
<table align="center">
<CAPTION><h4>UPDATE ACCOUNT</h4></CAPTION>
<tr><td>First Name:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="firstname" maxlength="15" value=""></td></tr>
<tr><td>Last Name:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="lastname" maxlength="15" value=""></td></tr>
<tr><td>Email Address:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="email" maxlength="100" value=""></td></tr>
<tr><td>New Password:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="password" maxlength="15" value=""></td></tr>
<tr><td>Confirm New Password:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="ConfirmPassword" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="update" value="Update Account"></td></tr>
</table>
</form>
</td>
<td>
<form action="manage-admins.php" method="post" onSubmit="return registerValidate(this)">
<table align="center">
<CAPTION><h4>CREATE ACCOUNT</h4></CAPTION>
<tr><td>First Name:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="firstname" maxlength="15" value=""></td></tr>
<tr><td>Last Name:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="lastname" maxlength="15" value=""></td></tr>
<tr><td>Email Address:</td><td><input type="text" style="background-color:#999999; font-weight:bold;" name="email" maxlength="100" value=""></td></tr>
<tr><td>Password:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="password" maxlength="15" value=""></td></tr>
<tr><td>Confirm Password:</td><td><input type="password" style="background-color:#999999; font-weight:bold;" name="ConfirmPassword" maxlength="15" value=""></td></tr>
<tr><td>&nbsp;</td><td><input type="submit" name="submit" value="Create Account"></td></tr>
</table>
</form>
</td>
</tr>
</table>
</div>
</td></tr></table>
<div id="footer">
<center><div class="bottom_addr">&copy; 2018 Tpsc Online Voting System. All Rights Reserved</center></div>
</div>
</div>
</body></html>