<?php
session_start();
echo '<html><head><title>Hamara Bank</title><link rel="stylesheet" href="style.css"></head><body> <div class="centered"><div id="in" class="border1">';
echo "<p class='s1'>Hamara Bank - Account Summary </p>";
//header('Cache-Control: no-store, no-cache, must-revalidate');
//header('Access-Control-Allow-Origin:*');
$conn = mysqli_connect("localhost", "satish", "satish", "esbank");
//$em=$_SESSION["email"];
$id=$_GET['ID'];
//$id=mysqli_real_escape_string($conn,$_GET['ID']); ///source
//echo $em;
//$em=$_GET['ID']; //source
$qry="SELECT * FROM users WHERE ID='$id'"; //sink 
$result=mysqli_query($conn, $qry);
//echo "<p class='s2'>Search in bank</p>";
//echo "<form action='search.php' method='get' >";
	//echo "<input type='text' name='query' class='s' placeholder='E.g: Personal Loan' />";
	//echo "<input type='submit'  value='Search'/>";
	//echo "</form>";
if($result)
{
//$count=mysqli_num_rows($result);
//if($count==1)
//{
	//session_register('em');
	//$_SESSION["email"]=$em;
	//echo $_SESSION["email"];
	while($row = mysqli_fetch_assoc($result)) 
	{
	//echo '<img src="logo.jpg"/></br>';
	//echo "<p> Welcome to My Bank where your data is MORE SECURE ;p</p></br>";
	echo "<p class='s3'> Welcome " . $row["Name"]. "<br>";
	$act=$row['ActNumber'];
	echo "Account details:</br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Account Number: ".$act."</br>";
	echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Balance: ".$row['Balance']."</p>";
	echo "<form action='transfer.php' method='GET' autocomplete='off'>";
	echo " <input type='text' value='$act' name='FromAct' class='s' placeholder='From Account' /></br></br>";
	echo " <input type='text' value='' name='toAct' class='s' placeholder='To Account'/></br></br>";
	echo " <input type='text' value='' name='amt' class='s' placeholder='Amount'/></br></br>";
	echo " <input type='text' value='' name='remarks' class='s' placeholder='Remarks'/></br></br>";
	//echo "<input type='hidden' value='uh5i80k8hacs8klum6otm7iqg7' name='AnticsrfToken'/></br></br>";
	echo "<input type='submit'  value='Transfer'/>";
	echo "</form>";
	echo "<p class='s3'>Recent Transaction Remarks: ".$row['Remarks']."</p>";;
	echo "<br><input type='submit' value='Back' onClick='history.go(-1);return true;'>";
	echo "<form action='logout.php'><input type='hidden' name='redirectURL' value='login.html'/><input type='submit' value='Logout'/></form></tr>";
	//echo "</br></br><a href='http://abc.com'>http://abc.com</a>";
	}
}
else
{
	echo "User not found: ";//.mysqli_error($conn);
}

?>