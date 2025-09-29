<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Nabha Sakul – Study Materials</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header class="navbar">
    <div class="brand">📘 Nabha Sakul</div>
    <nav>
      <ul class="nav-links">
        <li><a href="student-dashboard.html">Dashboard</a></li>
        <li><a href="materials.php">Materials</a></li>
        <li><a href="#">Logout</a></li>
      </ul>
    </nav>
  </header>

  <section class="dashboard">
    <h2>📚 Available Study Materials</h2>
    <div class="card-container">
      <?php
      $conn = new mysqli("localhost", "root", "", "edunabha");
      if ($conn->connect_error) {
        echo "<p style='color:red;'>Database connection failed.</p>";
        exit;
      }

      $result = $conn->query("SELECT * FROM materials ORDER BY uploaded_at DESC");
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<div class="card">';
          echo '<h3>' . htmlspecialchars($row["title"]) . '</h3>';
          echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
          echo '<a href="uploads/' . urlencode($row["filename"]) . '" class="btn blue" download>Download</a>';
          echo '</div>';
        }
      } else {
        echo "<p>No materials uploaded yet.</p>";
      }

      $conn->close();
      ?>
    </div>
  </section>
</body>
</html>