<?php
session_start();
require "mydb.php";
$acc_id = $_SESSION['acc_id'];
$mydb = new myDb;
$record = $mydb->get_Qrcode($acc_id);
if(isset($record)){
    foreach($record as $rows){
        $hash_qrcode = $rows['qrcode'];
        //echo $acc_id;
        //echo "qrcode: ";
        //echo $hash_qrcode;
        if(password_verify($acc_id, $hash_qrcode)){
            $url = "https://chart.googleapis.com/chart?cht=qr&chs=250x250&chl={$hash_qrcode}";
            $output["img"] = $url;
        }
    }   
}
?>

<!doctype html>
<html lang="en">
  <head>
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
            <a href="#" class="navbar-brand fw-bold">BCASH</a>

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
                        <a href="login.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- show case with scan button -->
    <section class="bg-primary p-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1 class="text-light">Reduce, Reuse and <span class="text-warning">Recycle</span></h1>
                    <p class="lead my-4 text-light">
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

    <!-- black line -->
    <section class="bg-dark d-none d-sm-block p-3">
    </section>

    <!-- cards  -->
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
                        <p class="card-text lead mb-md-5">
                            Total: 99999999999
                        </p>
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
                            Total: 99999999999
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
                                    <tr>
                                        <td>[Earned points]</td>
                                        <td>[Time]</td>
                                        <td>[Date]</td>
                                    </tr>
                                    <tr>
                                        <td>[Earned points]</td>
                                        <td>[Time]</td>
                                        <td>[Date]</td>
                                    </tr>
                                    <tr>
                                        <td>[Earned points]</td>
                                        <td>[Time]</td>
                                        <td>[Date]</td>
                                    </tr>
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
                                    <tr>
                                        <td>[Redeemed points]</td>
                                        <td>[Time]</td>
                                        <td>[Date]</td>
                                    </tr>
                                    <tr>
                                        <td>[Redeemed points]</td>
                                        <td>[Time]</td>
                                        <td>[Date]</td>
                                    </tr>
                                    <tr>
                                        <td>[Redeemed points]</td>
                                        <td>[Time]</td>
                                        <td>[Date]</td>
                                    </tr>
                                </tbody>
                            </table>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- available bottles area -->
    <section class="bg-dark p-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md text-center">
                    <div class="card bg-light text-fontdark p-3">
                        <div class="h1 mb-2 mt-md-5">
                            <i class="bi bi-bag-check"></i>
                        </div>
                        <h3 class="card-title mb-2">
                            Acceptable Bottles
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
                                        <img src="img/slide-0.PNG" class="d-block w-100">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/slide-1.PNG" class="d-block w-100">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/slide-2.PNG" class="d-block w-100">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="img/slide-3.PNG" class="d-block w-100">
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
                <div class="col-md text-light text-center text-sm-start p-3">
                    <h2>Here are the Bottles chuchu</h2>
                    <p class="lead">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium sed ad doloremque quaerat 
                        sapiente amet quae maxime modi assumenda minus. Rem voluptatibus excepturi voluptates perferendis!
                    </p>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>