<?php
session_start();
// Include the Forum model to access the database functions
require_once '../Models/Forum.php';
if (!isset($_SESSION['user_type'])) {
    $_SESSION['user_type'] = 'guest';
    header('Location: login.php'); // Redirect to the login page
    exit();
  }
  $user_type = $_SESSION['user_type'];
// Handle form submission for new discussion
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $msg = $_POST['msg'];

    if ($name != "" && $msg != "") {
        // Create a new forum post (with parent_comment = 0 for main discussions)
        new Forum(0, $name, $msg);  // parent_comment = 0 for main comments
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Please fill out all fields!";
    }
}

// Handle form submission for replies
if (isset($_POST['reply'])) {
    $commentid = $_POST['commentid'];  // Get the ID of the parent comment
    $name = $_POST['Rname'];
    $msg = $_POST['Rmsg'];

    if ($name != "" && $msg != "") {
        // Create a new reply (with parent_comment = commentid)
        new Forum($commentid, $name, $msg);  // Use the ID of the comment being replied to
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
    <link rel="icon" href="./images/favicon.png" type="image/png" sizes="16x16">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/Medira/Media/css/NavBar.css">
    <link rel="stylesheet" href="/Medira/Media/css/DiscussionForum.css">
    <link rel="stylesheet" href="/Medira/Media/css/styles.css">
    <title>Community Forum</title>
</head>
<body>
 <!-- Navbar -->
 <div id="navbar">
    <?php include "NavBar.php"; ?>
  </div>
<div class="container">

    <div class="panel panel-default" style="margin-top:50px">
        <div class="panel-body">
            <h3>Community Forum</h3>
            <hr>
            <!-- Form for creating new discussion -->
            <form method="POST">
                <input type="hidden" name="Pcommentid" value="0">
                <div class="form-group">
                    <label for="name">Write your name:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                    <label for="msg">Write your question:</label>
                    <textarea class="form-control" rows="5" name="msg" required></textarea>
                </div>
                <input type="submit" name="save" class="btn btn-primary" value="Send">
            </form>
        </div>
    </div>

    <div class="panel panel-default">
        <div class="panel-body">
            <h4>Recent Questions</h4>
            <table class="table" id="MyTable" style="background-color: #edfafa; border:0px; border-radius:10px">
                <tbody id="record">
                    <?php
                    // Display all discussions and their replies
                    foreach ($discussions as $discussion) {
                        if ($discussion['parent_comment'] == 0) {
                            // Start the discussion display
                            echo '<tr><td><b><img src="../Media/images/avatar.jpg" width="30px" height="30px" />' . 
                                 $discussion['patient'] . '</b><br><p style="padding-left:80px">' . 
                                 $discussion['post'] . '<br>';
                            
                            // Conditionally display the Reply link
                            if ($user_type == "healthCare") {
                                echo '<a data-toggle="modal" data-id="' . $discussion['id'] . 
                                     '" class="open-ReplyModal" href="#ReplyModal">Reply</a>';
                            }
                            
                            echo '</p></td></tr>';
                    
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

<!-- Modal for replying to a discussion -->
<div id="ReplyModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Reply to Question</h4>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="hidden" id="commentid" name="commentid">
                    <div class="form-group">
                        <label for="Rname"> Your name:</label>
                        <input type="text" class="form-control" name="Rname" value="HealthCare Provider" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="Rmsg">Write your reply:</label>
                        <textarea class="form-control" rows="5" name="Rmsg" required></textarea>
                    </div>
                    <input type="submit" name="reply" class="btn btn-primary" value="Reply">
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Add this JavaScript to handle setting the comment ID dynamically -->
<script type="text/javascript">
    $(document).ready(function() {
        // When the reply button is clicked
        $(".open-ReplyModal").click(function() {
            var commentid = $(this).data('id');  // Get the comment ID from the "data-id" attribute
            $("#commentid").val(commentid);      // Set the value of the hidden input field in the modal
        });
    });
</script>
<footer>
    <!-- Footer Start -->
<div class="footer-area section-bg" data-background="/Medira/Media/images/A_black_image.jpg">
    <div class="containers">
        <div class="footer-top footer-padding">
            <div class="row d-flex justify-content-between">
                <!-- Logo Section -->
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-8">
                    <div class="single-footer-caption mb-50">
                        <!-- logo -->
                        <div class="footer-logo">
                            <a href="index.html"><img src="/Medira/Media/images/LOGO-footer.png" alt=""></a>
                        </div>
                    </div>
                </div>

                <!-- About Us Section -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-sm-5">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-tittle">
                            <h4>About Us</h4>
                            <div class="footer-pera">
                                <p class="info1">
                                Helping healthcare professionals and patients access accurate medical information.</p>
                                <p class="info1">See how our NLP-driven technology supports better clinical decision-making.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Phone Number and Email Section -->
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-8">
                    <div class="single-footer-caption mb-50">
                        <div class="footer-number-mb-50">
                            <h4><span>+20 </span>115 648 226</h4>
                            <p>Medira @outlook.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer Bottom -->
        <div class="footer-bottom">
            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-xl-9 col-lg-8">
                    <div class="footer-copy-right">
                        <p>
                            Copyright &copy; 2024 Medira. All rights reserved. Empowering healthcare professionals and patients with reliable
                            medical information.
                        </p>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4">
                    <!-- Footer Social -->
                    <div class="footer-social f-right">
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fas fa-globe"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End-->

</footer>
</body>
</html>
