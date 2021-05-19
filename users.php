<?php
session_start();
echo '<html><head><title>Hamara Bank</title><link rel="stylesheet" href="style.css"></head><body> <div class="centered"><div id="in" class="border1">';
echo "<p class='s1'>Hamara Bank - View My Details </p></br>";
$conn = mysqli_connect("localhost", "satish", "satish", "esbank");
$em=$_SESSION["email"];
$qry="SELECT * FROM users WHERE Email='$em'";
$result=mysqli_query($conn, $qry);
$count=mysqli_num_rows($result);
if($count==1)
{
	//session_register('em');
	//$_SESSION["email"]=$em;
	//echo $_SESSION["email"];
	while($row = mysqli_fetch_assoc($result)) 
	{
	//echo '<img src="logo.jpg"/></br>';
	//echo "<p> Welcome to My Bank where your data is MORE SECURE ;p</p></br>";
	echo "<p class='s3'> Welcome " . $row["Name"]. "<br>";
	//echo "Welcome " . $row["Name"]. "<br>";
	echo "Your details:</br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name: ".$row['Name']."</br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: ".$row['Email']."</br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Account Number: ".$row['ActNumber']."</br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Contact: ".$row['PhoneNumber']."</br></p>";
	echo "<input type='submit' value='Back' onclick='javascript:window.location=document.referrer'/>";
	echo "<form action='logout.php'><input type='hidden' name='redirectURL' value='login.html'/><input type='submit' value='Logout'/></form>";
	}
}
else
{
	echo "User not found";
}
?>