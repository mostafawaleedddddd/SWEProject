<?php
    require_once '../Controllers/AdminController.php';
    require_once '../Models/Admin.php';

    $model = new Admin();
    $controller = new AdminController();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        
    
    if (empty($fullName) || empty($email)) {
      $errors[] = "All fields are required.";
  }
  if (!preg_match("/^[a-zA-Z\s]+$/", $fullName)) {
    $errors[] = "Invalid full name.";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email.";
}

if (!empty($errors)) {
  $message = ''; 
  foreach ($errors as $error) {
      $message .= $error . " "; // Use .= to concatenate strings
  }
  echo "<div class='message error'>" . $message . "</div>";
} else {
  
  if ($controller->banUser($fullName,$email)) {
      echo "";
  } else {
      echo "";
  }
}

}    
    
    
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ban User Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;34
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 400px;
        }
        .form {
            display: flex;
            flex-direction: column;
        }
        .title {
            color: #ff0000;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
        }
        .message {
            color: #ff0000;
            text-align: center;
            margin-bottom: 1rem;
        }
        label {
            margin-bottom: 1rem;
            position: relative;
        }
        .input {
            width: 100%;
            padding: 10px;
            border: 2px solid #ff0000;
            border-radius: 4px;
            font-size: 16px;
        }
        .input:focus {
            outline: none;
            border-color: #ff5555;
        }
        span {
            position: absolute;
            top: -8px;
            left: 10px;
            background-color: #fff;
            padding: 0 5px;
            color: #ff0000;
            font-size: 12px;
        }
        .submit {
            background-color: #ff0000;
            color: #fff;
            border: none;
            padding: 10px;
            font-size: 18px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .submit:hover {
            background-color: #cc0000;
        }
    </style>
</head>
<body>
    <div class="container">
        <form class="form" method="POST" action="">
            <p class="title">Ban User</p>
            <p class="message">Caution: This action is irreversible</p>

            <label>
                <input class="input" type="text" placeholder="" required="" name="fullName">
                <span>Full Name</span>
            </label>

            <label>
                <input class="input" type="email" name="email" placeholder="" required="">
                <span>Email</span>
            </label>

            <button class="submit">Ban User</button>
        </form>
    </div>
</body>
</html>

