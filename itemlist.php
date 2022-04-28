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
    header("Location: login.php?usernotfound=1");
}
?>
<!doctype html>
<html lang="en">
  <head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.js"></script> -->
    
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

    <!-- list of items header with add button-->
    <section class=" bg-dark p-5">
        <div class="container">
            <div class="h1 text-white text-center">
                <i class="bi bi-card-list"></i>
            </div>
            <h2 class="text-light text-center">
                LIST OF ITEMS
            </h2>
            <p class="lead text-center">
                <!-- Button Add Item trigger modal -->
                <button type="button" class="btn btn-secondary btn-lg addbtn" data-bs-toggle="modal" data-bs-target="#modaladdItem">
                    Add item
                </button>
            </p>
        </div>
    </section>

    <section class="p-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-4 text-center g-4">
            <?php
                $records = $mydb->get_Shop_items();
                if(isset($records)){
                    foreach($records as $rows){
                        $item_id = $rows['item_id'];
                        $modalname = "modaleditBottle".$item_id;
                        $item_name = $rows['item_name'];
                        $item_price = $rows['item_price'];
                        $item_stock = $rows['item_stock'];
                        $item_img = $rows['item_img'];
                        // show bottle
                        echo '
                        <div class="col-md">
                            <div class="card h-100 border border-2 border-primary">
                                <img src="upload_img/'.$item_img.'" class="card-img-top" alt="Print">
                                <div class="card-body">
                                    <h5 class="card-title">'.$item_name.'</h5>
                                    <p class="card-text">Price: '.$item_price.'</p> 
                                    <button type="button" class="btn btn-secondary btn-lg editbtn" data-bs-toggle="modal" data-bs-target="#'.$modalname.'">
                                        Edit
                                    </button>
                                </div>
                            </div>
                        </div>
                        ';
                    }
                }
            ?>
            </div>
        </div>
    </section>

    <!-- Modal Add Item -->
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modaladdItem" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaladdItem">Add Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addBottleFile" class="form-label">Add Image</label>
                        <input class="form-control" type="file" id="item_file" onkeyup='add_items();' name = "image">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-1" id="item_name" onkeyup='add_items();' placeholder="Enter Bottle Type" name="item_name">
                        <label for="btype" required>Item Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-1" id="item_value" onkeyup='add_items();' placeholder="Enter Bottle Size" name="item_price">
                        <label for="bsize" required>Item Price</label>
                    </div>
                    <!-- item stock hidden and value was 0 -->
                    <div class="form-floating mb-3">
                        <input type="number" step="any" class="form-control rounded-1" id="item_stock" placeholder="Enter Bottle Currency" name="item_stock" hidden>
                        <label for="bcurrency" required hidden>Item Stock</label>
                    </div>
                    <span id='message'></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- Button Add Confirmation trigger modal -->
                    <button type="button" class="btn btn-secondary" id="item_add" data-bs-toggle="modal" data-bs-target="#modalAddBConfirm" disabled>
                        Add Item
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Add Bottle Confirmation -->
    <div class="modal fade" id="modalAddBConfirm" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddBConfirm">Add Item</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body fw-bolder">
                    Are you sure to add this Item?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-secondary" name="submititem">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- Modal Item Edit-->
    <?php
        $records = $mydb->get_Shop_items();
        if(isset($records)){
            foreach($records as $rows){
                $item_id = $rows['item_id'];
                $modalname = "modaleditBottle".$item_id;
                $modalsavename = "modalEditISaveChanges".$item_id;
                $item_name = $rows['item_name'];
                $item_price = $rows['item_price'];
                $item_stock = $rows['item_stock'];
                $item_img = $rows['item_img'];
                $edit_items = "edit_items".$item_id;
                // show bottle
                echo '
                <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="'.$modalname.'" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modaleditItem">Item Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-1" id="itype" placeholder="Enter Item Type" name="item_name" value="'.$item_name.'" required hidden>
                                    <label for="btype" required hidden>Item Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="number" step="any" class="form-control rounded-1" id="iprize'.$item_id.'" onkeyup="'.$edit_items.'();" placeholder="Enter new item price" name="item_price" required>
                                    <label for="iprice">Item Price</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-1" id="idisc" placeholder="Enter Item Description" name="item_stock" value="'.$item_stock.'" required hidden>
                                    <label for="idisc" hidden>Item Stock</label>
                                    <input type="hidden" name="item_id" value="'.$item_id.'">
                                </div>
                            </div>
                            <span id="emessage'.$item_id.'"></span>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- Button Edit Item Save Changes trigger modal -->
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" id="id'.$modalsavename.'" data-bs-target="#'.$modalsavename.'" disabled>
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Edit Item Save Changes -->
                <div class="modal fade" id="'.$modalsavename.'" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="'.$modalsavename.'">Bottle Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body fw-bolder">
                                Are you sure to Save Changes to this Item?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-secondary" name = "itemedit">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
                <script>
                    var '.$edit_items.' = function(){
                        // var bname = document.getElementById("btype").value;
                        // var bsize = document.getElementById("size").value;
                        // var bcurr = document.getElementById("bcurrency").value;
                        // bname  == "" && bsize  == "" && bcurr  == ""
                        if (document.getElementById("iprize'.$item_id.'").value != ""){
                            document.getElementById("emessage'.$item_id.'").style.color = "green";
                            document.getElementById("emessage'.$item_id.'").innerHTML = "Forms completed!";
                            document.getElementById("id'.$modalsavename.'").disabled = false;
                        }else {
                            document.getElementById("emessage'.$item_id.'").style.color = "red";
                            document.getElementById("emessage'.$item_id.'").innerHTML = "Please fill up all fields";
                            document.getElementById("id'.$modalsavename.'").disabled = true;
                        }
                    }
                </script>
                ';
            }
        }
    ?>
    
    <!-- lines -->
    
    <script>
        var add_items = function(){
            // bname  == "" && bsize  == "" && bcurr  == ""
            if (document.getElementById('item_file').value != "" &&
                document.getElementById('item_name').value != "" &&
                document.getElementById('item_value').value != "" 
                
            ){
                document.getElementById('message').style.color = 'green';
                document.getElementById('message').innerHTML = 'Forms completed!';
                document.getElementById('item_add').disabled = false;
            }else {
                document.getElementById('message').style.color = 'red';
                document.getElementById('message').innerHTML = "Please fill up all fields";
                document.getElementById('item_add').disabled = true;
            }
        }
    </script>
    <section class="bg-dark p-5">
    </section>
    <section class="bg-primary p-3">
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>