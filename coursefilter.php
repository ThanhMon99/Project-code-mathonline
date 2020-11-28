<?php

session_start();
include('connect.php');
$Type_id = -1;
if (isset($_GET["id"])) {
    $Type_id = intval($_GET['id']);
} else {
    echo 'error';
}
    if($Type_id == 1){
    $Type = "Primary Math";
    $statement1 = $conn->prepare("SELECT id, username, Description, UserID, rate, price, cata, Teacher_id FROM account, teacher  WHERE account.role = 'Tutor' and account.id = teacher.UserID  and teacher.cata = 'Primary'");
    }else if($Type_id == 2){
        $Type="Junior Math";
      $statement1 = $conn->prepare("SELECT id, username, Description, UserID, rate, price, cata, Teacher_id FROM account, teacher  WHERE account.role = 'Tutor' and account.id = teacher.UserID  and teacher.cata = 'Junior'");  
    }else if($Type_id == 3){
          $Type="High Math";
       $statement1 = $conn->prepare("SELECT id, username, Description, UserID, rate, price, cata, Teacher_id FROM account, teacher  WHERE account.role = 'Tutor' and account.id = teacher.UserID  and teacher.cata = 'High'"); 
    }
    $statement1->execute();
    $result1 = $statement1->fetchAll();


?>
<!doctype html>
<html class="no-js" lang="zxx">
    <?php require_once('assets/head_section.php') ?>  

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
                                        <h1 data-animation="bounceIn" data-delay="0.2s"><?php echo $Type; ?></h1>
                                        <!-- breadcrumb Start-->
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
  
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
            <!-- Courses area start -->
            <div class="courses-area section-padding40 fix">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8">
                            <div class="section-tittle text-center mb-55">
                                <h2>Search result</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php
                    
                        foreach ($result1 as $row) {
                            $id = $row['Teacher_id'];
                            ?>
                            <div class="col-lg-4">
                                <div class="properties properties2 mb-30">
                                    <div class="properties__card">
                                        <div class="properties__img overlay1">
                                            <a href="#"><img src="assets/img/gallery/featured1.png" alt=""></a>
                                        </div>
                                        <div class="properties__caption">                                        
                                            <h3><?php echo $row['username']; ?></h3>
                                            <p><?php echo $row['Description']; ?></p>
                                            <div class="properties__footer d-flex justify-content-between align-items-center">
                                                <div class="restaurant-name">
                                                    <div class="rating">
                                                        <?php
                                                        for ($index = 0; $index < $row['rate']; $index++) {
                                                            echo '<i class="fas fa-star"></i>';
                                                        }
                                                        ?>

                                                    </div>
                                                    <p><span><?php echo $row['rate']; ?></span> based on 120</p>
                                                </div>
                                                <div class="price">
                                                    <span>$<?php echo $row['price']; ?></span>
                                                </div>
                                            </div>
                                             <a class="border-btn border-btn2" href="TeacherDetail.php?id=<?php echo $id ?>">Detail</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                        
                    </div>
                </div>
                <!-- Courses area End -->

                <!-- ? services-area -->
                
            </main>
            <?php require_once('assets/footer.php') ?>

    </body>
</html>