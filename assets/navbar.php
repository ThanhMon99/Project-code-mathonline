<style>
    input[type=text] {
   width: 130px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
  height:40px; padding: 12px 20px; margin: 8px 0; box-sizing: border-box; 
}

input[type=text]:focus {
  width: 100%;
}
 .btn1 {
            background-color: orange;
            border: none;
            text-decoration: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            height: 40px;
         }
</style>
<!-- ? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="assets/img/logo/loder.png" alt="">
            </div>
        </div>
    </div>
</div>

<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header ">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2">
                            <div class="logo">
                                <a href="index.php"><img src="assets/img/logo/LogoMakr_8FYvDJ.png" width="80%" height="80%" alt=""></a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10">
                            <div class="menu-wrapper d-flex align-items-center justify-content-end">
                                <!-- Main-menu -->
                                
                                <div class="main-menu d-none d-lg-block">
                                    <nav>
                                        <ul id="navigation">            
                                            <li><form action="search.php" method="GET"  >
                                                    <input type="text" name="query"  placeholder="Search......"/>
                                                    <input type="submit"   value="Search"  class="btn1"/>
                                </form></li>
                                            <li class="active" ><a href="index.php">Home</a></li>
                                            <li><a href="course.php">Courses</a>
                                                <ul class="submenu">
                                                    <li><a href="coursefilter.php?id=1">Primary Math</a></li>                          
                                                    <li><a href="coursefilter.php?id=2">Junior Math</a></li>
                                                    <li><a href="coursefilter.php?id=3">High Math</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="about.html">About</a></li>
                                            <!--                                                <li><a href="#">Blog</a>
                                                                                                <ul class="submenu">
                                                                                                    <li><a href="blog.html">Blog</a></li>
                                                                                                    <li><a href="blog_details.html">Blog Details</a></li>
                                                                                                    <li><a href="elements.html">Element</a></li>
                                                                                                </ul>
                                                                                            </li>-->
                                            <li><a href="contact.html">Contact</a></li>
                                            <?php
                                            if (isset($_SESSION['username'])) {
                                                ?>

                                                <li><h1>Hello <?php echo $_SESSION['username']; ?></h1>
                                                    <ul class="submenu">
                                                        <li><a href="paymentform.php"><?php
                                                                $stid = $_SESSION['Student_id'];
                                                                $st = $conn->prepare("SELECT * FROM student WHERE Student_id ='$stid'");
                                                                $st->execute();
                                                                $r = $st->fetch(PDO::FETCH_ASSOC);

                                                                if ($r['Budget'] == "0") {
                                                                    echo 'Your Budget: 0$';
                                                                    
                                                                } else {
                                                                  
                                                                    echo "Your Budget: " . $r['Budget'] . "$";
                                                                }
                                                                ?></a></li> 
                                                        <li><a href="#"><?php
                                                               
                                                                if ($r['payment_status'] == "D") {
                                                                     $oDate = strtotime($r['Time']);
                                                                     $sDate = date("y/m/d", $oDate);
                                                                    echo 'Duration of study: '.$sDate;
                                                                    
                                                                } else {
                                                                  
                                                                    echo "Your Account Have Not Renewal";
                                                                }
                                                                ?></a></li> 
                                                        <li><a href="profileSt.php">Profile</a></li>                          
                                                    </ul>
                                                </li>
                                                <li class="button-header"><a href="logout.php" class="btn btn3" onclick="return confirm('Are you sure?')">Logout</a></li>    
                                                <?php
                                            } else {
                                                ?>
                                                <!-- Button -->
                                                <li class="button-header margin-left "><a href="register.php" class="btn">Join</a></li>
                                                <li class="button-header"><a href="login.php" class="btn btn3">Log in</a></li>
                                            <?php } ?>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div> 
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>