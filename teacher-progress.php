<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Update Student Progress</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <header class="navbar">
    <div class="brand">📘 Nabha Sakul</div>
    <nav>
      <ul class="nav-links">
        <li><a href="teacher-dashboard.html">Dashboard</a></li>
        <li><a href="teacher-progress.php">Progress</a></li>
        <li><a href="#">Logout</a></li>
      </ul>
    </nav>
  </header>

  <section class="dashboard">
    <h2>📈 Update Student Progress</h2>
    <form action="save_progress.php" method="POST" class="upload-form">
      <label for="student">Student Name:</label>
      <input type="text" id="student" name="student_name" required>

      <label for="subject">Subject:</label>
      <input type="text" id="subject" name="subject" required>

      <label for="task">Task:</label>
      <input type="text" id="task" name="task" required>

      <label for="status">Status:</label>
      <select name="status" required>
        <option value="Completed">✅ Completed</option>
        <option value="Pending">⏳ Pending</option>
        <option value="Submitted">📤 Submitted</option>
      </select>

      <label for="score">Score (if any):</label>
      <input type="number" name="score" min="0" max="100">

      <button type="submit" class="btn green">Save Progress</button>
    </form>
  </section>
</body>
</html>