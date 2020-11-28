<?php
session_start();
include('connect.php');
include('checkLogin.php');
?>
<?php
$class_id = -1;
if (isset($_GET["id"])) {
    $class_id = intval($_GET['id']);
} else {
    echo 'error';
}
$stmt = $conn->prepare("select * from Class where Class_id = $class_id");
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

$Teacher_id = $result['Teacher_id'];

$query1 = "SELECT username, Teacher_id FROM account, teacher  WHERE account.id = teacher.UserID and teacher.Teacher_id = $Teacher_id";
$statement = $conn->prepare($query1);

$statement->execute();

$result1 = $statement->fetch(PDO::FETCH_ASSOC);

$_SESSION['Class_id'] = $class_id;
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
                                        <h1 data-animation="bounceIn" data-delay="0.2s">Courses By <?php echo $result1['username']; ?></h1>
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
            <!--? Blog Area Start -->
            <section class="blog_area single-post-area section-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 posts-list">

                            <div class="single-post">
                                <div class="feature-img">
                                    <img class="img-fluid" src="assets/img/blog/single_blog_1.png" alt="">
                                </div>
                                <div class="blog_details">
                                    <h2 style="color: #2d2d2d;"><?php echo $result['title']; ?></h2>
                                    <ul class="blog-info-link mt-3 mb-4">
                                        <li><a href="#"><i class="fa fa-user"></i><?php echo $result1['username']; ?></a></li>
                                        <li><a href="#"><i class="fa fa-comments"></i> Create Date : <?php echo $result['time']; ?></a></li>
                                    </ul>
                                    <p class="excert">
                                        <?php echo $result['content']; ?>
                                    </p>
                                    <h3>Video for this class: </h3></br>
                                    <?php
                                    $stmt2 = $conn->prepare("select * from video_upload where Class_id = $class_id");
                                    $stmt2->execute();
                                    $result3 = $stmt2->fetchAll();
                                    foreach ($result3 as $row2) {
                                        ?>
                                        <video width="500" height="500" controls>
                                            <source src="<?php echo $row2['videoUrl']; ?>" type="video/mp4">
                                            <source src="<?php echo $row2['videoUrl']; ?>" type="video/mp3">
                                            <source src="<?php echo $row2['videoUrl']; ?>" type="video/wma">
                                            Your browser does not support the video tag.
                                        </video>

                                        <?php
                                    }
                                    ?>
                                    <hr>
                                    <h3>File for this class: </h3></br>
                                    <?php
                                    $stmt1 = $conn->prepare("select * from upload_file where Class_id = $class_id");
                                    $stmt1->execute();
                                    $result2 = $stmt1->fetchAll();
                                    foreach ($result2 as $row1) {
                                        if ($row1['type'] == 'image') {
                                            ?>
                                            <a href="download.php?file_id=<?php echo $row1['upload_id'] ?>"><img src="<?php echo $row1['fileUrl']; ?>" alt="" width="500" height="300"/></a>

                                            </br>
                                            <?php
                                        } else {
                                            ?>
                                            <a href="download.php?file_id=<?php echo $row1['upload_id'] ?>"><p><?php echo $row1['fileName']; ?></p></a>
                                            </br>

                                            <?php
                                        }
                                    }
                                    ?>

                                </div>
                            </div>

                            <!--      <div class="blog-author">
                                     <div class="media align-items-center">
                                        <img src="assets/img/blog/author.png" alt="">
                                        <div class="media-body">
                                           <a href="#">
                                              <h4>Harvard milan</h4>
                                           </a>
                                           <p>Second divided from form fish beast made. Every of seas all gathered use saying you're, he
                                           our dominion twon Second divided from</p>
                                        </div>
                                     </div>
                                  </div>-->
                            <div class="comments-area">
                                <h4>Comments</h4>
                                </form>
                                <span id="comment_message"></span>
                                <br />
                                <div id="display_comment"></div>
                                </br></br></br>
                                <div class="comment-form">
                                <h4>Leave your comment</h4>
                                
                                    <form method="POST" id="comment_form">
                                        <div class="form-group">
                                            <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="comment_id" id="comment_id" value="0" />
                                            <input type="submit" name="submit" id="submit" class="button button-contactForm btn_1 boxed-btn" value="Post Comment" />
                                        </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="blog_right_sidebar">
                                <aside class="single_sidebar_widget post_category_widget">
                                    <h4 class="widget_title" style="color: #2d2d2d;">Category</h4>
                                    <ul class="list cat-list">
                                        <li>
                                            <a href="coursefilter.php?id=1" class="d-flex">
                                                <p>Primary Math</p>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="coursefilter.php?id=2" class="d-flex">
                                                <p>Junior Math</p>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="coursefilter.php?id=3" class="d-flex">
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
<script>
    $(document).ready(function () {

        $('#comment_form').on('submit', function (event) {
            event.preventDefault();
            var form_data = $(this).serialize();
            $.ajax({
                url: "add_comment.php?id=<?php echo $class_id; ?>",
                method: "POST",
                data: form_data,
                dataType: "JSON",
                success: function (data)
                {
                    if (data.error != '')
                    {
                        $('#comment_form')[0].reset();
                        $('#comment_message').html(data.error);
                        $('#comment_id').val('0');
                        load_comment();
                    }
                }
            })
        });

        load_comment();

        function load_comment()
        {
            $.ajax({
                url: "fetch_comment.php?id=<?php echo $class_id; ?>",
                method: "POST",
                success: function (data)
                {
                    $('#display_comment').html(data);
                }
            })
        }
    });
</script>