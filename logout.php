<?php 
session_start(); 
 
if (isset($_SESSION['username'])){
    unset($_SESSION['username']); 
    unset($_SESSION['role']);
    $_SESSION['msg'] ="";
    header( 'Location: login.php');    
}
?>
