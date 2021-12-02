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

    <!-- transactions header  -->
    <section class=" bg-dark p-5">
        <div class="container">
            <h1 class="text-light text-center">
                Transactions
            </h1>
            <p class="lead text-center">
                <!-- Button Generate All trigger modal -->
                <button type="button" class="btn btn-secondary btn-md addbtn" data-bs-toggle="modal" data-bs-target="#modalgenRepAll">
                    Generate All Reports
                </button>
            </p>
        </div>
    </section>

    <!-- Recycle transactions  -->
    <section class="p-5">
        <div class="container">
            <div class="card text-center">
                <div class="card-header">
                    <ul class="nav nav-tabs card-header-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" href="transac_admin_recycle.php">Recycle Tab</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="transac_admin_redeem.php">Redeem Tab</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body px-0">
                    <h5 class="card-title">Recycle Transactions</h5>
                    <p class="lead text-center">
                        <!-- Button Generate Recycle trigger modal -->
                        <button type="button" class="btn btn-secondary btn-sm addbtn" data-bs-toggle="modal" data-bs-target="#modalgenRepRecycle">
                            Generate Recycle Reports
                        </button>
                    </p>
                    <p class="card-text">
                        <div class="infocontent">
                            <div class="scroll">
                                <table class="table table-striped">
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
                                            <td>9:00am</td>
                                            <td>12/02/2021</td>
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
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- black line -->
    <section class="bg-primary p-3">
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>