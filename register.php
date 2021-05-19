<?php
$conn = mysqli_connect("localhost", "satish", "satish", "esbank");
echo '<html><head><title>Hamara Bank</title><link rel="stylesheet" href="style.css"></head><body> <div class="centered"><div id="in" class="border1">';
echo "<p class='s1'>Hamara Bank </p></br>";
//echo "<p class='s3'>You have entered below details</br>";
$name=$_REQUEST['username']; //source
$email=$_REQUEST['useremail'];
$phone=$_REQUEST['userphone'];
$act=$_REQUEST['useraccount'];
$pword=$_REQUEST['userpword'];
//$pword=md5($pword);
//$salt=rand();
//$pword=md5($pword.$salt);
//echo "</br>".$salt;
//echo "</br>".$pword;
$balance=100;
// echo "Name:" .$name;
// echo "</br> Email: ". $email;;
// echo "</br>Phone Number: " .$phone ;
// echo "</br>Account Number: " . $act;

// Below code is  not vulnerable SQL INjection
// ------------------------------------------------------------------------------------------------
// Prepared Statement
//$qry=$conn->prepare("INSERT INTO users (Name, Email, PhoneNumber, ActNumber, Password, Balance) VALUES (?,?,?,?,?,?)");
//$qry->bind_param("ssssss",$name,$email,$phone,$act,$pword,$balance);

// if($qry->execute()){
    // echo "<p class='s3'>User " .$name." created successfully</p>
	// <p class='s2'>Please <a href='login.html'>Login</a> to Internet Banking.</p>";
// } else {
  // echo "<p class='s3'>Error creating User: " . mysqli_error($conn)."</p>";
// }
// $qry->close();
// $conn->close();
//------------------------------------------------------------------------------------------------

// $conn = mysqli_connect("localhost", "root", "", "esbank");


$qry="INSERT INTO users (Name, Email, PhoneNumber, ActNumber, Password, Balance, Remarks) values('$name','$email','$phone','$act','$pword','$balance', 'No Recent Remarks')";
 if(mysqli_query($conn, $qry))
 {
	  echo "<p class='s3'>User " .$name." created successfully</p><p class='s2'>Please <a href='login.html'>Login</a> to Internet Banking.</p>";
 }
 else
 {
	echo "<p class='s3'>Error creating User: " . mysqli_error($conn)."</p>";
 }
 echo '</div></div></body></html>';


?>