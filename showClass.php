<?php
session_start();
include('connect.php');
include('checkLogin.php');
    $userid = $_SESSION['id'];
    $stmt = $conn->prepare("select * from class Where Teacher_id = '".$_SESSION['Teacher_id']."' ");
    $stmt->execute();
    $result = $stmt->fetchAll();
    
?>
<html lang="en"> 
    <?php require_once('Form/head_section.php') ?>  
    <body>  
          <?php require_once('Form/navbar.php') ?>
        <?php require_once('Form/side_bar.php') ?>
        <div class="container">
            <br />
            <div class="table-responsive" align="center">
                <h1>Post</h1>
                <?php 
                if ($_SESSION['role'] != 'Staff'){
                ?>
                <button class="btn btn-info"><a href='Addclass.php'>Add new class</a></button>
                <?php } ?>
            </div>
            <div class="innertube">
                    <hr  width="90%" align="center" />
                        <?php
                        if ($stmt->rowCount() > 0) {
                            $i = 1;
                            ?>
                            <table class="table table-bordered table-striped">
                           <tr>
                            <th width="90%">Post</th>
                            <th width="10%">Options</th>
                           </tr>
                           <?php
                            foreach ($result as $row) {
                                $id = $row["Class_id"];
                                ?>
                           <tr >
                                    <td>
                                    <h1><?php echo $row['title']; ?> </h1>
                                    </td>
                                    
                                    <td>
                                    <button class="btn btn-info" ><a href="displayClass.php?id=<?php echo $id ?>">Detail</a></button>
                                    <form action="DeleteClass.php" method="POST" onsubmit="return confirm('Are you sure?')">
                                        <input type="hidden" name="id" value= "<?php echo $id; ?>"/>
                                        <input type="submit" value="Delete" class="btn btn-info" />

                                    </form>
                                </td>
                            </tr>
                            <?php
                            $i++;
                        }
                        ?>
                             </table>
                         <?php
                    } else {
                        ?>
                        <p align="center">No post</p>     
                        <?php
                    }
                    ?>
                       
                
            </div>
	
            </div>
        <?php require_once('Form/footer.php') ?>
    </body>
</html>