<?php
session_start();
require "mydb.php";
$mydb = new myDb;
if(isset($_SESSION['qrcode']) && isset($_SESSION['total_bottles']) && isset($_SESSION['total_points']) && 
isset($_SESSION['acc_id']) && isset($_SESSION['admin'])){
    $acc_id = $_SESSION['acc_id'];
    $qrcode = $_SESSION['qrcode'];
    $admin = $_SESSION['admin'];
    $total_points = $_SESSION['total_points'];
    $total_bottles = $_SESSION['total_bottles'];
    $url = "https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl={$qrcode}";
    $output["img"] = $url;

}
else{
    echo "error in collecting user data";
}
//$record = $mydb->get_Qrcode($acc_id);
/*if(isset($record)){
    foreach($record as $rows){
        $hash_qrcode = $rows['qrcode'];
        //echo $acc_id;
        //echo "qrcode: ";
        //echo $hash_qrcode;
        if(password_verify($acc_id, $hash_qrcode)){
            //generate qr code from google 
            $url = "https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl={$hash_qrcode}";
            $output["img"] = $url;
        }
    }   
}*/
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

    <!-- show case with qr code -->
    <section class="bg-primary p-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div class="pe-md-2">
                    <h2 class="text-light">Reduce, Reuse and <span class="text-warning">Recycle</span></h2>
                    <p class="lead text-light">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam dolore, fugiat placeat sequi ex laudantium veniam obcaecati voluptatum. Blanditiis fugiat ullam mollitia sequi ipsum nesciunt! Ea ratione esse ut magni!
                    </p>
                </div>
                <div class="card bg-light text-center text-fontdark p-3">
                    <div class="h1">
                        <i class="bi bi-columns-gap"></i>
                    </div>
                    <h3 class="card-title mb-3">
                        Heres your Qr Code
                    </h3>
                    <p class="card-text lead">
                        <img src="<?php echo $output["img"];?>" class="img-fluid" width="1000px" height="1000px" alt="QR Code">
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- line -->
    <section class="bg-dark d-none d-sm-block p-3">
    </section>

    <!-- cards (records) -->
    <section class="p-5">
        <div class="container">
        <div class="mb-3">
        <?php
            /*session_start();
            require "mydb.php";
            $acc_id = $_SESSION['acc_id'];
            $mydb = new myDb;
            $record = $mydb->get_Qrcode($acc_id);
            if(isset($record)){
                print_r($record);
                foreach($record as $rows){
                    $hash_qrcode = $rows['qrcode'];
                    echo $acc_id;
                    echo "qrcode: ";
                    echo $hash_qrcode;
                    if(password_verify($acc_id, $hash_qrcode)){
                        $url = "https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl={$hash_qrcode}";
                        $output["img"] = $url;
                        echo $url;
                    }
                }
                <img src="<?php echo $output["img"];?>" alt="QR Code" width="50%" height="50%">
            }*/
        ?>
        </div>
            <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card bg-light text-fontdark border border-2 border-primary p-3">
                        <div class="h1 mb-md-4 mt-md-5">
                            <i class="bi bi-trash"></i>
                        </div>
                        <h3 class="card-title mb-md-3">
                            Bottles Recycled
                        </h3>
                        <?php
                            if(isset($total_bottles)){
                                echo '<p class="card-text lead mb-md-5">';
                                echo 'Total: '.$total_bottles.'';
                                echo '</p>';
                            }
                        ?>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-light text-fontdark border border-2 border-primary p-3">
                        <div class="h1 mb-md-4 mt-md-5">
                            <i class="bi bi-cash"></i>
                        </div>
                        <h3 class="card-title mb-md-3">
                            Earned Points
                        </h3>
                        <p class="card-text lead mb-md-5">
                            <?php
                                if(isset($total_points)){
                                    echo 'Total: '.$total_points.'';
                                }
                            ?>
                        </p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-light text-fontdark border border-2 border-primary p-3">
                        <div class="h1 mb-2 mt-md-5">
                            <i class="bi bi-card-text"></i>
                        </div>
                        <h3 class="card-title mb-2">
                            Recent Transaction
                        </h3>
                        <p class="card-text lead mb-md-5">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Earned points</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $recycle_records = $mydb->get_Recycle_trans($acc_id,$admin);
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
                                            echo "There no transactions yet";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </p>
                        <p class="card-text lead mb-md-5">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Redeemed points</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $redeem_records = $mydb->get_Redeem_trans($acc_id,$admin);
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
                                            echo "There no transactions yet";
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- acceptable bottles area -->
    <section class="bg-dark p-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md text-center">
                    <div class="card bg-light text-fontdark p-3">
                        <div class="h1 mb-2 mt-md-5">
                            <i class="bi bi-bag-check"></i>
                        </div>
                        <h3 class="card-title mb-2">
                            Accepted Bottles
                        </h3>
                        <div class="card-text">
                            <div id="carouselbottle" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="img/slide-0.PNG" class="d-block pb-2 w-100">
                                        <div class="bg-light p-5">
                                            <div class="carousel-caption">
                                                <h5>[Type of Bottle]</h5>
                                                <p>[Bottle measurements and bottle currency]</p>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/slide-1.PNG" class="d-block pb-2 w-100">
                                        <div class="bg-light p-5">
                                            <div class="carousel-caption">
                                                <h5>[Type of Bottle]</h5>
                                                <p>[Bottle measurements and bottle currency]</p>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/slide-2.PNG" class="d-block pb-2 w-100">
                                        <div class="bg-light p-5">
                                            <div class="carousel-caption">
                                                <h5>[Type of Bottle]</h5>
                                                <p>[Bottle measurements and bottle currency]</p>
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/slide-3.PNG" class="d-block pb-2 w-100">
                                        <div class="bg-light p-5">
                                            <div class="carousel-caption">
                                                <h5>[Type of Bottle]</h5>
                                                <p>[Bottle measurements and bottle currency]</p>
                                            </div>  
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselbottle" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselbottle" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                            </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md text-light text-center text-md-start p-3">
                    <h2>RECYCLABLE BOTTLES</h2>
                    <p class="lead">
                        Here are the following bottles that can only be Recycled. Present and scan this bottles at the continue to earn points.
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- line -->
    <section class="bg-secondary p-4"></section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>