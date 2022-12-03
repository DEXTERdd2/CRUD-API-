<?php 
define('servername', 'localhost');
define ('DB_USER', 'root');
define ('DB_PASSWORD', '');
define ('DB_NAME' , 'mydb');


$conn = new mysqli (servername, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn ->connect_error){
    die ("Not Connected" . $conn->connect_error);
    
}