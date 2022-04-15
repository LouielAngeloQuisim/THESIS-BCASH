<?php
    session_start();
    require "mydb.php";
    $mydb = new myDb;
    if(isset($_SESSION['acc_id']) && isset($_SESSION['admin'])){
        $acc_id = $_SESSION['acc_id'];
        $admin = $_SESSION['admin'];
    }
    else{
        $acc_id = null;
        header("Location: login.php?usernotfound=1");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="sass/main.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>BCash</title>
  </head>
  <body>
    <!-- navbar -->
    <?php
        include 'nav_user.php';
    ?>

    <!-- show case area -->
    <section class="bg-primary text-light p-5 text-center">
        <div class="container">
            <div class="align-items-center">
                <div>
                    <div class="h1">
                        <i class="bi bi-card-text"></i>
                    </div>
                    <h2>HERE ARE YOUR TRANSACTIONS</h2>
                    <p class="lead">
                        This page contains all the recycle and redeem transactions you have made.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- recycle transaction tab -->
    <section class="p-5">
        <div class="container">
            <div class="card text-center border border-2 border-primary">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="transac.php">Recycle Records</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transac1.php">Redeem Records</a>
                        </li>
                    </ul>
                </div>
                <!-- recycle records area -->
                <div class="card-body px-0">
                    <div class="h2">
                        <i class="bi bi-trash"></i>
                    </div>
                    <h5 class="card-title">Recycle Transactions</h5>
                    <p class="card-text">
                        <div class="infocontent">
                            <div class="scroll">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Bottle Type</th>
                                            <th scope="col">Earned points</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                    <?php
                                        $redeem_records = $mydb->get_Recycle_trans($acc_id,$admin);
                                        if(isset($redeem_records)){
                                            foreach($redeem_records as $rows){
                                                $bottle_name = $rows['bottles'];
                                                $points_earned = $rows['points_earned'];
                                                $redeemtrans_time = $rows['trans_time'];
                                                $name = $mydb->get_Name($acc_id);
                                                $date = date("Y-m-d",strtotime($rows['trans_time']));
                                                $time = date("h:i:s A",strtotime($rows['trans_time']));
                                                if(isset($name)){
                                                    foreach($name as $newrows){
                                                        $fname = $newrows['fname'];
                                                        $mname = $newrows['mname'];
                                                        $lname = $newrows['lname'];
                                                        $fullname = ' '.$fname.' '.$mname.' '.$lname.'';
                                                    }
                                                }
                                                echo '<tr>';
                                                echo '<td>'.$bottle_name.'</td>';
                                                echo '<td>'.$points_earned .'</td>';
                                                echo '<td>'.$time.'</td>';
                                                echo '<td>'.$date.'</td>';
                                                echo '</tr>';
                                            }
                                        }
                                        else{
                                            echo '<tr>';
                                            echo '<td colspan="4">There are no records of recycle transactions yet.</td>';
                                            echo '</tr>';
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- lines -->
    <section class="bg-dark p-3"></section>
    <section class="bg-secondary p-2"></section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>