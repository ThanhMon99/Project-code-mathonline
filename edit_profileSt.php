<?php
session_start();
include('connect.php');
include('checkLogin.php');
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <?php require_once('assets/head_section.php') ?>  
    <style>
.f
{
   margin-left: 15%;
    margin-right:15%;
    width: 70%;
}

    </style>
    <body>
        <?php require_once('assets/navbar.php') ?>
        <main>
            <!--? slider Area Start-->
            <section class="slider-area slider-area2">
                <div class="slider-active">
                    <!-- Single Slider -->
                    <div class="single-slider slider-height2">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-8 col-lg-11 col-md-12">
                                    <div class="hero__caption hero__caption2">
                                        <h1 data-animation="bounceIn" data-delay="0.2s">Edit Profile</h1>
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
                <div class="table-responsive">
                    <h1 align="center">Edit your profile</h1>
                </div>
                <br />
                <?php
                $id = $_SESSION['id'];
                $stmt = $conn->prepare("SELECT * FROM account WHERE id ='$id'");
                $stmt->execute();
                $r = $stmt->fetch(PDO::FETCH_ASSOC);
                ?>
              
                <form method="post" class="f">
                    <!--          <div class="form-group">
                                    <label class="col-lg-2 control-label"> Avatar</label>
                                    <div class="col-lg-6">
                                        <input type="file" name="files" value="">
                                    </div>
                                </div>-->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Date of birth</label>
                        <div class="col-lg-6">
                            <input type="date" name="date" class="form-control" value="<?php echo $r['Dob']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Full Name</label>
                        <div class="col-lg-6">
                            <input type="text" name="fullname" class="form-control"  value="<?php echo $r['fullname']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-6">
                            <input type="text" name="email" class="form-control"  value="<?php echo $r['Email']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Lives In</label>
                        <div class="col-lg-6">
                            <input type="text" name="address" class="form-control" value="<?php echo $r['Address']; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Description</label>
                        <div class="col-lg-10">
                            <textarea rows="10" cols="20" class="form-control" name="description" ><?php echo $r['Description']; ?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-2 col-lg-10">
                            <input type="submit" class="btn btn-theme" value="Update" name="submit"/>
                        </div>
                    </div>
                </form>
                <?php
                if (isset($_POST['submit'])) {

                    $dob = $_POST['date'];
                    $mail = $_POST['email'];
                    $add = $_POST['address'];
                    $name = $_POST['fullname'];
                    $des = $_POST['description'];

                    $stmt = $conn->prepare("UPDATE account  SET Dob = '$dob',Email = '$mail',Address = '$add',fullname = '$name',Description= '$des' where id = '$id'");
                    $pdoResult = $stmt->execute();
                    
                    if ($pdoResult) {
                        echo "<div class='alert alert-success'><a href= 'profileSt.php'><b>Successfully   </b></a></div>";
                        //        $URL = "http://localhost/ASMtest/profile.php";
                        //            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                        //            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                    } else
                        echo "<div class='alert alert-danger'><b>error. <a href='profileSt.php'>Back</a></b></div>";
                }
                ?>
            </section>
        </main>
        <?php require_once('assets/footer.php') ?>
    </body>
</html>
