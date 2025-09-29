<?php
session_start();
$conn = new mysqli("localhost", "root", "", "edunabha");

$username = trim($_POST['username']);
$password = trim($_POST['password']);
$role = $_POST['role'];

// Debug output
echo "<h3>🔍 Debugging Login Input</h3>";
echo "Username: <strong>$username</strong><br>";
echo "Password: <strong>$password</strong><br>";
echo "Role: <strong>$role</strong><br><br>";

$sql = "SELECT * FROM users WHERE username=? AND password=? AND role=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $password, $role);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
  echo "✅ Login successful! Redirecting...";
  $_SESSION['username'] = $username;
  $_SESSION['role'] = $role;

  // Delay to show debug output
  sleep(2);

  if ($role === "student") {
    header("Location: student-dashboard.html");
  } elseif ($role === "teacher") {
    header("Location: teacher-dashboard.html");
  } elseif ($role === "principal") {
    header("Location: principal-dashboard.html");
  }
  exit;
} else {
  echo "<p style='color:red;'>❌ Invalid login. Check username, password, and role.</p>";
}
?>