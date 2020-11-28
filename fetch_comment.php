<?php

session_start();
require_once("connect.php"); 

$class_id = -1;
if (isset($_GET["id"])) {
    $class_id = intval($_GET['id']);
} else {
    echo 'error';
}

$query = "SELECT * FROM classcomment WHERE Class_id = $class_id ORDER BY comment_id ASC";

$statement = $conn->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
$output = '';
foreach($result as $row)
{
$user_id = $row['user_id'];
$statement = $conn->prepare("SELECT username FROM account WHERE id='$user_id'");

$statement->execute();

$r = $statement->fetch(PDO::FETCH_ASSOC);

 $output .= '
   <div class="comment-list">
                                    <div class="single-comment justify-content-between d-flex">
                                        <div class="user justify-content-between d-flex">
                                            <div class="thumb">
                                                <img src="assets/img/blog/comment_1.png" alt="">
                                            </div>
                                            <div class="desc">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex align-items-center">
                                                        <h5>
                                                            <a href="#">'.$r["username"].'</a>
                                                        </h5>
                                                        <p class="date">'.$row["date"].'</p>
                                                    </div>
                                                </div>
                                                <p class="comment"  style="width: 400px">
                                                    '.$row["comment"].'
                                                </p>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
 ';
                          
}
echo $output;

?>