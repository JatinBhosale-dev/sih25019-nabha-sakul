<?php
$conn = new mysqli("localhost", "root", "", "edunabha");
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$student = $_POST['student_name'];
$subject = $_POST['subject'];
$task = $_POST['task'];
$status = $_POST['status'];
$score = $_POST['score'];

$sql = "INSERT INTO progress (student_name, subject, task, status, score) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssi", $student, $subject, $task, $status, $score);
$stmt->execute();

$conn->close();
header("Location: teacher-progress.php");
exit;
?>