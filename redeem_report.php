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
    }
    else{
        header("Location: login.php?usernotfound=1");
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> 
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script> -->
    <!-- <script src="https:/cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script> -->
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
        include 'nav_admin.php';
    ?>

    <!-- redeem reports cards  -->
    <section class=" bg-dark p-5">
        <div class="container">
            <h2 class="text-light text-center mb-4">
                REDEEM REPORT
            </h2>
            <!-- accounts redeemed total  -->
            <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card bg-light text-fontdark p-3">
                        <div class="h1 mb-md-4 mt-md-5">
                            <i class="bi bi-person"></i>
                        </div>
                        <h3 class="card-title mb-md-2">
                            Number of Redeems
                        </h3>
                        <p class="card-text lead mb-md-5 fw-normal">
                            <?php
                                $total_count = $mydb->get_Countredeem();
                                echo $total_count;
                                //print_r($total_count);
                            ?>
                        </p>
                    </div>
                </div>
                <!-- redeem recent transaction  -->
                <div class="col-md">
                    <div class="card bg-light text-fontdark border border-2 border-primary p-3 pb-0">
                        <div class="h1">
                            <i class="bi bi-card-text"></i>
                        </div>
                        <h3 class="card-title">
                            Recent Transactions
                        </h3>
                        <p class="card-text lead">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Redeem</th>
                                        <th scope="col">Price</th>
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
                                            $user_id = $rows['acc_id'];
                                            $item = $rows['item'];
                                            $name = $mydb->get_Name($user_id);
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
                                            echo '<td>'.$fullname.'</td>';
                                            echo '<td>'.$item.'</td>';
                                            echo '<td>'.$points_deducted.'</td>';
                                            echo '<td>'.$time.'</td>';
                                            echo '<td>'.$date.'</td>';
                                            echo '</tr>';
                                        }
                                    }
                                    else{
                                        echo '<tr>';
                                        echo '<td colspan="5">There are no records of transactions yet.</td>';
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

    <!-- redeemable items -->
    <section class="p-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div class="container text-fontdark">
                    <div class="row align-items-center justify-content-between g-4">
                        <div class="col-md">
                            <div class="card text-center border border-2 border-dark">
                                <div class="h1 mt-2">
                                    <i class="bi bi-file-bar-graph"></i>
                                </div>
                                    <h3 class="card-title">
                                        Monthly Report
                                    </h3>
                                    <?php
                                        $month = $mydb->get_Maxdate();
                                        if(isset($month)){
                                            foreach($month as $rows){
                                                $maxdate = $rows['maxdate'];
                                            }
                                            $nummonth = date("m",strtotime($maxdate));
                                            $newmonth = date("F",strtotime($maxdate));
                                        }
                                        else{
                                            $newmonth = "Month undefined";
                                        }
                                        echo '<h3>'.$newmonth.'</h3>';
                                    ?>
                                <!-- nasa baba mismo yung chart  -->
                                <div class="card-body">
                                    <canvas id="myChart"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="col-md text-center">
                            <div class="card bg-light cardadmin1 border border-2 border-dark">
                                <div class="h1 mt-2">
                                    <i class="bi bi-bag-check"></i>
                                </div>
                                <h3 class="card-title mb-2">
                                    Redeemable Items
                                </h3>
                                <div class="card-text">
                                    <div id="carouselbottle" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                            <?php
                                                $records = $mydb->get_Shop_items();
                                                $count = 0;
                                                if(isset($records)){
                                                    echo '
                                                        <div class="carousel-indicators">
                                                    ';
                                                    $coursel_count = 0;
                                                    foreach($records as $rows){
                                                        if($coursel_count == 0){
                                                            echo '
                                                            <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                                            ';
                                                        }
                                                        else{
                                                            echo '
                                                            <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="'.$coursel_count.'" aria-label="Slide '.$coursel_count++.'"></button>
                                                            ';
                                                        }
                                                        $coursel_count++;
                                                    }
                                                    echo '
                                                    </div>
                                                    <div class="carousel-inner">
                                                    ';
                                                    foreach($records as $rows){
                                                        $item_id = $rows['item_id'];
                                                        $item_name = $rows['item_name'];
                                                        $item_price = $rows['item_price'];
                                                        $item_stock = $rows['item_stock'];
                                                        $item_img = $rows['item_img'];
                                                        // show bottle
                                                        if($count == 0){
                                                            echo '
                                                            <div class="carousel-item active">
                                                                <img src="upload_img/'.$item_img.'" class="d-block pb-2 w-100">
                                                                <div class="bg-light p-5">
                                                                    <div class="carousel-caption">
                                                                        <h5>'.$item_name.'</h5>
                                                                        <p>Price: '.$item_price.'</p>
                                                                    </div>  
                                                                </div>
                                                            </div>
                                                            ';
                                                        }
                                                        else{
                                                            echo '
                                                            <div class="carousel-item ">
                                                                <img src="upload_img/'.$item_img.'" class="d-block pb-2 w-100">
                                                                <div class="bg-light p-5">
                                                                    <div class="carousel-caption">
                                                                        <h5>'.$item_name.'</h5>
                                                                        <p>Price: '.$item_price.'</p>
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
                                            ?>
                                            <!-- <div class="carousel-item active">
                                                <img src="img/print.PNG" class="d-block pb-2 w-100">
                                                <div class="bg-light p-5">
                                                    <div class="carousel-caption">
                                                        <h5>[Type of Redeemable Item]</h5>
                                                        <p>[Redeemable Item Description]</p>
                                                    </div>  
                                                </div>
                                            </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- line -->
    <section class="bg-primary p-3">
    </section>
    <section class="bg-secondary p-3">
    </section>
    <?php
        $result = $mydb->get_Date($nummonth);
        if(isset($result)){
            foreach($result as $rows){
                $newdate[] = $newmonth.' '.date('d',strtotime($rows['date'])).'';
                $no_redeem[] = $rows['no_redeem'];
                //print_r($no_bottles);
            }   
        }
        else{
            echo "There are no records available this month";
        }
        /* /<?php echo json_encode($date);?>*/
    ?>
    <!-- monthly report java script  -->
    <script>
        let myChart = document.getElementById('myChart').getContext('2d');

        let bottlesChart = new Chart(myChart, {
            type:'line',
            data:{
                labels:<?php echo json_encode($newdate);?>,
                datasets:[{
                    label:'Redeemed Item',
                    data:<?php echo json_encode($no_redeem);?>,
                    backgroundColor:'rgba(171, 51, 161, 0.6)',
                    borderWidth:3,
                    borderColor:'#33005c',
                    hoverBorderWidth:3,
                    hoverBorderColor:'#000',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        })
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>