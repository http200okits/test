<?php
error_reporting(0);
header("Cache-Control: public");
echo '<html><head><title>Hamara Bank</title><link rel="stylesheet" href="style1.css"><meta http-equiv="Cache-control" content="public"></head><body> <div class="centered"><div id="in" class="border1">';
echo "<p class='s1'>Hamara Bank - Home </p></br>";

 session_start(); 
 if ($_SERVER["REQUEST_METHOD"] == "POST") //accepts only POST
 {
 //session_regenerate_id(true);
 $conn = mysqli_connect("localhost", "satish", "satish", "esbank");
$em=$_REQUEST['useremail']; //source
//$em=mysqli_real_escape_string($conn,$_REQUEST['useremail']);
//echo $em;
//echo htmlspecialchars($em); //sink for xss 
$pword=$_REQUEST['userpword'];//source
//$pword=md5($pword);
//$pword=mysqli_real_escape_string($conn,$_REQUEST['userpword']); 
 //$salt=2074303286;
//$salt=rand();
//$pword=md5($pword.$salt);
echo $salt;
//echo "</br>".$pword;
//$qry='SELECT * FROM users WHERE Email="'.$em.'" AND Password="'.$pword.'"'; //sink for sql injection 
$qry="SELECT * FROM users WHERE Email='".$em."' AND Password='".$pword."'" ; //sink for sql injection 
//echo $qry;
$result=mysqli_query($conn, $qry);
$count=mysqli_num_rows($result);
if($count==1)
{
	//session_register('em');
	$_SESSION["email"]=$em;
	//echo $_SESSION["email"];
	while($row = mysqli_fetch_assoc($result)) 
	{
	//echo '<img src="logo.jpg"/></br>';
	//echo "<p class='s1'> Home</p></br>";
	echo "<p class='s3'> Welcome " . $row["Name"]. "<br></p>";
	
	echo "<form action='search.php' method='get' >";
	echo "<input type='text' name='query' class='s' placeholder='E.g: Personal Loan' />";
	echo "<input type='submit' class='b1' value='Search'/>";
	echo "</form>";
	echo "<p class='s3'>Your details:</br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name: ".$row['Name']."</br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: ".$row['Email']."</p>" ;
	$id=$row['id'];
	//echo "</br></br><a href='users.php'>View My Details</a>";
	echo "<form action='users.php'><input type='submit' value='View My Details'/></form>";
	echo "<form action='acctSummary.php'> <input type='hidden' name='ID' value='$id'/><input type='submit' value='View My Account & Balance'/></form>";
	echo "<form action='updatepassword.php'><input type='submit' value='Change Password'/></form>";
	echo "<form action='logout.php'><input type='hidden' name='redirectURL' value='login.html'/><input type='submit' value='Logout'/></form>";
	//echo "</br></br><a href='acctSummary.php?ID=$id'>View My Account & Balance</a>";
	//echo "</br></br><a href='updatepassword.php'>Change Password</a>";
	//echo "</br></br><a href='updatepassword1.php'>Change Password - No CSRF </a>";
	//echo "</br></br><a href='updatepassword2.php'>Change Password - No CSRF - Double Cookie Submission </a>";
	//echo "</br></br><a href='logout.php?redirectURL=login.html&lang=en-us'>Logout</a></p>";
	}
}
else
{ 
	
	echo "<p class='s3'>Incorrect credentials. Error: ".mysqli_error($conn)."</p>";
	echo "<INPUT Type='submit' VALUE='Back' onClick='history.go(-1);return true;'></br>";

}
 }
 else
 {
echo "<p class='s3'>Method not supported</p>";
}
?>