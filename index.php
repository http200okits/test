<?php

echo '<html>
	<head>
		<title>Hamara Bank</title>
		<link rel="stylesheet" href="style.css">
	</head>
	<body>
	<!--<img src="logo.jpg"/>-->
	<div class="centered">
	<div id="in" class="border1">
	<p class="s1" > Registration</p>
	<p class="s1" > Welcome to Hamara Bank. The best Bank to Bank</p>
	<p class="s2"> Please Register for Internet Banking using below form</p>

	<form action="register.php" method="GET" autocomplete="off">
	<input type="text" name="username" class="s" placeholder="Name"/></br></br>
	<input type="email" name="useremail" class="s" placeholder="Email"/></br></br>
	<input type="text" name="userphone" class="s" placeholder="Phone Number"/></br></br>
	<input type="text" name="useraccount" class="s" placeholder="Account Number"/></br></br>
	<input type="password" name="userpword" class="s" placeholder="Password"/></br></br>
	<input type="submit" value="Register"/></br></br>
	</form>
	
	<p class="s2">If you are an existing customer, please <a href="login.html">Login</a> to Internet Banking.</p>
	</div>
</div>
	 
	</body>


</html>';
?>