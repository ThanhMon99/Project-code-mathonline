<?php
if(isset($_POST['id'])){    
    
    $class_id = $_POST['id'];
    include('connect.php'); 
    
    $stmt1 = $conn->prepare("select * FROM upload_file WHERE Class_id = '$class_id'");
    $stmt1->execute();
    $result1 = $stmt1->fetchAll();
    foreach ($result1 as $row1) 
    {
       $path = $row1['fileUrl'];
       unlink($path);
    }
    
     $stmt2 = $conn->prepare("select * FROM video_upload WHERE Class_id = '$class_id'");
    $stmt2->execute();
    $result2 = $stmt2->fetchAll();
    foreach ($result2 as $row2) 
    {
       $path = $row2['videoUrl'];
       unlink($path);
    }
    
    $stmt = $conn->prepare("DELETE FROM class WHERE Class_id = '$class_id'");
    $pdoResult = $stmt->execute();
    
    
    if ($pdoResult){
        header( 'Location: showClass.php');
    }
    else
        echo "error. <a href='javascript: history.go(-1)'>back</a>";
}
?>