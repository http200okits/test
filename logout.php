<?php
session_start();
$url=$_GET['redirectURL']; //source
//$lang=$_GET['lang']; //source

//session_destroy();
//if(session_destroy())
//{
	//session_regenerate_id(true);
//header('Set-Cookie: SESSID=rv7isic13776hmhv9k76l5s0b4; path=/; HttpOnly');
header('Location:'.$url); //sink for open redirection 
//header('Language:'.$lang);
//header('Location:login.html');
//}
//session_unset();
//session_destroy();


?>