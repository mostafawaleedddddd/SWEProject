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
      <form action="">
        <h1>Login</h1>
          <div class="input-box">
            <input type="text" placeholder="Username" required>
            <i class='bx bxs-user'></i>
          </div>
          <div class="input-box">
            <input type="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt'></i>
          </div>
          <button type="submit" class="btn" value="Login">Login</button>
          <div class="register-link">
            <p>Dont have an account? <a href="/Medira/Views/Signup.php">Register</a></p>
          </div>
      </form>
    </div>
  </div>
</body>

</html>