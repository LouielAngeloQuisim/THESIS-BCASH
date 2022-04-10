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
        include 'nav_shop.php';
        require "mydb.php";
        $mydb = new myDb;
        require 'cron_job_date.php';
    ?>

    <!-- recycle scan area -->
    <section class="bg-primary p-5 text-center text-sm-start">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md text-md-start">
                <div class="text-light">
                    <div class="h1 mb-2">
                        <i class="bi bi-trash"></i>
                    </div>
                    <h2>SCAN <span class="text-warning">BOTTLES</span></h2>
                    <p class="lead my-4">
                        Recycling bottles is way of helping the environment, with the consideration to recycle plastics in exchange of money. 
                        The more plastic that we collect the more solid waste we save from ending up in a landfill site, when they can be used or exchange as 
                        points.
                    </p>
                    <!-- recycle scan button -->
                    <a href="recycle_scan.php" class="btn btn-secondary btn-lg mb-4">Scan Bottle</a>
                </div>
            </div>
            <!-- acceptable bottles carousel area -->
            <div class="col-md text-center">
                <div class="card bg-light text-center cardadmin2 p-3">
                    <div class="h1 mb-2">
                        <i class="bi bi-bag-check"></i>
                    </div>
                    <h3 class="card-title mt-2">
                        Accepted Bottles
                    </h3>
                    <div class="card-text">
                        <div id="carouselbottle" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <?php
                            $records = $mydb->get_Bottle();
                            if(isset($records)){
                                echo '
                                <div class="carousel-indicators">
                                ';
                                $carousel = 0;
                                foreach($records as $rows){
                                    if($carousel == 0){
                                        echo '<button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>';
                                    }else{
                                        echo '<button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="'.$carousel.'" aria-label="Slide '.$carousel++.'"></button>';
                                    }
                                    $carousel++;
                                }
                                echo '
                                </div>
                                <div class="carousel-inner">
                                ';
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
                            <!-- <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/slide-0.png" class="d-block pb-2 w-100">
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
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- redeem scan area -->
    <section class="bg-dark p-5 text-center text-sm-start">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md text-md-start">
                <div class="text-light">
                    <div class="h1 mb-2">
                        <i class="bi bi-cart"></i>
                    </div>
                    <h2>REDEEM <span class="text-warning">ITEM</span></h2>
                    <p class="lead my-4">
                         As a help to the environment while having the CICT community to participate and take part. 
                         This is BCASH, you can redeem here your points earned from recyling of bottles. 
                         Wizards let's help to reduce littering inside the campus and help the environment through recycling.
                    </p>
                    <!-- redeem scan button -->
                    <a href="redeem_scan.php" class="btn btn-secondary btn-lg mb-4">Choose Redeemable Item</a>
                </div>
            </div>
            <!-- redeemable items carousel area -->
            <div class="col-md text-center">
                <div class="card bg-light cardadmin2 p-3">
                    <div class="h1 mt-2">
                        <i class="bi bi-bag-check"></i>
                    </div>
                    <h3 class="card-title mb-2">
                        Redeemable Items
                    </h3>
                    <div class="card-text">
                        <div id="carouselitem" class="carousel carousel-dark slide" data-bs-ride="carousel">
                        <?php
                            $records = $mydb->get_Shop_items();
                            $count = 0;
                            if(isset($records)){
                                $carousel = 0;
                                echo '
                                <div class="carousel-indicators">
                                ';
                                foreach($records as $rows){
                                    if($carousel == 0){
                                        echo '
                                        <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        ';
                                    }
                                    else{
                                        echo '
                                        <button type="button" data-bs-target="#carouselbottle" data-bs-slide-to="'.$carousel.'" aria-label="Slide '.$carousel++.'"></button>
                                        ';
                                    }
                                    $carousel++;
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
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselitem" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselitem" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                                ';
                            }
                        ?>
                            <!-- <div class="carousel-indicators">
                                <button type="button" data-bs-target="#carouselitem" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#carouselitem" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#carouselitem" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                <button type="button" data-bs-target="#carouselitem" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            </div>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/print.png" class="d-block pb-2 w-100">
                                    <div class="bg-light p-5">
                                        <div class="carousel-caption">
                                            <h5>[Type of Redeemable Item]</h5>
                                            <p>[Redeemable Item Description]</p>
                                        </div>  
                                    </div>
                                </div>
                                
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselitem" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselitem" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>