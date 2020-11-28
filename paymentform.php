<?php
session_start();
include('connect.php');
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <?php require_once('assets/head_section.php') ?>  
    <link href="Form/paymentform/css/style.css" rel="stylesheet" type="text/css" media="all" />


    <script>
        
        function div1() {
            var x = document.getElementById("DIV1");
            var x1 = document.getElementById("DIV2");
            var x2 = document.getElementById("DIV3");
            var x3 = document.getElementById("DIV4");
            var x4 = document.getElementById("DIV5");
            if (x.style.display === "none") {
                x.style.display = "block";
                x1.style.display = "none";
                x2.style.display = "none";
                x3.style.display = "none";
                x4.style.display = "none";
            } else {
                x.style.display = "none";
            }
        }
        function div2() {
            var x = document.getElementById("DIV2");
            var x1 = document.getElementById("DIV1");
            var x2 = document.getElementById("DIV3");
            var x3 = document.getElementById("DIV4");
            var x4 = document.getElementById("DIV5");
            if (x.style.display === "none") {
                x.style.display = "block";
                x1.style.display = "none";
                x2.style.display = "none";
                x3.style.display = "none";
                 x4.style.display = "none";
            } else {
                x.style.display = "none";
            }
        }
        function div3() {
            var x = document.getElementById("DIV3");
            var x1 = document.getElementById("DIV2");
            var x2 = document.getElementById("DIV1");
            var x3 = document.getElementById("DIV4");
            var x4 = document.getElementById("DIV5");
            if (x.style.display === "none") {
                x.style.display = "block";
                x1.style.display = "none";
                x2.style.display = "none";
                x3.style.display = "none";
                 x4.style.display = "none";
            } else {
                x.style.display = "none";
            }
        }
        function div4() {
            var x = document.getElementById("DIV4");
            var x1 = document.getElementById("DIV2");
            var x2 = document.getElementById("DIV3");
            var x3 = document.getElementById("DIV1");
            var x4 = document.getElementById("DIV5");
            if (x.style.display === "none") {
                x.style.display = "block";
                x1.style.display = "none";
                x2.style.display = "none";
                x3.style.display = "none";
                 x4.style.display = "none";
            } else {
                x.style.display = "none";
            }
        }
           function div5() {
            var x = document.getElementById("DIV5");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
        
    </script>
    <body>
        <?php require_once('assets/navbar.php') ?>
        <main>
            <!--? slider Area Start-->
             <section class="slider-area slider-area2">
                <div class="slider-active">
                    <!-- Single Slider -->
                    <div class="single-slider slider-height2">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-8 col-lg-11 col-md-12">
                                    <div class="hero__caption hero__caption2">
                                        <h1 data-animation="bounceIn" data-delay="0.2s">Payment</h1>
                                        <!-- breadcrumb Start-->
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
<!--                                                <li class="breadcrumb-item"><a href="Course.php">Course</a></li> -->
                                            </ol>
                                        </nav>
                                        <!-- breadcrumb End -->
                                    </div>
                                </div>
                            </div>
                        </div>          
                    </div>
                </div>
            </section>
            <div class="main" id="DIVmain">
                
                <div class="content">


                    <div class="sap_tabs">
                        <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
                            <div class="pay-tabs">
                                <div class="section-tittle text-center mb-55">
                                <h2>Select Payment Method</h2>
                            </div>
                                
                                <ul class="resp-tabs-list">
                                    <li class="resp-tab-item" onclick="div1()"><span><i class="fas fa-credit-card"></i>  Credit Card</span></li>
                                    <li class="resp-tab-item" onclick="div2()"><span><i class="fas fa-university"></i>  Internet Banking</span></li>
                                    <li class="resp-tab-item" onclick="div3()"><span><i class="fab fa-paypal"></i>  PayPal</span></li> 
                                    <li class="resp-tab-item" onclick="div4()"><span><i class="fas fa-credit-card"></i> Debit Card</span></li>
                                    <div class="clear"></div>
                                </ul>	
                            </div>
                            <div class="resp-tabs-container">
                                <div class="tab-1 resp-tab-content" id="DIV1" style="display: block">
                                    <div class="payment-info">
                                        <h3>Personal Information</h3>
                                        <form>
                                            <div class="tab-for">				
                                                <h5>EMAIL ADDRESS</h5>
                                                <input type="text" value="">
                                                <h5>FIRST NAME</h5>													
                                                <input type="text" value="">
                                            </div>			
                                        </form>
                                        <h3 class="pay-title">Credit Card Info</h3>
                                        <form>
                                            <div class="tab-for">				
                                                <h5>NAME ON CARD</h5>
                                                <input type="text" value="">
                                                <h5>CARD NUMBER</h5>													
                                                <input class="pay-logo" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = '0000-0000-0000-0000';}" required="">
                                            </div>	
                                            <div class="transaction">
                                                <div class="tab-form-left user-form">
                                                    <h5>EXPIRATION</h5>
                                                    <ul>
                                                        <li>
                                                            <input type="number" class="text_box" type="text" value="6" min="1" />	
                                                        </li>
                                                        <li>
                                                            <input type="number" class="text_box" type="text" value="1988" min="1" />	
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="tab-form-right user-form-rt">
                                                    <h5>CVV NUMBER</h5>													
                                                    <input type="text" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                this.value = 'xxxx';
                                                            }" required="">
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            
                                        </form>
                                        </br>
                                        <input type="submit" value="SUBMIT" class="btn btn-primary" onclick="div5()">
                                        </br></br></br>
                                        <div class="single-bottom">
                                            <ul>
                                                <li>
                                                    <input type="checkbox"  id="brand" value="">
                                                    <label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-1 resp-tab-content" id="DIV2">
                                    <div class="payment-info">
                                        <h3>Net Banking</h3>
                                        <div class="radio-btns">
                                            <div class="swit">								
                                                <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>Asia Commercial Joint Stock Bank	</label> </div></div>
                                                <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Vietnam International and Commercial Joint Stock Bank</label> </div></div>
                                                <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Nam A Bank</label> </div></div>
                                                <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>VietNam Technological and Commercial Joint Stock Bank</label> </div></div>	
                                                <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Viet A Bank</label> </div></div>		
                                            </div>
                                            <div class="swit">								
                                                <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>JSC Bank for Investment and Development of Vietnam</label> </div></div>
                                                <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Vietnam Maritime Joint - Stock Commercial Bank</label> </div></div>
                                                <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Vietnam Public Joint Stock Commercial Bank</label> </div></div>
                                                <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>JSC Bank for Foreign Trade of Vietnam</label> </div></div>
                                                <div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Lien Viet Postal Commercial Joint Stock Bank</label> </div></div>	
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <a class="btn btn-primary" onclick="div5()">Continue</a>
                                    </div>
                                </div>
                                <div class="tab-1 resp-tab-content" id="DIV3">
                                    <div class="payment-info">
                                        <h3>PayPal</h3>
                                        <h4>Already Have A PayPal Account?</h4>
                                        <div class="login-tab">
                                            <div class="user-login">
                                                <h2>Login</h2>

                                                <form>
                                                    <input type="text" value="name@email.com" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                this.value = 'name@email.com';
                                                            }" required="">
                                                    <input type="password" value="PASSWORD" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                this.value = 'PASSWORD';}" required="">
                                                    <div class="user-grids">
                                                        <div class="user-left">
                                                            <div class="single-bottom">
                                                                <ul>
                                                                    <li>
                                                                        <input type="checkbox"  id="brand1" value="">
                                                                        <label for="brand1"><span></span>Remember me?</label>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="clear"></div>
                                                    </div>
                                                </form>
                                                </br>
                                             
                                                            <input type="submit" value="LOGIN"  class="btn btn-primary" onclick="div5()">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-1 resp-tab-content" id="DIV4">	
                                    <div class="payment-info">

                                        <h3 class="pay-title">Dedit Card Info</h3>
                                        <form>
                                            <div class="tab-for">				
                                                <h5>NAME ON CARD</h5>
                                                <input type="text" value="">
                                                <h5>CARD NUMBER</h5>													
                                                <input class="pay-logo" type="text" value="0000-0000-0000-0000" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                            this.value = '0000-0000-0000-0000';}" required="">
                                            </div>	
                                            <div class="transaction">
                                                <div class="tab-form-left user-form">
                                                    <h5>EXPIRATION</h5>
                                                    <ul>
                                                        <li>
                                                            <input type="number" class="text_box" type="text" value="6" min="1" />	
                                                        </li>
                                                        <li>
                                                            <input type="number" class="text_box" type="text" value="1988" min="1" />	
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="tab-form-right user-form-rt">
                                                    <h5>CVV NUMBER</h5>													
                                                    <input type="text" value="xxxx" onfocus="this.value = '';" onblur="if (this.value == '') {
                                                                this.value = 'xxxx';}" required="">
                                                </div>
                                                <div class="clear"></div>
                                            </div>
                                            
                                        </form>
                                        </br>
                                        <input type="submit" value="SUBMIT"  class="btn btn-primary" onclick="div5()">
                                        </br>
                                        <div class="single-bottom">
                                            <ul>
                                                <li>
                                                    <input type="checkbox"  id="brand" value="">
                                                    <label for="brand"><span></span>By checking this box, I agree to the Terms & Conditions & Privacy Policy.</label>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>	
                                </div>
                                <div class="tab-1 resp-tab-content" id="DIV5">
                                    
                                    </br><hr>
                                    <div class="payment-info">
                                        <h3>Select number of money you pay</h3>
                                        <h3>Personal Information</h3>
                                        <form method="post" action="paymentform.php" >
                                            <div class="tab-for">				
                                                <h5>NAME</h5>
                                                <input type="text" value="<?php echo $_SESSION['fullname']; ?>">
                                                <h5>Money</h5>													
                                                <input type="number" value="" placeholder="$" name="money" id="money">
                                            </div>
                                            </br></br>
                                            <input type="submit" value="Pay"  class="btn btn-primary" onclick="return confirm('Are you sure?')">
                                        </form>
                                       
                                    </div>
                                    
                                </div>
                            </div>	
                        </div>
                    </div>	

                </div>
            </div>
                </br></br>
                <!-- About Area End -->
        </main>
<?php 
 if (isset($_POST['money'])) {
     $money = $_POST['money'];
     $money = $money + $r['Budget'];
     $stID = $_SESSION['Student_id'];
     $stmt = $conn->prepare("Update student set Budget = '$money' where Student_id = '$stID'");
     $stmt1 = $conn->prepare("INSERT INTO `payment` (`St_id`, `Price`, `Time`) VALUES ('$stID' , '$money', now)");
     $pdoResult2 = $stmt1->execute();
    $pdoResult1 = $stmt->execute();
    
    if ($pdoResult1) {
            echo "<div class='alert alert-success'><b>Money added</b></a><br /></div>";
             $URL = "http://localhost/ProjectTest/UnlockForStudy.php";
            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
        } else {
            echo "<div class='alert alert-danger'><b>Error</b> <br /></div>";
        }
        
 }
?>
<?php require_once('assets/footer.php') ?>
    </body>
</html>

