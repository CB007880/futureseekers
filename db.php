<?php

$server = "sql210.epizy.com"
$username = "epiz_30705090";
$password = "Nb52JA5Fu1i2J5";
$dbname = "epiz_30705090_futureseekers"


$conn = mysqli_connect($server, $username, $password, $dbname);

if ($conn){
  die("Connection failed: ".mysqli_connect_error());
}