<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "pyknijmy";

if(!$conn  = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{

        die("Failed to connect!");
}