<?php
    session_start();
    require "mydb.php";
    $mydb = new myDb;
    if(isset($_SESSION['acc_id'])){
        $acc_id = $_SESSION['acc_id'];
    }
    else{
        $acc_id = null;
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
    <section class="bg-primary text-light p-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <div class="h1">
                        <i class="bi bi-card-text"></i>
                    </div>
                    <h1>Here's your Transactions</h1>
                    <p class="lead my-4">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam dolore, fugiat placeat sequi ex laudantium veniam obcaecati voluptatum. Blanditiis fugiat ullam mollitia sequi ipsum nesciunt! Ea ratione esse ut magni!
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
                            <a class="nav-link active" href="transac.php">Recycle Tab</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transac1.php">Redeem Tab</a>
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
                                            <th scope="col">Earned points</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                    <?php
                                        $recycle_records = $mydb->get_Recycle_trans($acc_id);
                                        if(isset($recycle_records)){
                                            foreach($recycle_records as $rows){
                                                $points_earned = $rows['points_earned'];
                                                $trans_time = $rows['trans_time'];
                                                echo '<tr>';
                                                echo '<td>'.$points_earned.'</td>';
                                                echo '<td>'.$trans_time.'</td>';
                                                echo '<td>[Date]</td>';
                                                echo '</tr>';
                                            }
                                        }
                                        else{
                                            echo "There are no records of transactions yet";
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