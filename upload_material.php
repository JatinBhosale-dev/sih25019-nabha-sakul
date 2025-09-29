<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "edunabha";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$title = $_POST['title'];
$description = $_POST['description'];
$file = $_FILES['file'];

$targetDir = "uploads/";
if (!is_dir($targetDir)) {
  mkdir($targetDir);
}

$filename = basename($file["name"]);
$targetFile = $targetDir . $filename;

if (move_uploaded_file($file["tmp_name"], $targetFile)) {
  $sql = "INSERT INTO materials (title, description, filename) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $title, $description, $filename);
  $stmt->execute();
  echo "✅ Material uploaded successfully!";
} else {
  echo "❌ Failed to upload file.";
}

$conn->close();
?>