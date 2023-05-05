
<?php



session_start();
$con=mysqli_connect('localhost', 'root', '','poll');


// hapa una capture taarifa unazo jaza kwenye fomu ya login
$myusername=$_POST['myusername'];
$mypassword=$_POST['mypassword'];

$encrypted_mypassword=md5($mypassword); //MD5 hii ni function inayo encrypt password
$sql="SELECT * FROM tbmembers WHERE email='$myusername' and password='$encrypted_mypassword'" or die(mysqli_error());
$result=mysqli_query($con,$sql) or die(mysqli_error());

// una angalia table row
$count=mysqli_num_rows($result);
// kama username na password ulizo ingiza ni sawa bas ita count 1

if($count==1){
// ikisha kaunti bas itakupeleka kwenye student.php
$user = mysqli_fetch_assoc($result);
$_SESSION['member_id'] = $user['member_id'];
header("location:student.php");
}
//kama username na password ni za uongo bas itakurudisha hapa 
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