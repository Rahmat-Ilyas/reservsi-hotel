<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_hotel"); 

function url($url) {
	$crypt = crypt('page', $url);
	$set_url = "page=".$url."&view=".$crypt;
	return $set_url;
}

function setlogin($pass, $chek) {
	$_SESSION[$pass] = true;
	if (isset($chek)) {
		setcookie($pass, true, time()+172800);
		setcookie('login', $pass, time()+172800);
	}
}

function ceklogin() {
	if (isset($_SESSION['login'])) {
		$pass = $_SESSION['login'];
		if (isset($_SESSION[$pass])) {
			return $pass;
		}
	}
}

if (isset($_GET['logout'])) {
	session_unset();
	session_destroy();
	$pass = $_COOKIE['login'];
	setcookie($pass, '', time()-172800);
	setcookie('login', '', time()-172800);
	setcookie('this', '', time()-172800);

	header("location: login.php");
}
?>