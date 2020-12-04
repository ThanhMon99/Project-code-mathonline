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

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
	    
        <script>
    $(document).ready(function(){
        $.validator.addMethod("validatePassword", function (value, element) {
                return this.optional(element) || /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/.test(value);
            }, 'It must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters');

        $("#demoForm").validate({
            rules:{
                txtUsername:{
                    required: true,
                    minlength: 5,
                    maxlength: 20
                },
                txtFullname: {
                    required: true,
                    minlength: 5,
                    maxlength: 20
                },
//                txtPassword:{
//                    required: true,
//                    minlength: 6,
//                    maxlength: 15,
//                    validatePassword: true
//                },
                re_password:{
                    required: true,
                    equalTo: "#txtPassword"
                },
                txtEmail:{
                    required: true
                },
                Type:{
                   required: true 
                }                
            },
            messages:{
                txtUsername: {
                    required : "Enter your name here",
                    minlength: "Username has at least 5 characters",
                    maxlength: "Username has maxnimal 20 characters"
                },
                txtFullname: {
                    required : "Enter your name here",
                    minlength: "Username has at least 5 characters",
                    maxlength: "Username has maxnimal 20 characters"
                },
//                txtPassword:{
//                    required : "Enter your password here",
//                    minlength: "Password has at least 6 characters",
//                    maxlength: "Password has maxnimal 15 characters",
//                    validatePassword: "It must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters"
//                },
                re_password:{
                    required : "Enter your re_password here",
                    equalTo: "Not the same, enter againt"
                },
                txtEmail:{
                    required : "Enter your email here"
                },
                Type:{
                   required: "Select your Type" 
                }       
            },
                errorPlacement: function(error, element){
                error.insertAfter(element)}

        });
    });
 
</script>
<style>
    label{
        display: inline-block;
        width: 300px;
    }
    label.error{
        color: red;
        width: 300px;
        display: inline-block;
        margin-left: 10px;
    }
</style>
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
        <!-- register -->
        <form class="form-default" id="demoForm" action="#" method="post" >
            
            <div class="login-form">
                <!-- logo-register -->
                <div class="logo-login">
                    <a href="index.html"><img src="assets/img/logo/LogoMakr_8FYvDJ.png" alt=""></a>
                </div>
                <h2>Register Teacher Here</h2>
                 <div class="form-input">
                    <label for="txtUsername">User Name</label>
                    <input  type="text" name="txtUsername" placeholder="User name">
                </div>
                <div class="form-input">
                    <label for="txtFullname">Full Name</label>
                    <input  type="text" name="txtFullname" placeholder="Full name" id="txtFullname">
                </div>
                <div class="form-input">
                    <label for="txtPassword">Password</label>
                    <input type="password" name="txtPassword" placeholder="Password" id="txtPassword">
                </div>
                <div class="form-input">
                    <label for="re_password">Re-Password</label>
                    <input type="password" name="re_password" placeholder="re-password" id="re_password">
                </div>
                 <div class="form-input">
                    <label for="txtEmail">Email Address</label>
                    <input type="email" name="txtEmail" placeholder="ABC@gmail.com">
                </div>
                <div class="form-input">
                <label for="Type">Select Math type</label>
                <select name="Type" class="dropdown">
                    <option value="">Select...</option>
                    <option value="Primary">Primary</option>
                    <option value="Junior">Junior</option>
                    <option value="High">High</option>
                </select>
                </div>
                 <div class="form-input pt-30">
                    <input type="submit" name="submit" value="Register">
                </div>
        </form>
        <!-- /end register form -->
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
    <script src="./assets/js/jquery.validate.min.js"></script>
    </body>
</html>

<?php
if (!isset($_POST['txtUsername'])) {
    die('');
}

include('connect.php');
$type = $_POST['Type'];
$username = $_POST['txtUsername'];
$password = $_POST['txtPassword'];
$fullname = $_POST['txtFullname'];
//$role = $_POST['formRole'];

$Email = $_POST['txtEmail'];



$password = md5($password);

$stmt = $conn->prepare("SELECT username FROM account WHERE username='$username'");
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "<div class='alert alert-danger'><b>Username exist.</b></div>";
    exit;
}



//if (empty($role)) {
//    echo"You forgot to select the role!.";
//    exit;
//}


$stmt = $conn->prepare("INSERT INTO account (username,password,role,fullname,Email) VALUE ('{$username}','{$password}','Tutor','{$fullname}','{$Email}')");
$pdoResult = $stmt->execute();



if ($pdoResult) {
    echo "<div class='alert alert-success'><a href='login.php' ><b>Successfully</b></a></div>";
    
    $stmt1 = $conn->prepare("SELECT id FROM account WHERE username='$username'");
    $stmt1->execute();
    $result1 = $stmt1->fetch(PDO::FETCH_ASSOC);
    
     $iduser = $result1['id'];
    
    $stmt2 = $conn->prepare("INSERT INTO teacher (UserID, Rate, price, cata) VALUE ('{$iduser}','5','100','{$type}')");
    $pdoResult2 = $stmt2->execute();
    $URL = "http://localhost/ProjectTest/profile.php";
    echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
    echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
} else
    echo "<div class='alert alert-danger'><b>error. <a href='profile.php'>Back</a></b></div>";
?>