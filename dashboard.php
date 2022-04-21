<?php
session_start();
require "mydb.php";
$mydb = new myDb;
require 'cron_job_date.php';
if(isset($_SESSION['qrcode']) && isset($_SESSION['total_bottles']) && isset($_SESSION['total_points']) && 
isset($_SESSION['acc_id']) && isset($_SESSION['admin'])){
    $acc_id = $_SESSION['acc_id'];
    $qrcode = $_SESSION['qrcode'];
    $admin = $_SESSION['admin'];
    $total_points = $_SESSION['total_points'];
    $total_bottles = $_SESSION['total_bottles'];
    $url = "https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl={$qrcode}";
    $output["img"] = $url;
    $result = $mydb->get_sumBottles($admin, $acc_id);
    if(isset($result)){
        foreach($result as $row){
            $total_points = $row['total_points'];
            $total_bottles =  $row['total_bottles'];
        }
    }
}
else{
    //echo "error in collecting user data";
    header("Location: login.php?usernotfound=1");
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
                    <p class="lead text-light fst-italic">
                        "There is no way, when we throw anything away it must go somewhere" <br> -Annie Leonard
                    </p>
                </div>
                <div>
                    <div class="card bg-light text-center text-fontdark p-3">
                        <div class="h1">
                            <i class="bi bi-columns-gap"></i>
                        </div>
                        <h3 class="card-title mb-3">
                            Here's your QR Code
                        </h3>
                        <p class="card-text lead">
                            <img src="<?php echo $output["img"];?>" class="img-fluid" width="1000px" height="1000px" alt="QR Code">
                        </p>
                    </div>
                    <p class="fs-6 lead text-light text-center pt-2">
                        NOTE: Scan this QR to recycle and to redeem your points.
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
                            <table class="table note1 table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Bottle Types</th>
                                        <th scope="col">Earned points</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $recycle_records = $mydb->get_Recycle_trans($acc_id,$admin);
                                        if(isset($recycle_records)){
                                            $count = 0;
                                            foreach($recycle_records as $rows){
                                                $bottle_name = $rows['bottles'];
                                                $points_earned = $rows['points_earned'];
                                                $date = date("Y-m-d",strtotime($rows['trans_time']));
                                                $time = date("h:i:s A",strtotime($rows['trans_time']));
                                                echo '<tr>';
                                                echo '<td>'.$bottle_name.'</td>';
                                                echo '<td>'.$points_earned.'</td>';
                                                echo '<td>'.$time.'</td>';
                                                echo '<td>'.$date.'</td>';
                                                echo '</tr>';
                                                $count += 1;
                                                if($count == 5){
                                                    break;
                                                }
                                            }
                                        }
                                        else{
                                            echo '<tr>';
                                            echo '<td colspan="4">There are no recycle transactions yet.</td>';
                                            echo '</tr>';
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </p>
                        <p class="card-text lead mb-md-5">
                            <table class="table note1 table-striped">
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
                                        $count = 0;
                                        if(isset($redeem_records)){
                                            foreach($redeem_records as $rows){
                                                $points_deducted = $rows['points_deducted'];
                                                $date = date("Y-m-d",strtotime($rows['trans_time']));
                                                $time = date("h:i:s A",strtotime($rows['trans_time']));
                                                echo '<tr>';
                                                echo '<td>'.$points_deducted.'</td>';
                                                echo '<td>'.$time.'</td>';
                                                echo '<td>'.$date.'</td>';
                                                echo '</tr>';
                                                $count += 1;
                                                if($count == 5){
                                                    break;
                                                }
                                            }
                                        }
                                        else{
                                            echo '<tr>';
                                            echo '<td colspan="3">There are no redeem transactions yet.</td>';
                                            echo '</tr>';
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
                            <?php
                                $records = $mydb->get_Bottle();
                                $count = 0;
                                if(isset($records)){
                                    echo '
                                        <div class="carousel-indicators">
                                    ';
                                    $coursel_count = 0;
                                    foreach($records as $rows){
                                        if($coursel_count == 0){
                                            echo '
                                            <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="0" class="active" aria-current="true"></button>
                                            ';
                                        }
                                        else{
                                            echo '
                                            <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="'.$coursel_count.'"></button>
                                            ';
                                        }
                                        $coursel_count++;
                                    }
                                    echo '
                                    </div>
                                    <div class="carousel-inner">
                                    ';
                                    
                                    foreach($records as $rows){
                                        $bid = $rows['bottle_id'];
                                        $bname = $rows['bottle_name'];
                                        $bvalue = $rows['bottle_value'];
                                        $bsize = $rows['bottle_size'];
                                        $bimg = $rows['bottle_img'];
                                        // show bottle
                                        if($count == 0){
                                            echo '
                                            <div class="carousel-item active">
                                                <img src="upload_img/'.$bimg.'" class="d-block pb-2 w-100">
                                                <div class="bg-light p-5">
                                                    <div class="carousel-caption">
                                                        <h5>'.$bname.'</h5>
                                                        <p>Value: '.$bvalue.'</p>
                                                    </div>  
                                                </div>
                                            </div>
                                            ';
                                        }
                                        else{
                                            echo '
                                            <div class="carousel-item">
                                                <img src="upload_img/'.$bimg.'" class="d-block pb-2 w-100">
                                                <div class="bg-light p-5">
                                                    <div class="carousel-caption">
                                                        <h5>'.$bname.'</h5>
                                                        <p>Value: '.$bvalue.'</p>
                                                    </div>  
                                                </div>
                                            </div>
                                            ';
                                        }
                                        $count += 1;
                                    }
                                    echo '
                                    </div>
                                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselbottle" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#carouselbottle" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                    ';
                                }
                                else{
                                    echo 'There are no bottles available';
                                }
                            ?>
                            <!-- <div class="carousel-item active">
                                <img src="img/slide-0.PNG" class="d-block pb-2 w-100">
                                <div class="bg-light p-5">
                                    <div class="carousel-caption">
                                        <h5>[Type of Bottle]</h5>
                                        <p>[Bottle measurements and bottle currency]</p>
                                    </div>  
                                </div>
                            </div> -->

                        
                    </div>
                    </div>
                </div>
                <div class="col-md text-light text-center text-md-start p-4">
                    <h2>RECYCLABLE BOTTLES</h2>
                    <p class="lead">
                        Here are the following bottles that can only be Recycled. Present and scan this bottles to earn points.
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