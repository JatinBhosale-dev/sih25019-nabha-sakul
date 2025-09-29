<?php
include 'db_connect.php';

$username = $_POST['username'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = "SELECT * FROM users WHERE username='$username' AND role='$role'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
  $user = $result->fetch_assoc();
  if ($password === $user['password']) {
    switch ($role) {
      case 'student':
        header("Location: ../student-dashboard.html");
        break;
      case 'teacher':
        header("Location: ../teacher-dashboard.html");
        break;
      case 'parent':
        header("Location: ../parent-dashboard.html");
        break;
      case 'principal':
        header("Location: ../principal-dashboard.html");
        break;
    }
    exit();
  } else {
    echo "❌ Incorrect password.";
  }
} else {
  echo "❌ User not found.";
}
?>