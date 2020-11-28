<?php
session_start();
include('connect.php');
?>
<!doctype html>
<html class="no-js" lang="zxx">
    <?php require_once('assets/head_section.php') ?>  
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            width: 100%;
        }
        .styled-table thead tr {
            background-color: #6600cc;
            color: #ffffff;
            text-align: left;
        }
        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
    </style>
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
                                        <h1 data-animation="bounceIn" data-delay="0.2s"> Payment</h1>
                                        <!-- breadcrumb Start-->
                                        <nav aria-label="breadcrumb">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>

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
            <!-- Courses area start -->
            <div class="courses-area section-padding40 fix">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-7 col-lg-8">
                            <div class="section-tittle text-center mb-55">
                                <h2>Payment info</h2>
                            </div>
                        </div>
                    </div>
                    <?php
                    if ($r['Budget'] < 100) {
//                        header('Location: paymentform.php');
                        $URL = "http://localhost/ProjectTest/paymentform.php";
                        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                    }
                    if ($r['payment_status'] == 'D') {
//                        header('Location: index.php');
                        $URL = "http://localhost/ProjectTest/index.php";
                        echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                        echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                    }
                    $bugetleft = $r['Budget'] - 100;
                    ?>
                    <form method="post" action="UnlockForStudy.php" >
                        <table class="styled-table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Result</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Your Budget</td>
                                    <td><?php echo $r['Budget'] . " $"; ?></td>
                                </tr>
                                <tr class="active-row">
                                    <td>The cost you must pay</td>
                                    <td>100 $</td>
                                </tr>
                                <tr >
                                    <td>Budget left</td>
                                    <td><?php echo $bugetleft; ?> $</td>
                                </tr>
                                <tr>

                                    <td>
                                        <input type="submit" value="Buy" id="submit" name="submit"  class="btn btn-primary" onclick="return confirm('Are you sure to buy?')">
                                    </td>
                                    <td></td>
                                </tr>
                                <!-- and so on... -->
                            </tbody>
                        </table>
                    </form>
                    <?php
                    if (isset($_POST['submit'])) {
                        $stID = $_SESSION['Student_id'];
                        $today = date('Y-m-d');
                        $month = strtotime(date("Y-m-d", strtotime($today)) . " +1 month");
                        $month = strftime("%Y-%m-%d", $month);
                        $stmt = $conn->prepare("Update student set payment_status = 'D', Budget = '$bugetleft', Time = '$month'  where Student_id = '$stID'");
                        $pdoResult = $stmt->execute();
                        if ($pdoResult) {
                            echo 'done';
                            $URL = "http://localhost/ProjectTest/index.php";
                            echo "<script type='text/javascript'>document.location.href='{$URL}';</script>";
                            echo '<META HTTP-EQUIV="refresh" content="0;URL=' . $URL . '">';
                        } else {
                            echo'error';
                        }
                    }
                    ?>
                </div>
            </div>
            <!-- Courses area End -->

            <!-- ? services-area -->

        </main>

        <?php require_once('assets/footer.php') ?>

    </body>
</html>
