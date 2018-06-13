<?php
$host = "localhost";
$user = "root";
$pass = "chichi1980";
$db = "MyDB";


$con = mysqli_connect($host, $user, $pass, $db);

if(!$con){
    die("Connection Failed: ".mysqli_connect_error());
}