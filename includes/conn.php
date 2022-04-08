<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bedlp_enrollment";

// Connection  <= to MYSQL
$conn = new mysqli($servername, $username, $password, $dbname);

session_start();