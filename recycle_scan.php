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
                        <a href="dash_shop.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- recycle scanning area -->
    <section class="bg-primary p-5 text-center text-sm-start">
        <div class="container">
            <div class="card bg-light text-center text-fontdark p-3">
                <div class="h1">
                    <i class="bi bi-trash"></i>
                </div>
                <h3 class="card-title mb-3">
                    Recycle
                </h3>
                <p class="card-text lead">
                    <!-- dito lilitaw yung scanner -->
                    <!-- (kunwari nascan na at nadetect) Pop up trigger modal -->
                    <button type="button" class="btn btn-secondary btn-lg scanbtn" data-bs-toggle="modal" data-bs-target="#modalpopup">
                        Kunwari eto yung nascan at nadetect na
                    </button>
                </p>
            </div>
        </div>
    </section>

    <!-- Modal Pop up -->
    <div class="modal fade" id="modalpopup" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalpopup">Bottle Recycle</h5>
                    <!-- Cancel Confirm trigger modal -->
                    <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#modalcancelconfirm">
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="h1 text-success">
                        <i class="bi bi-check-circle"></i>
                    </div>
                    <p class="text-fondark">
                        Bottle Successfully Scanned!
                    </p>
                </div>
                <div class="modal-footer">
                    <!-- Cancel Confirm trigger modal -->
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalcancelconfirm">
                        Cancel
                    </button>
                    <a href="recycle_scan.php" class="btn btn-secondary">Next Bottle</a>
                    <!-- Continue Transaction Confirmation trigger modal -->
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalcontransacConf">
                        Continue Transaction
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Continue Transaction Confirmation -->
    <div class="modal fade" id="modalcontransacConf" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalcontransacConf">Continue Transaction Confirmation</h5>
                    <!-- Cancel Confirm trigger modal -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div class="h1 text-danger">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <p class="text-fondark">
                        Are you want to continue to Qr Code scanning?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <a href="recycling.php" class="btn btn-secondary">Confirm</a>
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
                    <p class="text-fondark">
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

    <section class="bg-dark p-3"></section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>