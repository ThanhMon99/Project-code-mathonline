<?php
session_start();
require_once("connect.php");
include('checkLogin.php');
?>
<?php
$class_id = -1;
if (isset($_GET["id"])) {
    $class_id = intval($_GET['id']);
} else {
    echo 'error';
}
$_SESSION['Class_id'] = $class_id;
$stmt = $conn->prepare("select * from Class where Class_id = $class_id");
$stmt->execute();
$result = $stmt->fetchAll();



?>
<html lang="en"> 
    <?php require_once('Form/head_section.php') ?>  
    <body>
        <?php require_once('Form/navbar.php') ?>
        <?php require_once('Form/side_bar.php') ?>
        <br />
        <h2 align="center">POST DETAIL</h2>
        <br />
        <div class="table-responsive">
            <p align="center"><button class="btn btn-info"><a href='showClass.php'>Back</a></button></p>
            <p align="center"><button class="btn btn-info"><a href='file_upload.php'>Add new file</a></button></p>
            <p align="center"><button class="btn btn-info"><a href='video_upload.php'>Add new video</a></button></p>
            <p align="center"><button class="btn btn-info"><a href='editclass.php'>Change Title and content</a></button></p>
        </div>
        <hr  width="90%" align="center" />
        <div class="container">
            <div class="innertube">
                <?php
                foreach ($result as $row) {
                    $stmt1 = $conn->prepare("select * from upload_file where Class_id = $class_id");
                    $stmt1->execute();
                    $result1 = $stmt1->fetchAll();
                    ?>
                    <h1><?php echo $row['title']; ?></h1></div></br>
                <i> Create Date : <?php echo $row['time']; ?></i>
                <hr  width="30%"  align="left" />
                <p><?php echo $row['content']; ?></p>
                <hr  width="30%"  align="left" />
                <h4>#File Upload :</h4>
                <table class='table'>
                    <thead>
                    <th>
                         Item   
                    </th>
                    <th>
                        Delete
                    </th>
                    </thead>
                   
                <?php
                foreach ($result1 as $row1) {
                    if ($row1['type'] == 'image') {
                        ?>
                    <tr>
                        <td>
                        <a href="download.php?file_id=<?php echo $row1['upload_id'] ?>"><img src="<?php echo $row1['fileUrl']; ?>" alt="" width="300" height="300"/></a>
                      </td>
                        <td>
                    <button  class="btn btn-info"><a href="deletefile.php?id=<?php echo $row1['upload_id'] ?>" onclick="confirm('Want to delete?'); ">Delete</a></button>
                     </td>
        </tr>
            <?php
        } else {
            ?>
                 
                    <tr>
                        <td>
                        <a href="download.php?file_id=<?php echo $row1['upload_id'] ?>"><p style="display: inline-block;"><?php echo $row1['fileName']; ?></p></a>
                        </td>
                        <td>
                       <button  class="btn btn-info"> <a href="deletefile.php?id=<?php echo $row1['upload_id'] ?>" onclick="confirm('Want to delete?'); ">Delete</a></button>
                                     </td>
        </tr>

        <?php
        }
    }
    echo '</table>';
    echo '<h4>#Video Upload :</h4>'
    . ' <table class="table">
                    <thead>
                    <th>
                         Item   
                    </th>
                    <th>
                        Delete
                    </th>
                    </thead>';
    $stmt2 = $conn->prepare("select * from video_upload where Class_id = $class_id");
    $stmt2->execute();
    $result2 = $stmt2->fetchAll();
    foreach ($result2 as $row2) {
        ?> 
        <tr>
                        <td>
                    <video width="320" height="240" controls>
                        <source src="<?php echo $row2['videoUrl']; ?>" type="video/mp4">
                        <source src="<?php echo $row2['videoUrl']; ?>" type="video/mp3">
                        <source src="<?php echo $row2['videoUrl']; ?>" type="video/wma">
                        Your browser does not support the video tag.
                    </video>
                        </td>
                        <td>
                        <button  class="btn btn-info"><a href="deletevideo.php?id=<?php echo $row2['video_id'] ?>" onclick="confirm('Want to delete?'); ">Delete</a></button>
                        </td>
        </tr>
                <?php }
            } ?>
                </table>
            </br>
            <form method="POST" id="comment_form">
                <div class="form-group">
                    <textarea name="comment_content" id="comment_content" class="form-control" placeholder="Enter Comment" rows="5"></textarea>
                </div>
                <div class="form-group">
                    <input type="hidden" name="comment_id" id="comment_id" value="0" />
                    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                </div>
            </form>
            <span id="comment_message"></span>
            <br />
            <div id="display_comment"></div>
        </div>
    </section>
</section>
</section>
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
<script class="include" type="text/javascript" src="Form/lib/jquery.dcjqaccordion.2.7.js"></script>
<script src="Form/lib/jquery.scrollTo.min.js"></script>
<script src="Form/lib/jquery.nicescroll.js" type="text/javascript"></script>
<script src="Form/lib/jquery.sparkline.js"></script>
<!--common script for all pages-->
<script src="Form/lib/common-scripts.js"></script>
<script type="text/javascript" src="Form/lib/gritter/js/jquery.gritter.js"></script>
<script type="text/javascript" src="Form/lib/gritter-conf.js"></script>






