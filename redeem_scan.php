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
    ?>

    <!-- Redeemable Item Area -->
    <section class="bg-dark p-5 text-center text-sm-start">
        <div class="container">
            <div class="h1 text-white text-center">
                <i class="bi bi-bag-check"></i>
            </div>
            <h1 class="text-light text-center mb-4">
                Redeem
            </h1>
            <!-- Redeemable Item Cards -->
            <div class="row row-cols-1 row-cols-md-4 text-center g-4">
                <?php
                    require 'mydb.php';
                    $mydb = new myDb;
                    $item_list = $mydb->get_Shop_items();
                    if(isset($item_list) && !empty($item_list)){
                        foreach($item_list as $rows){
                            $item_id = $rows['item_id'];
                            $modalname = "modaleditBottle".$item_id;
                            $modalsavename = "modalEditISaveChanges".$item_id;
                            $item_name = $rows['item_name'];
                            $item_price = $rows['item_price'];
                            $item_stock = $rows['item_stock'];
                            $item_img = $rows['item_img'];
                            echo '
                                <div class="col-md">
                                    <div class="card h-100">
                                        <img src="upload_img/'.$item_img.'" class="card-img-top" alt="Print">
                                        <div class="card-body">
                                            <h5 class="card-title">'.$item_name.'</h5>
                                            <p class="card-text">'.$item_price.'</p>
                                            <!-- redeem button -->
                                            <a href="redeeming.php?itemid='.$item_id.'" class="btn btn-secondary btn-lg editbtn">Redeem</a>
                                        </div>
                                    </div>
                                </div>
                            ';
                        }
                    }  
                    else{
                        echo "There are no items yet available in the shop";
                    }
                ?>
                <!-- card 1 -->
                <!-- <div class="col-md">
                    <div class="card h-100">
                        <img src="img/print.PNG" class="card-img-top" alt="Print">
                        <div class="card-body">
                            <h5 class="card-title">[Item Type]</h5>
                            <p class="card-text">[Item price and description]</p> -->
                            <!-- redeem button -->
                            <!-- <a href="redeeming.php" class="btn btn-secondary btn-lg editbtn">Redeem</a>
                        </div>
                    </div>
                </div> -->
                
            </div>
        </div>
    </section>

    <!-- line -->
    <section class="bg-primary p-3"></section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>