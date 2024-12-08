<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Medira</title>
    <meta name="viewport" content="width=device-width,
      initial-scale=1.0" />
    <link rel="stylesheet" href="/Medira/Media/css/signup.css">
    <link rel="stylesheet" href="/Medira/Media/css/NavBar.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <!-- phone number , gender , date of birth ,name , email , password -->
    <div id="navbar">
    <?php include "NavBar.php"; ?>
    </div>

    <div class="center-container">
        <div class="container">
            <h1 class="form-title">Login</h1>
            <form action="" method="post" onsubmit="">
                <div class="main-user-info">
                    
                    <div class="user-input-box">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter Email" required />
                    </div>
                    
                    <div class="user-input-box">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Password" required />
                    </div>
                   
                </div>

                
                <div class="form-submit-btn">
                    <input type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</body>

</html>