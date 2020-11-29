<?php
session_start();
include('connect.php');
include('checkLogin.php');
?>
<?php
$class_id = $_SESSION['Class_id'];
?>
<html lang="en"> 
    <?php require_once('Form/head_section.php') ?>  
    <body>  
        <?php require_once('Form/navbar.php') ?>
        <?php require_once('Form/side_bar.php') ?>
        <div class="container">
            <br />
            <div class="table-responsive">
                <h4 align="center">Upload</h4>
            </div>
            <br />
            <form method="post" action="file_upload.php" enctype="multipart/form-data">
                <div class="panel panel-default">
                    <div class="panel-heading">Selecting</div>
                    <div class="panel-body">

                        <div class="form-group" id ="mainselection">
                            <label>File :</label>
                            <input type="file" name="files[]" multiple  size="60" style="width:300px" class="btn btn-info">                

                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-info" value="Upload" name="submit">

                        </div>

                    </div>
                </div>
            </form>
        </div>

    </body> 

</html>

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

    // Configure upload directory and allowed file types 
    $upload_dir = 'uploads' . DIRECTORY_SEPARATOR;

    $i = 0;
    $types = array('jpg', 'png', 'jpeg', 'gif');
    $types1 = array("mp3", "mp4", "wma");

    if (isset($_FILES['files'])) {
        foreach ($_FILES['files']['tmp_name'] as $key => $value) {

            $file_tmpname = $_FILES['files']['tmp_name'][$key];
            $file_name = $_FILES['files']['name'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
            if (!in_array(strtolower($file_ext), $types1)) {
                if (in_array(strtolower($file_ext), $types)) {
                    $type = 'image';
                } else {
                    $type = 'file';
                }
                // Set upload file path 
                $filepath = $upload_dir . $file_name;
                $url = 'uploads/' . $file_name;
                $fileName = $file_name;
                $stmt = $conn->prepare("INSERT INTO upload_file (fileName, fileUrl, Class_id,type) VALUE ('{$fileName}','{$url}','{$class_id}','{$type}')");
                $pdoResult = $stmt->execute();
                if (move_uploaded_file($file_tmpname, $filepath) && $pdoResult) {
                    echo "<div class='alert alert-success'><b>{$file_name} successfully uploaded</b> <br /></div>";
                } else {
                    echo "<div class='alert alert-danger'><b>Error uploading {$file_name}</b> <br /></div>";

                    $i = 1;
                }
            } else {
                echo 'Please choose correct file';
                $i = 1;
            }
        }
        if ($i == 0) {
            $back = "displayClass.php?id={$class_id}";
            echo "<script type='text/javascript'>alert('Uploaded');</script>";
            echo "<div class='alert alert-success'><b>All file has been uploaded</b><a href='{$back}'><b>Back</b></a><br /></div>";
        } else {
            echo "<div class='alert alert-danger'><b>Error uploading please upload againt</b> <br /></div>";
        }
    }
}
?> 