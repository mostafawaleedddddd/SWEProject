<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Contact Messages</title>
    <style>
        :root {
            --primary-color: #4a90e2;
            --secondary-color: #f5a623;
            --background-color: #f0f4f8;
            --text-color: #333;
            --header-color: #2c3e50;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: var(--background-color);
            color: var(--text-color);
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: var(--header-color);
            color: white;
            padding: 20px 0;
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .welcome-message {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .messages-table {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background-color: var(--primary-color);
            color: white;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 0.5px;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #e9ecef;
            transition: background-color 0.3s ease;
        }

        .message-cell {
            max-width: 400px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .timestamp {
            color: #6c757d;
            font-size: 0.9em;
        }

        .email {
            color: var(--primary-color);
            text-decoration: none;
        }

        .email:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .header h1 {
                font-size: 2rem;
            }

            .welcome-message {
                font-size: 1rem;
            }

            th, td {
                padding: 10px;
            }

            .message-cell {
                max-width: 200px;
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <h1>Admin Dashboard</h1>
            <p class="welcome-message">Welcome back, Admin! Here are the latest contact messages.</p>
        </div>
    </header>

    <div class="container">
        <div class="messages-table">
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../Controllers/AdminController.php';
                    require_once '../Models/Admin.php';

                    $model = new AdminController();
                    $messages = $model->getAllMessages();

                    if ($messages) {
                        foreach ($messages as $message) {
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($message['name']) . "</td>";
                            echo "<td><a href='mailto:" . htmlspecialchars($message['email']) . "' class='email'>" . htmlspecialchars($message['email']) . "</a></td>";
                            echo "<td class='message-cell'>" . htmlspecialchars($message['message']) . "</td>";
                            echo "<td class='timestamp'>" . htmlspecialchars($message['created_at']) . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No messages found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>