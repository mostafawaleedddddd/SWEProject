<?php
require_once '../db/dp.php'; // Database connection
require_once '../Models/User.php';
require_once '../Controllers/User.php';
require_once 'NavBar.php'; // Ensure this file is included to initialize the session

$model = new User();
$controller = new UserController($model);

if (isset($_POST['login'])) {
    $name = $_POST["username"];
    $password = $_POST["password"];
    $dbh = new DBh();
    $conn = $dbh->getConn();

    // Define an array to store user type and query structure
    $userTables = [
        'admin' => 'admins',
        'patient' => 'users',
        'healthCare' => 'healthCare'
    ];

    $authenticated = false;

    foreach ($userTables as $userType => $tableName) {
        $query = "SELECT * FROM $tableName WHERE Username = ?";
        $stmt = $conn->prepare($query);

        if (!$stmt) {
            die("Query preparation failed: " . $conn->error);
        }

        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();

        if ($result && password_verify($password, $result['Password'])) {
            $_SESSION['user'] = $result;
            $_SESSION['user_type'] = $userType;
            $authenticated = true;
            break;
        }
    }

    if ($authenticated) {
        header("Location:/Medira/Views/index.php");
        exit(); // Stop further execution
    } else {
        http_response_code(401);
        echo 'Invalid credentials';
        exit();
    }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <title>Medira</title>
  <meta name="viewport" content="width=device-width,
      initial-scale=1.0" />
  <link rel="stylesheet" href="/Medira/Media/css/login.css">
  <link rel="stylesheet" href="/Medira/Media/css/NavBar.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
  <!-- phone number , gender , date of birth ,name , email , password -->
  <div id="navbar">
    <?php include "NavBar.php"; ?>
  </div>
  <div class="center-container">
    <div class="wrapper">
      <form action="login.php"method="post">
        <h1>Login</h1>
          <div class="input-box">
            <input type="text" placeholder="Username" name="username" required>
            <i class='bx bxs-user'></i>
          </div>
          <div class="input-box">
            <input type="password" placeholder="Password" name="password" required>
            <i class='bx bxs-lock-alt'></i>
          </div>
          <button type="submit" class="btn" value="Login" name="login">Login</button>
          <div class="register-link">
            <p>Dont have an account? <a href="/Medira/Views/Signup.php">Register</a></p>
          </div>
      </form>
    </div>
  </div>
</body>

</html>