<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical System - Admin Dashboard</title>
    <style>
        :root {
            --primary: #2563eb;
            --secondary: #64748b;
            --success: #22c55e;
            --danger: #ef4444;
            --warning: #f59e0b;
            --background: #f8fafc;
            --surface: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: var(--background);
            color: #1e293b;
            line-height: 1.5;
        }

        .dashboard {
            display: grid;
            grid-template-columns: 250px 1fr;
            min-height: 100vh;
        }

        .sidebar {
            background: var(--surface);
            padding: 1.5rem;
            border-right: 1px solid #e2e8f0;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 2rem;
        }

        .nav-item {
            padding: 0.75rem 1rem;
            margin: 0.5rem 0;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .nav-item:hover {
            background: #f1f5f9;
        }

        .nav-item.active {
            background: var(--primary);
            color: white;
        }

        .main-content {
            padding: 2rem;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
        }

        .search-bar {
            display: flex;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        input, select {
            padding: 0.5rem 1rem;
            border: 1px solid #e2e8f0;
            border-radius: 0.375rem;
            font-size: 0.875rem;
        }

        .button {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.375rem;
            font-weight: 500;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .button:hover {
            opacity: 0.9;
        }

        .button-primary {
            background: var(--primary);
            color: white;
        }

        .button-danger {
            background: var(--danger);
            color: white;
        }

        .button-success {
            background: var(--success);
            color: white;
        }

        .users-table {
            width: 100%;
            background: var(--surface);
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
        }

        .users-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .users-table th {
            background: #f8fafc;
            padding: 1rem;
            text-align: left;
            font-weight: 600;
            color: var(--secondary);
        }

        .users-table td {
            padding: 1rem;
            border-top: 1px solid #e2e8f0;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .status-active {
            background: #dcfce7;
            color: #166534;
        }

        .status-inactive {
            background: #fee2e2;
            color: #991b1b;
        }

        .action-buttons {
            display: none;
            gap: 0.5rem;
        }

        .action-buttons.show {
            display: flex;
        }

        .bulk-actions {
            background: var(--surface);
            padding: 1rem;
            border-radius: 0.5rem;
            margin-top: 1rem;
            display: flex;
            gap: 1rem;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <div class="sidebar">
            <div class="logo">Medical System</div>
            <div class="nav-item active">Dashboard</div>
            <div class="nav-item">View Users</div>
            <div class="nav-item">Edit Users</div>
            <div class="nav-item">Manage Roles</div>
            <div class="nav-item">Settings</div>
        </div>

        <div class="main-content">
            <div class="header">
                <h1>User Management</h1>
                <a href="/Medira/Views/Add_Users.php" class="button button-primary">+ Add New User</a>
            </div>

            <div class="search-bar">
                <input type="text" placeholder="Search users..." style="width: 300px;">
                <select>
                    <option>All Roles</option>
                    <option>Healthcare Provider</option>
                    <option>User</option>

                </select>
                <select>
                    <option>All Status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
                <button class="button button-primary">Search</button>
            </div>

            <div class="users-table">
                <table>
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th>
                            <th>Name</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Registration Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../Controllers/AdminController.php';
                        $controller = new AdminController();
                        $users = $controller->getAllUsers();

                        foreach ($users as $user) {
                            $userId = htmlspecialchars($user['name']); // Using name as ID for this example
                            echo "<tr>";
                            echo "<td><input type='checkbox' class='user-checkbox' data-userid='{$userId}'></td>";
                            echo "<td>{$userId}</td>";
                            echo "<td>" . htmlspecialchars($user['role']) . "</td>";
                            echo "<td><span class='status-badge status-active'>" . htmlspecialchars($user['status']) . "</span></td>";
                            echo "<td>" . htmlspecialchars($user['registration_date']) . "</td>";
                            echo "<td>
                                    <div class='action-buttons' data-actions='{$userId}'>
                                        <button class='button button-primary' onclick='editUser(\"{$userId}\")'>Edit</button>
                                        <button class='button button-danger' onclick='deleteUser(\"{$userId}\")'>Delete</button>
                                    </div>
                                  </td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div class="bulk-actions">
                <select>
                    <option>Bulk Actions</option>
                    <option>Activate Selected</option>
                    <option>Deactivate Selected</option>
                    <option>Delete Selected</option>
                </select>
                <button class="button button-primary">Apply</button>
            </div>
        </div>
    </div>

    <script>
        // Function to toggle action buttons visibility
        function updateActionButtons() {
            document.querySelectorAll('.user-checkbox').forEach(checkbox => {
                const userId = checkbox.getAttribute('data-userid');
                const actionButtons = document.querySelector(`[data-actions="${userId}"]`);
                
                if (actionButtons) {
                    if (checkbox.checked) {
                        actionButtons.classList.add('show');
                    } else {
                        actionButtons.classList.remove('show');
                    }
                }
            });
        }

        // Add event listeners to checkboxes
        document.querySelectorAll('.user-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', updateActionButtons);
        });

        // Handle "Select All" checkbox
        const selectAll = document.getElementById('selectAll');
        selectAll.addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.user-checkbox');
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAll.checked;
            });
            updateActionButtons();
        });

        // User action functions
        function editUser(userId) {
            console.log('Editing user:', userId);
            // Add your edit logic here
        }

        function deleteUser(userId) {
            console.log('Deleting user:', userId);
            // Add your delete logic here
        }
    </script>
</body>
</html>