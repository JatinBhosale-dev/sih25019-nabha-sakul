<?php
$host = "localhost";         // or 127.0.0.1
$dbname = "edunabha";        // your database name
$username = "root";          // default for XAMPP
$password = "";              // leave blank unless you set a password

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>