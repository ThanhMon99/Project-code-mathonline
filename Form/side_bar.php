 <?php
function getCurURL()
{
    if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
        $pageURL = "https://";
    } else {
      $pageURL = 'http://';
    }
    if (isset($_SERVER["SERVER_PORT"]) && $_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
getCurURL();
?>
<!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered"><a href="profile.php"><img src="Form/img/pro.png" class="img-circle" width="80"></a></p>
            <h5 class="centered">Hello <?php echo $_SESSION['username']; ?></h5>
            <?php if($_SESSION['role'] == 'Staff'){ ?>
              <li>
                <a <?php if(getCurURL() == 'http://localhost/ProjectTest/Dashboard.php') {echo 'class="active"';} ?> href="Dashboard.php">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>
                    <span>Dashboard</span>
                </a>
            </li>     
            <?php } ?>
                <li>
                <a <?php if(getCurURL() == 'http://localhost/ProjectTest/profile.php') {echo 'class="active"';} ?> href="profile.php">
                    <i class="fa fa-id-card"></i>
                    <span>Your Profile </span>
                </a>
            </li>          

            <li class="sub-menu">
                <a <?php if(getCurURL() == 'http://localhost/ProjectTest/file_upload.php' || getCurURL() == 'http://localhost/ASMtest/showPost.php') {echo 'class="active"';} ?> href="javascript:;">
                    <i class="fa fa-file-text"></i>
                    <span>Class</span>
                </a>
                <ul class="sub">
                    <li <?php if(getCurURL() == 'http://localhost/ProjectTest/Addclass.php') {echo 'class="active"';} ?>><a href="Addclass.php">New Class</a></li>
                    <li <?php if(getCurURL() == 'http://localhost/ProjectTest/showClass.php') {echo 'class="active"';} ?> ><a href="showClass.php">Class</a></li>
                </ul>
            </li>
       
           
             </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<section id="main-content">
    <section class="wrapper">