<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname   = "chatbot";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn)
{
	//echo "Connetcted";
}
else 
{
	echo "Failed to connect";
}