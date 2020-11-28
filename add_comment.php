<?php
session_start();
require_once("connect.php"); 

$class_id = -1;
if (isset($_GET["id"])) {
    $class_id = intval($_GET['id']);
} else {
    echo 'error';
}

$error = '';
$user_id = $_SESSION['id'];

$comment_content = '';

if(empty($_POST["comment_content"]))
{
 $error .= '<p class="text-danger">Comment is required</p>';
}
else
{
 $comment_content = $_POST["comment_content"];
}

if($error == '')
{
 $query = "
 INSERT INTO classcomment 
 (comment, user_id, Class_id) 
 VALUES (:comment, :user_id, :Class_id)
 ";
 $statement = $conn->prepare($query);
 $statement->execute(
  array(
   ':comment'=> $comment_content,
   ':user_id' => $user_id,
   ':Class_id' => $class_id
  )
 );
 $error = '<label class="text-success">Comment Added</label>';
}

$data = array(
 'error'  => $error
);

echo json_encode($data);

?>
