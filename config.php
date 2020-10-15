<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "db_hotel"); 

function url($url) {
	$crypt = crypt('page', $url);
	$set_url = "page=".$url."&view=".$crypt;
	return $set_url;
}

?>