<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "GrooveSound";

$conn = mysqli_connect($servername,$username,$password,$database);

if (!$conn) {
    die("A Conexão falhou! ".mysqli_connect_error());
}
