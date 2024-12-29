<?php
// Include the Forum model to access the database functions
session_start();
require_once '../Models/Forum.php';
if (!isset($_SESSION['user_type'])) {
    $_SESSION['user_type'] = 'guest';
    header('Location: login.php');
    
    
}
$user_type = $_SESSION['user_type'];

// Handle form submission for new discussion
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $msg = $_POST['msg'];

    if ($name != "" && $msg != "") {
        new Forum(0, $name, $msg);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Please fill out all fields!";
    }
}

// Handle form submission for replies
if (isset($_POST['reply'])) {
    $commentid = $_POST['commentid'];
    $name = $_POST['Rname'];
    $msg = $_POST['Rmsg'];

    if ($name != "" && $msg != "") {
        new Forum($commentid, $name, $msg);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Please fill out all fields!";
    }
}

// Fetch all discussions and replies from the database
$discussions = Forum::getAllInstances();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Medira/Media/css/DiscussionForum.css">
    <link rel="stylesheet" href="/Medira/Media/css/styles.css">
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Favicon icon-->
    <link rel="shortcut icon" type="image/png" href="Medira/Views/assets/images/logos/favicon.png" />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <!-- Core Css -->
    <link rel="stylesheet" href="/Medira/Media/css/theme.css"" />
    <title>Spike TailwindCSS HTML Admin Template</title>
    <title>Community Forum</title>
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
        :root {
            --primary: #2563eb;
            --secondary: #64748b;
            --background: #f8fafc;
            --surface: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: var(--background);
            color: #1e293b;
            line-height: 1.5;
        } */

        /* Layout */
        .page-container {
            display: grid;
            grid-template-columns: 270px 1fr;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            background: var(--surface);
            padding: 1.5rem;
            border-right: 1px solid #e2e8f0;
            position: fixed;
            height: 100vh;
            width: 270px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary);
            margin-bottom: 2rem;
        }

        .nav-section {
            margin-bottom: 2rem;
        }

        .nav-header {
            font-size: 0.75rem;
            font-weight: bold;
            color: #94a3b8;
            margin: 1.5rem 0 0.5rem;
            text-transform: uppercase;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 0.5rem;
            margin: 0.25rem 0;
            border-radius: 0.5rem;
            color: #64748b;
            text-decoration: none;
            transition: all 0.2s;
        }

        .nav-item:hover {
            background: #f1f5f9;
            color: var(--primary);
        }

        .nav-item i {
            font-size: 1.5rem;
        }

        /* Content Area */
        .main-content {
            padding: 2rem;
            margin-left: 270px;
            width: calc(100% - 270px);
        }

        /* Forum Styles */
        .forum-container {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .forum-table {
            width: 100%;
            background-color: #edfafa;
            border-radius: 10px;
            border: 0;
        }

        .forum-table td {
            padding: 15px;
        }

        .avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .post-content {
            padding-left: 40px;
        }

        .reply-content {
            padding-left: 80px;
        }

        /* Footer Styles */
        .footer-area {
            background: #000;
            color: white;
            padding: 40px 0;
            margin-left: 270px;
        }

        .footer-top {
            padding: 40px 0;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
        }

        .logout-btn {
            position: absolute;
            bottom: 1.5rem;
            left: 1.5rem;
            right: 1.5rem;
            padding: 0.75rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 0.5rem;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.2s;
        }

        .logout-btn:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>
    
<div class="container">
    <div class="panel panel-default" style="margin-top:50px">
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table" id="MyTable" style="background-color: #edfafa; border:0px; border-radius:10px">
                    <tbody id="record">
                        <?php
                        foreach ($discussions as $discussion) {
                            if ($discussion['parent_comment'] == 0) {
                                echo '<tr><td><b><img src="../Media/images/avatar.jpg" width="30px" height="30px" />' . 
                                     $discussion['patient'] . '</b><br><p style="padding-left:80px">' . 
                                     $discussion['post'] . '</p></td></tr>';
                        
                                // Display replies to this discussion
                                foreach ($discussions as $reply) {
                                    if ($reply['parent_comment'] == $discussion['id']) {
                                        echo '<tr><td style="padding-left:80px"><b><img src="../Media/images/avatar.jpg" width="30px" height="30px" />' . 
                                             $reply['patient'] . '</b><br><p style="padding-left:40px">' . 
                                             $reply['post'] . '</p></td></tr>';
                                    }
                                }
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="footer-area section-bg" data-background="/Medira/Media/images/A_black_image.jpg">
        <div class="containers">
            <div class="footer-top footer-padding">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-3 col-lg-3 col-md-4 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-logo">
                                <a href="index.html"><img src="/Medira/Media/images/LOGO-footer.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-5">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-tittle">
                                <h4>About Us</h4>
                                <div class="footer-pera">
                                    <p class="info1">Helping healthcare professionals and patients access accurate medical information.</p>
                                    <p class="info1">See how our NLP-driven technology supports better clinical decision-making.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-8">
                        <div class="single-footer-caption mb-50">
                            <div class="footer-number mb-50">
                                <h4><span>+20 </span>115 648 226</h4>
                                <p>Medira @outlook.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="row d-flex justify-content-between align-items-center">
                    <div class="col-xl-9 col-lg-8">
                        <div class="footer-copy-right">
                            <p>Copyright &copy; 2024 Medira. All rights reserved.</p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4">
                        <div class="footer-social f-right">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fas fa-globe"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>