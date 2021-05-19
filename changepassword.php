<?php
session_start();
echo '<html><head><title>Hamara Bank</title><link rel="stylesheet" href="style.css"></head><body> <div class="centered"><div id="in" class="border1">';
echo "<p class='s1'>Hamara Bank - Change Password </p></br>";

//Referrer validation 

$ref= $_SERVER['HTTP_REFERER'];
$url=stripslashes("http://bank.com/esbank/acctSummary.php?ID=");
//echo $url;
//if(preg_match('/54.159.50.1/', $ref))
//{

$conn = mysqli_connect("localhost", "satish", "satish", "esbank");
$em=$_REQUEST['useremail'];
$pword=$_REQUEST['userpword'];
//Without validations
 //$qry="UPDATE users SET Password='$pword' WHERE Email='$em'";
	 //if(mysqli_query($conn, $qry))
		// echo "Password updated successfully. Please Logout and Login";
	//else
		 //echo "Error in updating Password ".mysqli_error($conn)."</br>";
//End Without Validations
	
//With Validations
$uppercase = preg_match('@[A-Z]@', $pword);
$lowercase = preg_match('@[a-z]@', $pword);
$number    = preg_match('@[0-9]@', $pword);

if(!$uppercase || !$lowercase || !$number || strlen($pword) < 8) {
   echo '<p class="s3" Password should be at least 8 characters in length and should include at least one upper case letter and one number.</br><input type="button" value="Back" onclick="javascript:window.history.back()"/></p>';
}else{
$qry="UPDATE users SET Password='$pword' WHERE Email='$em'";
	if(mysqli_query($conn, $qry))
		echo "<p class='s3'>Password updated successfully. Please Logout and Login</p>";
	else
		echo "<p class='s3'> Error in updating Password ".mysqli_error($conn)."</br></p>";
}
//End With Validations

echo "<form action='logout.php'><input type='hidden' name='redirectURL' value='login.html'/><input type='submit' value='Logout'/></form>";
//}
//else
//{
//	echo "<p class='s3'>Invalid Referrer</p>";
//}

?>