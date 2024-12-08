



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - User Management</title>
    <link rel="stylesheet" href="/Media/css/Admin.css">
    <link rel="stylesheet" href="Media/css/NavBar.css">
    <link rel="stylesheet" href="/Medira/Media/css/NavBar.css">
  <link rel="stylesheet" href="/Medira/Media/css/Styles.css">
 
  <link rel="stylesheet" href="/Medira/Media/css/Styles.css">
   
</head>
<body>
     
<div id="navbar">
  <?php include "Adminnav.php"; ?>
  </div>
   
<link rel="stylesheet" href="/css/Admin.css">
<!-- <link rel="stylesheet" href="/css/Styles.css"> -->
  <title>Medira</title>
</head>
<body>
  

  <div class="image-container">
    <!-- <img src="/images/pexels-pixabay-40568.jpg" alt="Beautiful scenery"> -->
    
    
    <div class="button_Admin">
        <button onclick="openAddUserModal()">Add New Admin</button>
    </div>

    <table class="add-admin">
        

        <thead>
            
           
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>JohnDoe</td>
                <td>john@example.com</td>
                <td>Patient</td>
                <td class="actions">
                    <button onclick="editUser()">Edit</button>
                    <button class="delete" onclick="deleteUser()">Delete</button>
                </td>
            </tr>
            <tr>
                <td>Ramez</td>
                <td>ramez@Miuegypt.com</td>
                <td>Patient</td>
                <td class="actions">
                    <button onclick="editUser()">Edit</button>
                    <button class="delete" onclick="deleteUser()">Delete</button>
                </td>
            </tr>
            <tr>
                <td>mazenamir</td>
                <td>mazen@miu.com</td>
                <td>Healthcare Provider</td>
                <td class="actions">
                    <button onclick="editUser()">Edit</button>
                    <button class="delete" onclick="deleteUser()">Delete</button>
                </td>
            </tr>
            <tr>
                <td>JaneSmith</td>
                <td>jane@example.com</td>
                <td>Healthcare Provider</td>
                <td class="actions">
                    <button onclick="editUser()">Edit</button>
                    <button class="delete" onclick="deleteUser()">Delete</button>
                </td>
            </tr>
        </tbody>
    </table>

    <!-- Add User Modal (Hidden Initially) -->
    <div id="addUserModal" class="modal" style="display: none;">
        <h3>Add New User</h3>
        <form>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email"><br><br>

            <label for="role">Role:</label>
            <select id="role" name="role">
                <option value="healthcare_provider">Healthcare Provider</option>
                <option value="patient">Patient</option>
            </select><br><br>

            <button type="submit">Add User</button>
            <button type="button" onclick="closeAddUserModal()">Cancel</button>
        </form>
    </div>
</main>

<script src="js/Admin.js"></script>
  </div>
  <!-- <footer>
    <div class="footer-content">
      <h3><img src="./images/LOGO.png" alt="Medira Logo" class="footer-logo"></h3> 
      <nav>
        <ul>
         
      </nav>
      <p>&copy; 2024 Medira. All rights reserved. </p>Empowering healthcare professionals and patients with reliable medical information.
    </div>
  </footer> -->
</body>
</html>
