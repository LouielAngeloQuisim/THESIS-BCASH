<?php
    session_start();
    require "mydb.php";
    $mydb = new myDb;
    if(isset($_SESSION['qrcode']) && isset($_SESSION['total_bottles']) && isset($_SESSION['total_points']) && 
    isset($_SESSION['acc_id']) && isset($_SESSION['admin'])){
        require 'cron_job_date.php';
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
?>
<!doctype html>
<html lang="en">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https:/cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

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

    <!-- recycle reports cards -->
    <section class=" bg-dark p-5">
        <div class="container">
            <h2 class="text-light text-center mb-4">
                RECYCLE REPORTS
            </h2>
            <!-- Total Bottles Recycled -->
            <div class="row text-center g-4">
                <div class="col-md">
                    <div class="card bg-light text-fontdark p-3">
                        <div class="h1 mb-md-4 mt-md-5">
                            <i class="bi bi-trash"></i>
                        </div>
                        <h3 class="card-title mb-md-2">
                            Bottles Recycled
                        </h3>
                        <p class="card-text lead mb-md-5 fw-normal">
                            <?php
                                $total_sum = $mydb->get_sumBottles($admin, $acc_id);
                                if(isset($total_sum)){
                                    echo 'Total: '.$total_sum.''; 
                                }
                                else{
                                    echo 'Total: 0';  
                                }
                                
                            ?>
                        </p>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card bg-light text-fontdark p-3 pb-0">
                        <div class="h1">
                            <i class="bi bi-card-text"></i>
                        </div>
                        <h3 class="card-title">
                            Recent Transactions
                        </h3>
                        <!-- Recycle Recent Transaction -->
                        <p class="card-text lead">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Earned points</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $redeem_records = $mydb->get_Recycle_trans($acc_id,$admin);
                                        if(isset($redeem_records)){
                                            $count = 0;
                                            foreach($redeem_records as $rows){
                                                $points_earned = $rows['points_earned'];
                                                $redeemtrans_time = $rows['trans_time'];
                                                $user_id = $rows['acc_id'];
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
                                                echo '<td>'.$points_earned .'</td>';
                                                echo '<td>'.$time.'</td>';
                                                echo '<td>'.$date.'</td>';
                                                echo '</tr>';
                                                $count += 1;
                                                if($count == 6){
                                                    break;
                                                }
                                            }
                                        }
                                        else{
                                            echo "There are no records of transactions yet";
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

    <!-- monthly report and acceptable bottles card -->
    <section class="p-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center">
                <div class="container text-fontdark">
                    <div class="row align-items-center justify-content-between g-4">
                        <div class="col-md">
                            <div class="card text-center border border-2 border-dark">
                                <div class="h1">
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
                                <div class="h1 mb-2">
                                    <i class="bi bi-bag-check"></i>
                                </div>
                                <h3 class="card-title mt-2">
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
                                            <?php
                                                $records = $mydb->get_Bottle();
                                                if(isset($records)){
                                                    $count = 0;
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- lines -->
    <section class="bg-primary p-3"></section>
    <section class="bg-secondary p-3"></section>

    <?php
        /*$result = $mydb->get_Date($nummonth);
        if(isset($result)){
            foreach($result as $rows){
                $date = $rows['date'];
                $newdate = date("d",strtotime($date));
                echo $newdate;
            }   
        }
        else{
            echo "There are no records available this month";
        }*/
        
    ?>
    <!-- line -->
    <section class="bg-secondary d-none d-sm-block p-3">
    </section>

    <!-- monthly report java script  -->
    <?php
        $result = $mydb->get_Date($nummonth);
        if(isset($result)){
            foreach($result as $rows){
                $newdate[] = 'Day '.date('d',strtotime($rows['date'])).'';
                $no_bottles[] = $rows['no_bottles'];
                //print_r($no_bottles);
            }   
        }
        else{
            echo "There are no records available this month";
        }
        /* /<?php echo json_encode($date);?>*/
    ?>
    <script>
        let myChart = document.getElementById('myChart').getContext('2d');
        let bottlesChart = new Chart(myChart, {
            type:'line',
            data:{
                //labels
                labels:<?php echo json_encode($newdate);?>,
                //datesets
                datasets:[{
                    label:'Recycled Bottles',
                    data:<?php echo json_encode($no_bottles);?>,
                    backgroundColor:'rgba(171, 51, 161, 0.6)',
                    borderWidth:3,
                    borderColor:'#33005c',
                    hoverBorderWidth:3,
                    hoverBorderColor:'#000'
                }]
            },
            options:[
            ]
        })    
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>