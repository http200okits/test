<?php
session_start();
echo '<html><head><title>Hamara Bank</title><link rel="stylesheet" href="style.css"></head><body> <div class="centered"><div id="in" class="border1">';
echo "<p class='s1'>Hamara Bank - Search </p></br>";
echo "<p class='s3'>No results found " . $_GET['query'] ."</p>";
echo "<INPUT Type='submit' VALUE='Back' onClick='history.go(-1);return true;'><form action='logout.php'><input type='hidden' name='redirectURL' value='login.html'/><input type='submit' value='Logout'/></form>";

?>