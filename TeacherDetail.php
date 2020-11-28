<?php
session_start();
include('connect.php');
include('checkLogin.php');
?>
<?php
$Teacher_id = -1;
if (isset($_GET["id"])) {
    $Teacher_id = intval($_GET['id']);
} else {
    echo 'error';
}

$stmt = $conn->prepare("select * from Class where Teacher_id = $Teacher_id");
$stmt->execute();
$result = $stmt->fetchAll();

$query1 = "SELECT username, Teacher_id FROM account, teacher  WHERE account.id = teacher.UserID and teacher.Teacher_id = $Teacher_id";
$statement1 = $conn->prepare($query1);

$statement1->execute();

$result1 = $statement1->fetch(PDO::FETCH_ASSOC);
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
                                        <h1 data-animation="bounceIn" data-delay="0.2s">Courses Detail By <?php echo $result1['username']; ?></h1>
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
            <!--? Blog Area Start-->
            <section class="blog_area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 mb-5 mb-lg-0">
                        <?php
                        if($result){
                        foreach ($result as $row) {
                            $id = $row["Class_id"];
                            ?>
                            
                                <div class="blog_left_sidebar">

                                    <article class="blog_item">
                                        <div class="blog_item_img">
                                            <img class="card-img rounded-0" src="assets/img/blog/2019_03_02_66706_1551461528._large.jpg" alt="">
                                            <a href="#" class="blog_item_date">
                                                <h3><?php echo $row['time']; ?></h3>
                                            </a>
                                        </div>
                                        <div class="blog_details">
                                            
                                                <?php if($r['payment_status'] == '') {?>
                                                <a class="d-inline-block" href="UnlockForStudy.php" onclick="return comfirm('You must pay for study!')">
                                                <?php }else{ ?>
                                                    <a class="d-inline-block" href="classdetail.php?id=<?php echo $id ?>">
                                                <?php } ?>
                                                <h2 class="blog-head" style="color: #2d2d2d;"><?php echo $row['title']; ?></h2>
                                            </a>
                                            <p><?php echo $row['content']; ?></p>
                                        </div>
                                    </article>

                                </div>
                            
                        <?php }} else{ ?>
                            <div class="blog_left_sidebar">
                            <h1>There are no class for this teacher</h1>
                            </div>
                        <?php } ?>
                            </div>
                        <div class="col-lg-4">
                            <div class="blog_right_sidebar">
                                <aside class="single_sidebar_widget post_category_widget">
                                    <h4 class="widget_title" style="color: #2d2d2d;">Category</h4>
                                    <ul class="list cat-list">
                                        <li>
                                            <a href="#" class="d-flex">
                                                <p>Primary Math</p>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex">
                                                <p>Junior Math</p>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="d-flex">
                                                <p>High Math</p>

                                            </a>
                                        </li>

                                    </ul>
                                </aside>
                                <?php
//                                $query1 = "SELECT id, username, Description, UserID, rate, price, cata FROM account, teacher  WHERE account.role = 'Tutor' and account.id = teacher.UserID";
//                                $statement1 = $conn->prepare($query1);
//
//                                $statement1->execute();
//
//                                $result1 = $statement1->fetchAll();
//                                foreach ($result1 as $row) {
                                ?>
                                <aside class="single_sidebar_widget popular_post_widget">
                                    <h3 class="widget_title" style="color: #2d2d2d;">Some Teacher</h3>
                                    <!--                                <div class="media post_item">
                                                                        <img src="assets/img/post/post_1.png" alt="post">
                                                                        <div class="media-body">
                                                                            <a href="blog_details.html">
                                                                                <h3 style="color: #2d2d2d;">From life was you fish...</h3>
                                                                            </a>
                                                                          
                                                                        </div>
                                                                    </div>-->

                                </aside>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Blog Area End -->
        </main>
        <?php require_once('assets/footer.php') ?>

    </body>
</html>