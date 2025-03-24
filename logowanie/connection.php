<?php
error_reporting(0);
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "pyknijmy";

if(!$conn  = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{

        die("Failed to connect!");
}
mysqli_query($conn, "SET COLLATION_CONNECTION = 'utf8_polish_ci';");
mysqli_query($conn, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci';");