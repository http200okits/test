<?php
session_start();
echo '<html><head><title>Hamara Bank</title><link rel="stylesheet" href="style.css"></head><body> <div class="centered"><div id="in" class="border1">';
echo "<p class='s1'>Hamara Bank - Transaction </p></br>";
$ToAct=$_REQUEST['toAct'];
$FromAct=$_REQUEST['FromAct'];
$Amount=(float)$_REQUEST['amt'];
$remarks=$_REQUEST['remarks'];
//echo $remarks;
$ToSucess=0;
$FromSuccess=0;
$ProceedTransaction=0;
$ref= $_SERVER['HTTP_REFERER'];
//$url=stripslashes("http://bank.com/esbank/acctSummary.php?ID=");
//echo $url;
//if(preg_match('/54.159.50.1/', $ref))
//{
	
// $csrfToken=$_REQUEST['AnticsrfToken'];

// if($csrfToken=='uh5i80k8hacs8klum6otm7iqg7')
// {

if ($_SERVER["REQUEST_METHOD"] == "GET") {
$conn = mysqli_connect("localhost", "satish", "satish", "esbank");
$qry1="SELECT * FROM users WHERE ActNumber='$ToAct'";
$result=mysqli_query($conn, $qry1);
$id=$row['id'];
$count=mysqli_num_rows($result);
if($count==1)
{
	$ProceedTransaction=1;
	while($row = mysqli_fetch_assoc($result)) 
	{
		$newBalance1=$row['Balance']+$Amount;
		//echo $newBalance1;
		$qry2="UPDATE users SET Balance=$newBalance1 , Remarks='$remarks' WHERE ActNumber='$ToAct'";
		if(mysqli_query($conn, $qry2))
		{
			$ToSucess=1;
		}
		else
		{
			$ToSucess=0;
		}
	}
}
else
{
	$ProceedTransaction=0;
	//echo "<script>alert('Incorrect To Account')</script></br><a href='acctSummary.php?Id='>Back</a>";
	echo "<p class='s1'> Error</br>";
	echo "Something went wrong. Transaction was not successful". mysqli_error($conn)."<p></br><INPUT Type='submit' VALUE='Back' onClick='history.go(-1);return true;'></br>";
	echo "<form action='logout.php'><input type='hidden' name='redirectURL' value='login.html'/><input type='submit' value='Logout'/></form>";
}

if($ProceedTransaction==1)
{
//Debit from 'From Account'
$qry2="SELECT * FROM users WHERE ActNumber='$FromAct'";
$result1=mysqli_query($conn, $qry2);
$count1=mysqli_num_rows($result1);
if($count1==1)
{
	while($row = mysqli_fetch_assoc($result1)) 
	{
		$newBalance2=$row['Balance']-$Amount;
		//echo $newBalance2;
		$qry3="UPDATE users SET Balance=$newBalance2 , Remarks='$remarks' WHERE ActNumber='$FromAct'";
		if(mysqli_query($conn, $qry3))
			$FromSuccess=1;
		else
			$FromSuccess=0;
	}
}

else
{
	//echo '<img src="logo.jpg"/></br>';
	echo "<p class='s1'> Error</br>";
	echo "Something went wrong. Transaction was not successful". mysqli_error($conn)."<p></br><INPUT Type='submit' VALUE='Back' onClick='history.go(-1);return true;'></br>";
	echo "<form action='logout.php'><input type='hidden' name='redirectURL' value='login.html'/><input type='submit' value='Logout'/></form>";
}
}

if ($ToSucess==1 && $FromSuccess==1)
{
	//echo '<img src="logo.jpg"/></br>';
	echo "<p class='s1'>Success </p></br> <INPUT Type='submit' VALUE='Back' onClick='history.go(-1);return true;'></br>";
	echo "<form action='logout.php'><input type='hidden' name='redirectURL' value='login.html'/><input type='submit' value='Logout'/></form>";
	
}


}
else{
	echo "HTTP Method is not supported";
}
//}
//else
//{
//echo "Request from Cross domain is not allowed";
//}	

// }
 
// else{
 // echo	"CSRFToken Failed";
// }
	

?>