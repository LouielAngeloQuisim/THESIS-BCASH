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

    <!-- show case -->
    <section class="bg-primary text-light p-5 text-center">
        <div class="container">
            <div class="align-items-center">
                <div>
                    <div class="h1">
                        <i class="bi bi-bag-check"></i>
                    </div>
                    <h2>REDEEMABLE ITEMS</h2>
                    <p class="lead">
                        Here are the following redeemable items that you can redeem using your earned points.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-dark p-4"></section>
    
    <section class="p-5">
        <div class="container">
            <div class="row text-center g-4">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $shop_records = $mydb->get_Shop_items();
                            if(isset($shop_records)){
                                foreach($shop_records as $rows){
                                    $item_name = $rows['item_name'];
                                    $item_price = $rows['item_price'];
                                    echo '<tr>';
                                    echo '<td>'.$item_name.'</td>';
                                    echo '<td>'.$item_price.'</td>';
                                    echo '</tr>';
                                }
                            }
                            else{
                                echo '<tr>';
                                echo '<td colspan="2">There are no items available to the shop yet.</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>    
            </div>
        </div>
    </section>

    <section class="bg-secondary p-3"></section>

    <script src="./src/bootstrap-input-spinner.js"></script>
    <script>
        $('input[type=number]').inputSpinner();
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>