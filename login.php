<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Nabha Sakul – Login</title>
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
  <section class="dashboard">
    <h2>🔐 Login to Nabha Sakul</h2>
    <form action="auth.php" method="POST" class="upload-form">
      <label>Username:</label>
      <input type="text" name="username" required>

      <label>Password:</label>
      <input type="password" name="password" required>

      <label>Role:</label>
      <select name="role" required>
        <option value="student">Student</option>
        <option value="teacher">Teacher</option>
        <option value="principal">Principal</option>
      </select>

      <button type="submit" class="btn blue">Login</button>
    </form>
  </section>
</body>
</html>