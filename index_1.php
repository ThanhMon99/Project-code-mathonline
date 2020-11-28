<?php
session_start();
include('connect.php');
$role = $_SESSION['role'];
if ($role == 'Admin' || $role == 'Staff') {
    $query = "SELECT * FROM account WHERE id != '" . $_SESSION['id'] . "' ";
}

if ($role == 'Tutor') {

    $query = "SELECT id, username, Email FROM account, allocate WHERE id != '" . $_SESSION['id'] . "'  and allocate.tutorid = '" . $_SESSION['id'] . "' and allocate.studentid = id ";
}

$statement = $conn->prepare($query);

$statement->execute();

$result = $statement->fetchAll();
?>
<html lang="en">
    <style>
        #bodyid #container{
            background-image: url("Form/img/back.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        #divid{
            color: black;
            background-color: whitesmoke;
        }
        
    </style>
    <?php require_once('Form/head_section.php') ?>  
    <body id="bodyid">
        <?php require_once('Form/navbar.php') ?>
        <?php require_once('Form/side_bar.php') ?>
        <a class="weatherwidget-io" href="https://forecast7.com/en/14d06108d28/vietnam/" data-label_1="VIET NAM" data-label_2="WEATHER" data-theme="original" >VIET NAM WEATHER</a>
        
      

        <?php require_once('Form/footer.php') ?>
    </body>
</html>
<script>
    !function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://weatherwidget.io/js/widget.min.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, 'script', 'weatherwidget-io-js');
    
</script>
