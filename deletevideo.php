<?php
session_start();
if(isset($_GET['id'])){
  $id = $_GET['id'];
  include 'connect.php';
  
 $stmt1 = $conn->prepare("select * FROM video_upload WHERE video_id = '$id'");
 $stmt = $conn->prepare("delete FROM video_upload WHERE video_id = '$id'");
    $pdoResult = $stmt1->execute();
    $pdoResult1 = $stmt->execute();
    $result1 = $stmt1->fetchAll();
    foreach ($result1 as $row1) 
    {
       $path = $row1['fileUrl'];
       unlink($path);
    }
     $idclass = $_SESSION['Class_id'];
     echo $idclass;
      if ($pdoResult && $pdoResult1){
      
        header( 'Location: displayClass.php?id='. $idclass);
    }
    else
        echo "error. <a href='javascript: history.go(-1)'>back</a>";
}
    ?>
