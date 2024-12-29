<?php

require_once '../db/dp.php'; // Database connection
require_once '../Models/User.php';
require_once '../Controllers/User.php';
require_once 'NavBar.php'; // Ensure this file is included to initialize the session

$model = new User();
$controller = new UserController($model);

$loginError = false; // Initialize login error flag

if (isset($_POST['login'])) {
  $name = $_POST["username"];
  $password = $_POST["password"];
  $dbh = new DBh();
  $conn = $dbh->getConn();

  // Define the user types and their corresponding tables
  $userTables = [
    'admin' => 'admins',
    'patient' => 'users',
    'healthCare' => 'healthcare' // Ensure table name is consistent with database
  ];

  $authenticated = false;
  if ($controller->isEmailBanned($name)) {
    header("Location: ../Views/Bannedusers.php");
    exit();
  } else {
    foreach ($userTables as $userType => $tableName) {
      $query = "SELECT * FROM $tableName WHERE email = ? and password = ?";
      $stmt = $conn->prepare($query);

      if (!$stmt) {
        die("Query preparation failed: " . $conn->error);
      }

      $stmt->bind_param("ss", $name, $password); // Bind email (username) parameter
      $stmt->execute();
      $result = $stmt->get_result()->fetch_assoc();

      if ($result) {
        $_SESSION['user'] = $result;
        $_SESSION['user_type'] = $userType;
        $authenticated = true;
        break;
      }
    }
  }

  // Handle authentication result
  if ($authenticated) {
    if ($_SESSION['user_type'] == 'admin') {
      header("Location: ../Views/Admin_dashboard.php");
    } else {
      header("Location: /Medira/Views/index.php");
      exit();
    }
  } else {
    $loginError = true; // Set the error flag
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Medira</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/Medira/Media/css/login.css">
  <link rel="stylesheet" href="/Medira/Media/css/NavBar.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
  <div id="navbar">
    <?php include "NavBar.php"; ?>
  </div>
  <div class="center-container">
    <div class="wrapper">
      <form action="login.php" method="post">
        <h1>Login</h1>
        <div class="input-box">
          <input type="text" placeholder="Username (Email)" name="username" required>
          <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
          <input type="password" placeholder="Password" name="password" required>
          <i class='bx bxs-lock-alt'></i>
        </div>
        <button type="submit" class="btn" value="Login" name="login">Login</button>
        <div class="register-link">
          <p>Don't have an account? <a href="/Medira/Views/Signup.php">Register</a></p>
        </div>
      </form>
    </div>
  </div>

  <!-- Inline Alert for Invalid Credentials -->
  <?php if ($loginError): ?>
    <script>
      alert("Invalid credentials. Please try again.");
    </script>
    <?php $loginError = false; ?>
  <?php endif; ?>
</body>

</html>