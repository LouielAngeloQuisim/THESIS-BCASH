<!doctype html>
<html lang="en">
  <head>
    <!-- javascripts for qrcode scanner -->
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script type="text/javascript" scr="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
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
        $lack_points = "false";
        if(isset($_GET['itemid'])){
            $item_id = $_GET['itemid'];
        }
        else{
            header("Location: redeem_scan.php?itemnotfound=1");
        }
        if(isset($_POST['redeem_submit'])){
            $user_id = $_POST['user_id'];
            $result = $mydb->minus_Points($user_id, $item_id);
            if($result == "updated"){
                echo '
                <script>
                    $(document).ready(function(){
                        $("#modalyesconfirm").modal("show");
                    });
                </script>
                ';
            }
            elseif($result == "not enough points"){
                $lack_points = "true";
                echo '
                <script>
                    $(document).ready(function(){
                        $("#modalredeempopup").modal("show");
                    });
                </script>
                ';
            }
        }
    ?>
    <!-- redeem scanning are -->
    <form action="" method="post">
    <section class="bg-dark p-5 text-center text-sm-start">
        <div class="container">
            <div class="card bg-light text-center text-fontdark p-3">
                <div class="h1">
                    <i class="bi bi-columns-gap"></i>
                </div>
                <h3 class="card-title mb-3">
                    <?php
                        $records = $mydb->get_Item($item_id);
                        if(isset($records)){
                            foreach($records as $rows){
                                echo $rows['item_name'];
                            }
                        }
                    ?>
                    <video id="preview" width="100%"></video>
                    <input type="text" name="user_id" id="text" placeholder="qrcode value" hidden>
                </h3>
                <p class="card-text lead">
                    <!-- dito lilitaw yung scanner -->
                    <!-- (kunwari nascan na at nadetect) Redeem Pop up trigger modal -->
                    <!-- <button type="button" class="btn btn-secondary btn-lg scanbtn" data-bs-toggle="modal" data-bs-target="#modalredeempopup">
                        Kunwari eto yung nascan at nadetect na
                    </button> -->
                </p>
            </div> 
        </div>
        
    </section>

    <!-- Modal Redeem Pop up -->
    <div class="modal fade" id="modalredeempopup" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <?php
                if($lack_points == "false"){
                    echo '
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalredeempopup">Redeem Item</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="h1 text-danger">
                                    <i class="bi bi-exclamation-circle"></i>
                                </div>
                                <p class="text-fondark fw-bolder">
                                    Are you sure you want to continue this transaction?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <a href="redeem_scan.php" class="btn btn-secondary">No</a>
                                <!-- Yes Confirm trigger modal -->
                                <button type="submit" class="btn btn-secondary" name="redeem_submit">
                                    Yes
                                </button>
                                <!-- <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalyesconfirm">
                                    Yes
                                </button> -->
                            </div>
                        </div>
                    ';
                }
                elseif($lack_points == "true"){
                    echo '
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalredeempopup">Redeem Error</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body text-center">
                                <div class="h1 text-danger">
                                    <i class="bi bi-exclamation-circle"></i>
                                </div>
                                <p class="text-fondark">
                                    Insufficient Points! Want to scan again?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalcancelconfirm">
                                    Cancel
                                </button>
                                <a href="redeeming.php?itemid='.$item_id.'" class="btn btn-secondary">Yes</a>
                            </div>
                        </div>
                    ';
                    $lack_points = "false";
                }
            ?>
            </form>
            <!-- eto kapag kulang points ni user
            
            -->
        </div>
    </div>

    <!-- Modal Yes Confirm -->
    <div class="modal fade" id="modalyesconfirm" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalYesconfirm">Redeem Item</h5>
                    <!-- Cancel Confirm trigger modal -->
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#modalcancelconfirm">
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="h1 text-success">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <p class="text-fondark fw-bolder">
                        Succesfully Redeemed!
                    </p>
                </div>
                <div class="modal-footer">
                    <a href="redeem_scan.php" class="btn btn-secondary">Continue</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Cancel Confirm -->
    <div class="modal fade" id="modalcancelconfirm" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalcancelconfirm">Cancel Transaction</h5>
                    <!-- Cancel Confirm trigger modal -->
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#modalcancelconfirm">
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="h1 text-danger">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <p class="text-fondark fw-bolder">
                        Are you sure to cancel your transaction?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <a href="dash_shop.php" class="btn btn-secondary">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <!-- line -->
    <section class="bg-primary p-3"></section>
    <script>
        // code to use camera and scan qr codes
        let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
        Instascan.Camera.getCameras().then(function(cameras){
            if(cameras.lenght = 1){
                scanner.start(cameras[0]);
            }
            else{
                alert("No cameras found/permitted");
            }
        }).catch(function(e){
            console.error(e);
        });

        scanner.addListener('scan',function(content){
            document.getElementById('text').value = content;
            $(document).ready(function(){
                $('#modalredeempopup').modal('show');
            });
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>