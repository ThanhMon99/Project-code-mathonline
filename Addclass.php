<?php
session_start();
include('connect.php');
include('checkLogin.php');
?>
<html lang="en"> 
    <?php require_once('Form/head_section.php') ?>  
    <body>  
        <?php require_once('Form/navbar.php') ?>
        <?php require_once('Form/side_bar.php') ?>
        <div class="container">
            <br />
            <div class="table-responsive">
                <h4 align="center">CLASS</h4>
            </div>
            <br />
            <form method="post" action="Addclass.php" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">New Class</div>
                    <div class="panel-body">
                        <div class="form-group" id ="mainselection">
                            <label>Title :</label>
                            <input type="text" id="title" name="title" class="form-control" />
                        </div>
                        <div class="form-group" id ="mainselection">
                            <label>Content :</label>
                            <textarea name="content" id="content" rows="10" cols="150"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="Create" name="submit">

                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>
</section>
</section>
</body> 

</html>
<script>
    CKEDITOR.replace('content');
</script>

<script class="include" type="text/javascript" src="Form/lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="Form/lib/jquery.scrollTo.min.js"></script>
<script src="Form/lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="Form/lib/jquery.sparkline.js"></script>
<!--common script for all pages-->
<script src="Form/lib/common-scripts.js"></script>
<script type="text/javascript" src="Form/lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="Form/lib/gritter-conf.js"></script>
<?php
// Check if form was submited 
if (isset($_POST['submit'])) {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $id = $_SESSION["Teacher_id"];

    $stmt1 = $conn->prepare("INSERT INTO class(title, content, Teacher_id, time ) VALUES ( '$title', '$content', '$id' ,now())");
            $pdoResult = $stmt1->execute();
            if($pdoResult){
                echo "Class has been created";
            $URL = "http://localhost/ProjectTest/showClass.php";
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
 
}
}
?> 