<?php
session_start();
include('connect.php');
include('checkLogin.php');


?>
<!doctype html>
<html class="no-js" lang="zxx">
    <?php require_once('assets/head_section.php') ?>  
    <style>
        .f{
             margin-left: 15%;
    margin-right:15%;
    width: 70%;
        }
    </style>
    <body>
        <?php require_once('assets/navbar.php') ?>
        <main>
            <section class="slider-area slider-area2">
                <div class="slider-active">
                    <!-- Single Slider -->
                    <div class="single-slider slider-height2">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-8 col-lg-11 col-md-12">
                                    <div class="hero__caption hero__caption2">
                                        <h1 data-animation="bounceIn" data-delay="0.2s">Profile</h1>
                                        <!-- breadcrumb Start-->
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                                <li class="breadcrumb-item"><a href="Course.php">Course</a></li> 
                                            </ol>
                                        </nav>
                                        <!-- breadcrumb End -->
                                    </div>
                                </div>
                            </div>
                        </div>          
                    </div>
                </div>
            </section>
             <section class="blog_area section-padding">
        <div>
            <?php 
                $id = $_SESSION['id'];
$stmt = $conn->prepare("SELECT * FROM account WHERE id ='$id'");
$stmt->execute();
$r = $stmt->fetch(PDO::FETCH_ASSOC);
$date = $r['Dob'];
$dob = date('j F, Y', strtotime($date));
            ?>
            <div class="f">
            <h2 align="left">General Info</h2>
            <hr  width="45%" align="left" />
            <ul align="left" style="font-size: 20px">
                <li><span>Full Name: </span><?php echo $r['fullname']; ?></li>
                <li><span>Date of Birth: </span><?php echo $dob; ?></li>
                <li><span>Address: </span><?php echo $r['Address']; ?></li>
                <li><span>E-mail: </span><?php echo $r['Email']; ?></li>
                <li><span>Description: </span><?php echo $r['Description']; ?></li>
            </ul>
            <hr  width="45%" align="left" />
            <button class="btn btn-info"><a href='edit_profileSt.php'>Edit your's profile</a></button>

        </div>
        </div>
             </section>
            </br>  </br>  </br>  
        </main>
        <?php require_once('assets/footer.php') ?>
    </body>
</html>