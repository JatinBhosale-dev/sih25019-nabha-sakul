<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Nabha Sakul – Student Progress</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header class="navbar">
    <div class="brand">📘 Nabha Sakul</div>
    <nav>
      <ul class="nav-links">
        <li><a href="student-dashboard.html">Dashboard</a></li>
        <li><a href="materials.php">Materials</a></li>
        <li><a href="progress.php">Progress</a></li>
        <li><a href="#">Logout</a></li>
      </ul>
    </nav>
  </header>

  <section class="dashboard">
    <h2>📊 Your Progress</h2>
    <div class="card-container">
      <?php
      $conn = new mysqli("localhost", "root", "", "edunabha");
      if ($conn->connect_error) {
        echo "<p style='color:red;'>Database connection failed.</p>";
        exit;
      }

      // You can filter by student name if needed
      $result = $conn->query("SELECT * FROM progress ORDER BY updated_at DESC");

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          $color = ($row["status"] === "Completed") ? "green" : (($row["status"] === "Submitted") ? "blue" : "red");
          echo '<div class="card ' . $color . '">';
          echo '<h3>' . htmlspecialchars($row["subject"]) . ' – ' . htmlspecialchars($row["task"]) . '</h3>';
          echo '<p>Student: ' . htmlspecialchars($row["student_name"]) . '</p>';
          echo '<p>Status: ' . htmlspecialchars($row["status"]) . '</p>';
          if ($row["score"] !== null) {
            echo '<p>Score: ' . $row["score"] . '%</p>';
          }
          echo '</div>';
        }
      } else {
        echo "<p>No progress data available yet.</p>";
      }

      $conn->close();
      ?>
    </div>
  </section>
</body>
</html>