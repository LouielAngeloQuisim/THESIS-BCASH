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
    
    <!-- recycle qr scanner area -->
    <section class="bg-dark p-5 text-center text-sm-start">
        <div class="container">
            <div class="card bg-light text-center text-fontdark p-3">
                <div class="h1">
                    <i class="bi bi-columns-gap"></i>
                </div>
                <h3 class="card-title mb-3">
                    Recycle QR Scan
                </h3>
                <p class="card-text lead">
                    <!-- dito lilitaw yung scanner -->
                    <!-- (kunwari nascan na at nadetect) Recycle Pop up trigger modal -->
                    <button type="button" class="btn btn-secondary btn-lg scanbtn" data-bs-toggle="modal" data-bs-target="#modalrecyclepopup">
                        Kunwari eto yung nascan at nadetect na
                    </button>
                </p>
            </div>
        </div>
    </section>

    <!-- Modal RRecycle Pop up -->
    <div class="modal fade" id="modalrecyclepopup" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalrecyclepopup">Claim Points</h5>
                    <!-- Cancel Confirm trigger modal -->
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#modalcancelconfirm">
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="h1 text-success">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <p class="text-fondark fw-bolder">
                        Points transferred succesfully
                    </p>
                </div>
                <div class="modal-footer">
                    <!-- Cancel Confirm trigger modal -->
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalcancelconfirm">
                        Cancel
                    </button>
                    <a href="dash_shop.php" class="btn btn-secondary">End Transaction</a>
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
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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

    <section class="bg-primary p-3"></section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>