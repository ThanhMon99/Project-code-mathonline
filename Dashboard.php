<?php
session_start();
include('connect.php');
include('checkLogin.php');
//get time
$current_timestamp = strtotime(date("Y-m-d H:i:s"));
$year = date('Y', $current_timestamp);
$month = date('m', $current_timestamp);
$id = $_SESSION['id'];
$role = $_SESSION['role'];
//get admin id
//$stmt1 = $conn->prepare("select * from account where role = 'Admin'");
//$stmt1->execute();
//$r1 = $stmt1->fetch(PDO::FETCH_ASSOC);
//$id2 = $r1['id'];
//and user_id != $id2
//get login history form now
$query = "SELECT user_id, last_activity FROM login_details WHERE MONTH(last_activity) = '$month' and YEAR(last_activity) = '$year'";
$statement = $conn->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
?>
<html lang="en">
<?php require_once('Form/head_section.php') ?>  
    <style>
        * {
            box-sizing: border-box;
        }

        /* Create two equal columns that floats next to each other */
        .column {
            float: left;
            width: 50%;
            padding: 10px;
            height: 300px; /* Should be removed. Only for demonstration */
        }

        /* Clear floats after the columns */
        .row:after {
            content: "";
            display: table;
            clear: both;
        }
    </style>

    <body>
<?php require_once('Form/navbar.php') ?>
        <?php require_once('Form/side_bar.php') ?>
        </br>
        <div class="col-md-12">
            <div class="content-panel">
                <h2 align="center">User Status At <?php echo $month . ', ' . $year; ?></h2>
                <table class="table" style="width:100%" align="center">
                    <tr>
                        <th width="40%">Username</th>
                        <th width="30%"><i class=" fa fa-edit"></i>Status</th>
                        <th width="30%"><i class="fa fa-money" aria-hidden="true"></i>Budget</th>
                    </tr>
<?php
$stmt1 = $conn->prepare("select * from account where role = 'Student'");
$stmt1->execute();
$r1 = $stmt1->fetchAll();
foreach ($r1 as $r) {
    $usid = $r['id'];
    $stmt2 = $conn->prepare("SELECT * FROM student  WHERE User_id = '$usid'");
    $stmt2->execute();
    $r2 = $stmt2->fetch(PDO::FETCH_ASSOC);
    if ($r2['payment_status'] == "D") {
        $status = '<span class="label label-success label-mini">' . $r['username'] . ' has extend the learning package!</span>';
    } else {
        $status = '<span class="label label-warning label-mini">' . $r['username'] . ' has not extend the learning package!!</span>';
    }
    ?>    


                        <tr>
                            <td><?php echo $r['username']; ?></td>
                            <td><?php echo $status; ?></td>
                            <td><?php echo $r2['Budget']; ?> $</td>
                        </tr>

<?php } ?>
                </table>
            </div></div>
        <hr  width="90%" align="center" />


        <h2 align="center">User Activities Detail At <?php echo $month . ', ' . $year; ?></h2>

        <div class="row" >

            <div class="column">          
                <h2 align="left">Login Total</h2>
                <table class="table table-bordered table-striped" style="width:100%" align="center">
                    <tr>
                        <th width="50%">Username</th>
                        <th width="50%">Total</th>
                    </tr>
<?php
$stmt3 = $conn->prepare("select * from account where role != 'Staff'");
$stmt3->execute();
$r3 = $stmt3->fetchAll();
foreach ($r3 as $r) {
    $i = 0;
    foreach ($result as $row) {

        if ($r['id'] == $row['user_id']) {
            $i++;
        }
    }
    ?>     
                        <tr>
                            <td><?php echo $r['username']; ?></td>
                            <td><?php
                    if ($i != 0) {
                        echo $i . ' time';
                    } else {
                        echo 'No login activity for this month!';
                    }
    ?></td>

                        </tr>

                            <?php } ?>
                </table>
            </div>

            <div class="column" >

                <h2 align="left">Payment Detail This Month</h2>
                <table class="table table-bordered table-striped" style="width:100%" align="center">
                    <tr>
                        <th width="40%">Username</th>
                        <th width="30%">Total pay</th>
                        <th width="30%">Time</th>
                    </tr>
<?php
$stmt4 = $conn->prepare("SELECT * FROM payment WHERE MONTH(Time) = '$month' and YEAR(Time) = '$year'");
$stmt4->execute();
$r4 = $stmt4->fetchAll();
$total = 0;
foreach ($r4 as $r) {
    $stid1 = $r['St_id'];
    $stmt5 = $conn->prepare("select * from student, account where student.Student_id = '$stid1' and student.User_id = account.id");
    $stmt5->execute();
    $r5 = $stmt5->fetch(PDO::FETCH_ASSOC);

    $total = $r['Price'] + $total;
    ?>     


                        <tr>
                            <td><?php echo $r5['username']; ?></td>
                            <td><?php echo $r['Price']; ?></td>
                            <td><?php echo $r['Time']; ?></td>
                        </tr>

<?php } ?>
                    <tr style="background-color: greenyellow;">
                        <td>Total of payment this month: </td>
                        <td><?php echo $total; ?></td>
                    </tr>
                </table>


            </div>

        </div>          
<?php require_once('Form/footer.php') ?>
    </body>
</html>

