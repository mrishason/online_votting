<?php
$con=mysqli_connect('localhost', 'root', '','poll');
$vote = $_REQUEST['vote'];


$data=("UPDATE tbCandidates SET candidate_cvotes=candidate_cvotes+1 WHERE candidate_name='$vote'");
mysqli_query($con,$data);


?> 