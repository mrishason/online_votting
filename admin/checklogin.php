
<?php
session_start();
$con=mysqli_connect('localhost', 'root', '','poll');

$tbl_name="tbAdministrators"; // Table name


// hapa ina capture details zako unazojaza kwenye fomu
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];
$encrypted_mypassword=md5($mypassword); //MD5 hii ni function ya ku encrypt password yako


$sql="SELECT * FROM $tbl_name WHERE email='$myusername' and password='$encrypted_mypassword'";
$result=mysqli_query($con,$sql);

// hapa una angalia table row kweny hiyo table ulio select hapo juu
$count=mysqli_num_rows($result);
// kama pass na user name ulio ingiza zitafanana na iliyopo kwenye database basi ita count 1

if($count==1){
// kama itakua ime cheki vitu vyote hapa inakupeleka moja kwa moja kweny file la  admin.php
$user = mysqli_fetch_assoc($result);
 $_SESSION['admin_id'] = $user['admin_id'];
header("location:admin.php");
}
//kama username na password sio sahihi bas hapa itakurudisha kweny hilo file la index.php
else {
header("location:index.php");
}


?> 
</div>
<div id="footer"> 
<center><div class="bottom_addr">&copy; 2018 Tpsc Online Voting System. All Rights Reserved</center></div>
</div>
</div>
</body>
</html>