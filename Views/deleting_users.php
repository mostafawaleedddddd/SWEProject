<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - User Management</title>
    <style>
        :root {
            --primary-color: #4a90e2;
            --secondary-color: #f39c12;
            --background-color: #f0f4f8;
            --text-color: #333;
            --success-color: #2ecc71;
            --error-color: #e74c3c;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: var(--primary-color);
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5em;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 8px;
            font-weight: bold;
            color: var(--primary-color);
        }

        input[type="text"] {
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid var(--primary-color);
            border-radius: 4px;
            font-size: 16px;
        }

        button {
            background-color: var(--secondary-color);
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #e67e22;
        }

        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            font-weight: bold;
        }

        .success {
            background-color: var(--success-color);
            color: white;
        }

        .error {
            background-color: var(--error-color);
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Dashboard</h1>

        <?php
        require_once '../Controllers/AdminController.php';
        require_once '../Models/Admin.php';

        $model = new Admin();
        $controller = new AdminController();

        if (isset($_POST['action']) && $_POST['action'] === 'delete') {
            
            $userName = $_POST['userName'];
           

       if (!$controller->isValidName($userName)) {
        echo "<div class='message error'>Please enter a valid name.</div>";
    } else {
        
        if ($controller->userExists($userName)) {
            
            if ($controller->deleteUserByName($userName)) {
                echo "<div class='message success'>User deleted successfully.</div>";
            }
        } else {
            echo "<div class='message error'>User Is Not Found.</div>";
        }
    } }
            
        ?>

        <form method="post">
            <label for="userName">User Name:</label>
            <input type="text" id="userName" name="userName" required placeholder="Enter user name to delete">
            <input type="hidden" name="action" value="delete">
            <button type="submit">Delete User</button>
        </form>
    </div>
</body>
</html>