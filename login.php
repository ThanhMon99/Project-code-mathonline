<?php
session_start();
?>
<?php
if (isset($_POST['txtUsername'])) {

    $username = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];

    include('connect.php');

    $stmt = $conn->prepare("SELECT id, username, password, fullname,role FROM account WHERE username='$username'");
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
        $_SESSION['msg'] = "<div class='alert alert-danger'><b>Username not exist. </b></div>";
        header('Location: login.php');
        exit;
    }



    $password = md5($password);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($password != $row['password']) {
        $_SESSION['msg'] = "<div class='alert alert-danger'><b>Wrong password. </b></div>";
        header('Location: login.php');
        exit;
    }
    $role = $row['role'];
    $id = $row['id'];
    $fullname = $row['fullname'];
    $_SESSION['role'] = $role;
    $_SESSION['username'] = $username;
    $_SESSION['id'] = $id;
    $_SESSION['fullname'] = $fullname;
    $statement = $conn->prepare("INSERT INTO login_details (user_id) VALUES ('{$id}')");
    $statement->execute();
//    $statement = $conn->prepare("INSERT INTO login_details (user_id) VALUES ('{$id}')");
//    $statement->execute();
//    $_SESSION['login_details_id'] = $conn->lastInsertId();
//      echo "<div class='alert alert-success'><b>Hello " . $username . ". You login successfully. <a href='index.php'>Continue</a></b></div>";
    if ($role == "Student") {
        header('Location: index.php');
        $st = $conn->prepare("SELECT * FROM student WHERE User_id ='$id'");
        $st->execute();
        $r = $st->fetch(PDO::FETCH_ASSOC);

        $stID = $r['Student_id'];
        $budget = $r['Budget'];
        $paysta = $r['payment_status'];

        $_SESSION['Student_id'] = $stID;
        $_SESSION['Budget'] = $budget;
        $_SESSION['payment_status'] = $paysta;
        $date = date('Y-m-d');
        $today = date('y-m-d');

        $oDate = strtotime($r['Time']);
        $sDate = date("y/m/d", $oDate);
        
        if($today == $sDate){
            $stm = $conn->prepare("Update from student set payment_status = '' where User_id ='$id'");
            $stm->execute();
        }
    }
    if ($role == "Staff") {
        header('Location: index_1.php');
    }
    if ($role == "Tutor") {
        $stmt1 = $conn->prepare("select * from teacher where UserID = $id");
        $stmt1->execute();
        $r = $stmt1->fetch(PDO::FETCH_ASSOC);
        $_SESSION['Teacher_id'] = $r['Teacher_id'];
        header('Location: index_1.php');
    }
    die();
}
?>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title> Welcome to online math</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="manifest" href="site.webmanifest">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

        <!-- CSS here -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/slicknav.css">
        <link rel="stylesheet" href="assets/css/flaticon.css">
        <link rel="stylesheet" href="assets/css/progressbar_barfiller.css">
        <link rel="stylesheet" href="assets/css/gijgo.css">
        <link rel="stylesheet" href="assets/css/animate.min.css">
        <link rel="stylesheet" href="assets/css/animated-headline.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/slick.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
        <!-- ? Preloader Start -->
        <div id="preloader-active">
            <div class="preloader d-flex align-items-center justify-content-center">
                <div class="preloader-inner position-relative">
                    <div class="preloader-circle"></div>
                    <div class="preloader-img pere-text">
                        <img src="assets/img/logo/loder.png" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Preloader Start-->


        <main class="login-body" data-vide-bg="assets/img/login-bg.mp4">
            <!-- Login Admin -->
            <form class="form-default" action="#" method="post">

                <div class="login-form">
                    <!-- logo-login -->
                    <div class="logo-login">
                        <a href="index.php"><img src="assets/img/logo/LogoMakr_8FYvDJ.png" alt=""></a>
                    </div>
                    <h2>Login Here</h2>
<?php
if (isset($_SESSION['msg'])) {
    echo $_SESSION['msg'];
}
?>
                    <div class="form-input">
                        <label for="name">Username</label>
                        <input  type="text" name="txtUsername" placeholder="Username">
                    </div>
                    <div class="form-input">
                        <label for="name">Password</label>
                        <input type="password" name="txtPassword" placeholder="Password">
                    </div>
                    <div class="form-input pt-30">
                        <input type="submit" name="submit" value="login">
                    </div>

                    <!-- Forget Password -->
                    <a href="#" class="forget">Forget Password</a>
                    <!-- Forget Password -->
                    <a href="register.php" class="registration">Registration</a>
                </div>
            </form>
            <!-- /end login form -->
        </main>


        <script src="./assets/js/vendor/modernizr-3.5.0.min.js"></script>
        <!-- Jquery, Popper, Bootstrap -->
        <script src="./assets/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
        <!-- Jquery Mobile Menu -->
        <script src="./assets/js/jquery.slicknav.min.js"></script>

        <!-- Video bg -->
        <script src="./assets/js/jquery.vide.js"></script>

        <!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="./assets/js/owl.carousel.min.js"></script>
        <script src="./assets/js/slick.min.js"></script>
        <!-- One Page, Animated-HeadLin -->
        <script src="./assets/js/wow.min.js"></script>
        <script src="./assets/js/animated.headline.js"></script>
        <script src="./assets/js/jquery.magnific-popup.js"></script>

        <!-- Date Picker -->
        <script src="./assets/js/gijgo.min.js"></script>
        <!-- Nice-select, sticky -->
        <script src="./assets/js/jquery.nice-select.min.js"></script>
        <script src="./assets/js/jquery.sticky.js"></script>
        <!-- Progress -->
        <script src="./assets/js/jquery.barfiller.js"></script>

        <!-- counter , waypoint,Hover Direction -->
        <script src="./assets/js/jquery.counterup.min.js"></script>
        <script src="./assets/js/waypoints.min.js"></script>
        <script src="./assets/js/jquery.countdown.min.js"></script>
        <script src="./assets/js/hover-direction-snake.min.js"></script>

        <!-- contact js -->
        <script src="./assets/js/contact.js"></script>
        <script src="./assets/js/jquery.form.js"></script>
        <script src="./assets/js/jquery.validate.min.js"></script>
        <script src="./assets/js/mail-script.js"></script>
        <script src="./assets/js/jquery.ajaxchimp.min.js"></script>

        <!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
        <script src="./assets/js/main.js"></script>

    </body>
</html>





