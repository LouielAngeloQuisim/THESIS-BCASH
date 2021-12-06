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
    <nav class="navbar navbar-expand-lg bg-primary navbar-dark py-3">
        <div class="container">
            <a href="transac1.php" class="navbar-brand fw-bold">BCASH</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="dashboard.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="transac.php" class="nav-link">Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a href="catalouge.php" class="nav-link">Catalouge</a>
                    </li>
                    <li class="nav-item">
                        <a href="profile.php" class="nav-link">Profile</a>
                    </li>
                    <li class="nav-item">
                        <!-- logout trigger modal -->
                        <a href="login.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modallogout">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal logout -->
    <div class="modal fade" id="modallogout" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modallogout">Logout Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="h1 text-danger">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <p class="text-fondark">
                        Are you sure to Logout?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <a href="login.php" class="btn btn-secondary">Confirm</a>
                </div>
            </div>
        </div>
    </div>

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

    <!-- redeem transaction tab -->
    <section class="p-5">
        <div class="container">
            <div class="card text-center border border-2 border-primary">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link" href="transac.php">Recycle Tab</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="transac1.php">Redeem Tab</a>
                        </li>
                    </ul>
                </div>
                <!-- redeem records area -->
                <div class="card-body px-0">
                    <div class="h2">
                        <i class="bi bi-cart-check"></i>
                    </div>
                    <h5 class="card-title">Redeem Transactions</h5>
                    <p class="card-text">
                        <div class="infocontent">
                            <div class="scroll">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Redeemed Item</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Time</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                    <?php
                                        $redeem_records = $mydb->get_Redeem_trans($acc_id);
                                        if(isset($redeem_records)){
                                            foreach($redeem_records as $rows){
                                                $points_deducted = $rows['points_deducted'];
                                                $redeemtrans_time = $rows['trans_time'];
                                                echo '<tr>';
                                                echo '<td>'.$points_deducted.'</td>';
                                                echo '<td>'.$redeemtrans_time.'</td>';
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