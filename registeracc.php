<html><head>

<script language="JavaScript" src="js/user.js">
</script>
</head><body bgcolor="">
<center><img src = "images/logo2.jpg" alt="site logo"height="95"></a></center><br>
<center><b><font color = "brown" size="6">TPSC ONLINE VOTING SYSTEM</font></b></center><br><br>

<table border="1"width="600"height="300"align="center"bgcolor="tan"><tr><td>
<center><h1>Student Registration</center></h1>

<?php
$con=mysqli_connect('localhost', 'root', '','poll');
//Process
if (isset($_POST['submit']))
{

$myFirstName = addslashes( $_POST['firstname'] ); 
$myLastName = addslashes( $_POST['lastname'] ); 
$myEmail = $_POST['email'];
$myPassword = $_POST['password'];

$newpass = md5($myPassword); //hiyo md5 ni funtion inayo encrypt password

$sql = ( "INSERT INTO tbMembers(first_name, last_name, email, password) VALUES ('$myFirstName','$myLastName', '$myEmail', '$newpass')" );
$result=mysqli_query($con,$sql) or die( mysqli_error() );

die( "You have registered for an account.<br><br>Go to <a href=\"login.html\">Login</a>" );
}

echo "<center><h3>Register an account by filling in the needed information below:</h3></center><br><br>";
echo '<form action="registeracc.php" method="post" onsubmit="return registerValidate(this)">';
echo '<table align="center"><tr><td>';
echo "<tr><td>First Name:</td><td><input type='text' style='background-color:#999999; font-weight:bold;' name='firstname' maxlength='15' value=''></td></tr>";
echo "<tr><td>Last Name:</td><td><input type='text' style='background-color:#999999; font-weight:bold;' name='lastname' maxlength='15' value=''></td></tr>";
echo "<tr><td>Email Address:</td><td><input type='text' style='background-color:#999999; font-weight:bold;' name='email' maxlength='100' value=''></td></tr>";
echo "<tr><td>Password:</td><td><input type='password' style='background-color:#999999; font-weight:bold;' name='password' maxlength='15' value=''></td></tr>";
echo "<tr><td>Confirm Password:</td><td><input type='password' style='background-color:#999999; font-weight:bold;' name='ConfirmPassword' maxlength='15' value=''></td></tr>";
echo "<tr><td>&nbsp;</td><td><input type='submit' name='submit' value='Register Account'/></td></tr>";
echo "<tr><td colspan = '2'><p>Already have an account? <a href='index.php'><b>Login Here</b></a></td></tr>";
echo "</tr></td></table>";
echo "</form>";
?>
</div> 
<div id="footer">
<div class="bottom_addr">&copy; 2018 Simple PHP Polling System. All Rights Reserved</div>
</div>
</div>
</body></html>