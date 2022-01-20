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

    <!-- list of bottle header with add button-->
    <section class=" bg-dark p-5">
        <div class="container">
            <div class="h1 text-white text-center">
                <i class="bi bi-card-list"></i>
            </div>
            <h2 class="text-light text-center">
                LIST OF BOTTLES
            </h2>
            <p class="lead text-center">
                <!-- Button Add Bottle trigger modal -->
                <button type="button" class="btn btn-secondary btn-lg addbtn" data-bs-toggle="modal" data-bs-target="#modaladdBottle">
                    Add Bottle
                </button>
            </p>
        </div>
    </section>

    <section class="p-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-4 text-center g-4">
                <?php
                    $records = $mydb->get_Bottle();
                    if(isset($records)){
                        foreach($records as $rows){
                            $bid = $rows['bottle_id'];
                            $modalname = "modaleditBottle".$bid;
                            $bname = $rows['bottle_name'];
                            $bvalue = $rows['bottle_value'];
                            $bsize = $rows['bottle_size'];
                            $bimg = $rows['bottle_img'];
                            // show bottle
                            echo '
                            <div class="col-md">
                                <div class="card h-100 border border-2 border-primary">
                                    <img src="upload_img/'.$bimg.'" class="card-img-top" alt="Water Bottle">
                                    <div class="card-body">
                                    <h5 class="card-title" id="bname">'.$bname.'</h5>
                                    <p class="card-text" id="bvalue">Value: '.$bvalue.'
                                    <br> Size: '.$bsize.'</p>
                                    <button type="button" class="btn btn-secondary btn-lg editbtn" data-bs-toggle="modal" 
                                    data-bs-target="#'.$modalname.'" data-id="'.$bid.'">Edit
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

    <!-- Modal Add Bottle -->
    <form action="upload.php" method="post" enctype="multipart/form-data">
    <div class="modal fade" id="modaladdBottle" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaladdBottle">Add Bottle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="addBottleFile" class="form-label">Add Image</label>
                        <input class="form-control" type="file" id="addBottleFile" name = "image">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-1" id="btype" placeholder="Enter Bottle Type" name="btype">
                        <label for="btype" required>Bottle Name</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-1" id="bsize" placeholder="Enter Bottle Size" name="bsize">
                        <label for="bsize" required>Bottle Size</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="peso" class="form-control rounded-1" id="bcurrency" placeholder="Enter Bottle Price" name="bcurrency">
                        <label for="bcurrency" required>Bottle Value</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- Button Add Confirmation trigger modal -->
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalAddBConfirm">
                        Add Bottle
                    </button>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
       
    </script>
    <!-- Modal Add Bottle Confirmation -->
    <div class="modal fade" id="modalAddBConfirm" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddBConfirm">Add Bottle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body fw-bolder">
                    Are you sure to add this Bottle?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-secondary" name="submit">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    <!-- Modal Bottle Edit-->
    <?php
        $records = $mydb->get_Bottle();
        if(isset($records)){
            foreach($records as $rows){
                $bid = $rows['bottle_id'];
                $modalname = "modaleditBottle".$bid;
                $modalsavename = "modalEditBSaveChanges".$bid;
                $bname = $rows['bottle_name'];
                $bvalue = $rows['bottle_value'];
                $bsize = $rows['bottle_size'];
                $bimg = $rows['bottle_img'];
                // show bottle
                echo '
                <form action="upload.php" method="post" enctype="multipart/form-data">
                <div class="modal fade" id="'.$modalname.'" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modaleditBottle">Bottle Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="editBottleFile" class="form-label">Change Image</label>
                                    <input class="form-control" type="file" id="editBottleFile" name = "image" required>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-1" id="btype" placeholder="Enter Bottle Type" name="btype" 
                                    value="'.$bname.'" required>
                                    <label for="btype" >Bottle Name</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control rounded-1" id="bsize" placeholder="Enter Bottle Size" name="bsize"
                                    value="'.$bsize.'" required>
                                    <label for="bsize" >Bottle Size</label>
                                    <input type="hidden" name="bid" value="'.$bid.'">
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="peso" class="form-control rounded-1" id="bcurrency" placeholder="Enter Bottle Price" name="bcurrency"
                                    value="'.$bvalue.'" required>
                                    <label for="bcurrency" >Bottle Value</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <!-- Button Edit Bottle Save Changes trigger modal -->
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#'.$modalsavename.'">
                                    Save Changes
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal Edit Bottle Save Changes -->
                <div class="modal fade" id="'.$modalsavename.'" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalEditBSaveChanges">Bottle Edit</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body fw-bolder">
                                Are you sure to Save Changes to this Bottle?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-secondary" name="editsubmit">Confirm</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>  
                ';
            }
        }
    ?>
    <!-- lines -->
    <section class="bg-dark p-5">
    </section>
    <section class="bg-primary p-3">
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>