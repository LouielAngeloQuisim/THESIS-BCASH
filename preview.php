<!doctype html>
<html lang="en">
  <head>
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
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3">
        <div class="container">
            <a href="#" class="navbar-brand fw-bold">BCASH</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="dash_admin.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="redeem_report.php" class="nav-link">Redeem Reports</a>
                    </li>
                    <li class="nav-item">
                        <a href="transac_admin_recycle.php" class="nav-link">Transactions</a>
                    </li>
                    <li class="nav-item">
                        <a href="bottlelist.php" class="nav-link">Bottles List</a>
                    </li>
                    <li class="nav-item">
                        <a href="itemlist.php" class="nav-link">Item List</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- recycle transactions header  -->
    <section class=" bg-dark p-5">
        <div class="container">
            <h1 class="text-light text-center">
                Here's your Report
            </h1>
        </div>
    </section>

    <!-- Records  -->
    <section class="p-5">
        <div class="container text-center">
            <div class="content3">
                <div class="scroll">
                    <h1>
                        Recycle Records
                    </h1>
                    <table class="table table-striped table3">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Earned points</th>
                                <th scope="col">Time</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <tr>
                                <td>Arvin Jay P. De Guzman</td>
                                <td>1.00</td>
                                <td>4:05pm</td>
                                <td>12/03/2021</td>
                            </tr>
                            <tr>
                                <td>[Name]</td>
                                <td>[Earned points]</td>
                                <td>[Time]</td>
                                <td>[Date]</td>
                            </tr>
                            <tr>
                                <td>[Name]</td>
                                <td>[Earned points]</td>
                                <td>[Time]</td>
                                <td>[Date]</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="content3 my-3">
                <div class="scroll">
                    <h1>
                        Redeem Records
                    </h1>
                    <table class="table table-striped table3">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Redeem</th>
                                <th scope="col">Price</th>
                                <th scope="col">Time</th>
                                <th scope="col">Date</th>
                            </tr>
                        </thead>
                        <tbody class="align-middle">
                            <tr>
                                <td>Arvin Jay P. De Guzman</td>
                                <td>Ballpen</td>
                                <td>1.00</td>
                                <td>4:20pm</td>
                                <td>12/03/2021</td>
                            </tr>
                            <tr>
                                <td>[Name]</td>
                                <td>[Redeem]</td>
                                <td>[Price]</td>
                                <td>[Time]</td>
                                <td>[Date]</td>
                            </tr>
                            <tr>
                                <td>[Name]</td>
                                <td>[Redeem]</td>
                                <td>[Price]</td>
                                <td>[Time]</td>
                                <td>[Date]</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <!-- Button Cancel trigger modal -->
                <button type="button" class="btn btn-secondary me-md-2" data-bs-toggle="modal" data-bs-target="#modalCancel">
                    Cancel
                </button>
                <a href="generatepdf.php" class="btn btn-secondary">Continue</a>
            </div>
        </div>
    </section>

    <!-- Modal Cancel -->
    <div class="modal fade modalpopup" id="modalCancel" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCancel">Cancel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        Are you sure to Cancel this Report?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </button>
                    <a href="transac_admin_recycle.php" class="btn btn-secondary btn-md addbtn" id="confirm">
                        Confirm
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- black line -->
    <section class="bg-primary p-3">
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>