<?php
session_start();
include('connect.php');
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <?php require_once('assets/head_section.php') ?>  

    <body>
        <?php require_once('assets/navbar.php') ?>
        <main>
            <!--? slider Area Start-->
            <section class="slider-area ">
                <div class="slider-active">
                    <!-- Single Slider -->
                    <div class="single-slider slider-height d-flex align-items-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-6 col-lg-7 col-md-12">
                                    <div class="hero__caption">
                                        <h1 data-animation="fadeInLeft" data-delay="0.2s">Math online learning<br> platform</h1>
                                        <p data-animation="fadeInLeft" data-delay="0.4s">Build skills with courses, certificates, and degrees online from world-class universities and companies</p>
                                        <?php
                                        if (!isset($_SESSION['username'])) {
                                            ?>
                                            <a href="register.php" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.7s">Join for Free</a>
                                        <?php } ?>
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
                                <h2>Primary Math</h2>
                            </div>
                        </div>
                    </div>

                    <div class="courses-actives">
                        <!-- Single -->

                        <?php
                        
                        $query1 = "SELECT id, username, Description, UserID, rate, price, cata, Teacher_id FROM account, teacher  WHERE account.role = 'Tutor' and account.id = teacher.UserID  and teacher.cata = 'Primary'";
                        $statement1 = $conn->prepare($query1);

                        $statement1->execute();

                        $result1 = $statement1->fetchAll();
                        foreach ($result1 as $row) {
                            $id = $row['Teacher_id'];
                            ?>
                            <div class="properties pb-20">
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
                        <?php } ?>

                    </div>
                </div>
            </div>
            <hr  width="90%" align="center" />
            <!-- Courses area start -->
            <div class="courses-area section-padding40 fix">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8">
                            <div class="section-tittle text-center mb-55">
                                <h2>Junior Math</h2>
                            </div>
                        </div>
                    </div>

                    <div class="courses-actives">
                        <!-- Single -->

                        <?php
                   
                        $query2 = "SELECT id, username, Description, UserID, rate, price, cata, Teacher_id FROM account, teacher  WHERE account.role = 'Tutor' and account.id = teacher.UserID  and teacher.cata = 'Junior'";  
                        $statement2 = $conn->prepare($query2);

                        $statement2->execute();

                        $result2 = $statement2->fetchAll();
                        foreach ($result2 as $row) {
                            $id1 = $row['Teacher_id'];
                            ?>
                            <div class="properties pb-20">
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
                                        <a class="border-btn border-btn2" href="TeacherDetail.php?id=<?php echo $id1 ?>">Detail</a>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <hr  width="90%" align="center" />
            <!-- Courses area start -->
            <div class="courses-area section-padding40 fix">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8">
                            <div class="section-tittle text-center mb-55">
                                <h2>High Math</h2>
                            </div>
                        </div>
                    </div>

                    <div class="courses-actives">
                        <!-- Single -->

                        <?php
                    
                        $query3 = "SELECT id, username, Description, UserID, rate, price, cata, Teacher_id  FROM account, teacher WHERE account.role = 'Tutor' and account.id = teacher.UserID  and teacher.cata = 'High'";;
                        $statement3 = $conn->prepare($query3);

                        $statement3->execute();

                        $result3 = $statement3->fetchAll();
                        foreach ($result3 as $row) {
                            $id2 = $row['Teacher_id'];
                            ?>
                            <div class="properties pb-20">
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
                                         <a class="border-btn border-btn2" href="TeacherDetail.php?id=<?php echo $id2 ?>">Detail</a>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            
            <section class="about-area1 fix pt-10">
                <div class="support-wrapper align-items-center">
                    <div class="left-content1">
                        <div class="about-icon">
                            <img src="assets/img/icon/about.svg" alt="">
                        </div>
                        <!-- section tittle -->
                        <div class="section-tittle section-tittle2 mb-55">
                            <div class="front-text">
                                <h2 class="">Learn new skills online with top educators</h2>
                                <p>The automated process all your website tasks. Discover tools and 
                                    techniques to engage effectively with vulnerable children and young 
                                    people.</p>
                            </div>
                        </div>
                        <div class="single-features">
                            <div class="features-icon">
                                <img src="assets/img/icon/right-icon.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <p>Techniques to engage effectively with vulnerable children and young people.</p>
                            </div>
                        </div>
                        <div class="single-features">
                            <div class="features-icon">
                                <img src="assets/img/icon/right-icon.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <p>Join millions of people from around the world  learning together.</p>
                            </div>
                        </div>

                        <div class="single-features">
                            <div class="features-icon">
                                <img src="assets/img/icon/right-icon.svg" alt="">
                            </div>
                            <div class="features-caption">
                                <p>Join millions of people from around the world learning together. Online learning is as easy and natural.</p>
                            </div>
                        </div>
                    </div>
                    <div class="right-content1">
                        <!-- img -->
                        <div class="right-img">
                            <img src="assets/img/gallery/about.png" alt="">

                            <div class="video-icon" >
                                <a class="popup-video btn-icon" href="https://www.youtube.com/watch?v=up68UAfH0d0"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            </br></br>
            <!-- About Area End -->
        </main>

        <?php require_once('assets/footer.php') ?>
    </body>
</html>