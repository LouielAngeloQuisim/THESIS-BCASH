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

    <section class=" bg-dark p-5">
        <div class="container">
            <h1 class="text-light text-center">
                List of Bottles
            </h1>
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
                <div class="col-md">
                    <div class="card h-100">
                        <img src="img/slide-0.PNG" class="card-img-top" alt="Water Bottle">
                        <div class="card-body">
                            <h5 class="card-title">[Bottle Type]</h5>
                            <p class="card-text">[Bottle measurements and bottle currency]</p>
                            <!-- Button Edit Bottle trigger modal -->
                            <button type="button" class="btn btn-secondary btn-lg editbtn" data-bs-toggle="modal" data-bs-target="#modaleditBottle">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card h-100">
                        <img src="img/slide-1.PNG" class="card-img-top" alt="Water Bottle">
                        <div class="card-body">
                            <h5 class="card-title">[Bottle Type]</h5>
                            <p class="card-text">[Bottle measurements and bottle currency]</p>
                            <!-- Button Edit Bottle trigger modal -->
                            <button type="button" class="btn btn-secondary btn-lg editbtn" data-bs-toggle="modal" data-bs-target="#modaleditBottle">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card h-100">
                        <img src="img/slide-2.PNG" class="card-img-top" alt="Water Bottle">
                        <div class="card-body">
                            <h5 class="card-title">[Bottle Type]</h5>
                            <p class="card-text">[Bottle measurements and bottle currency]</p>
                            <!-- Button Edit Bottle trigger modal -->
                            <button type="button" class="btn btn-secondary btn-lg editbtn" data-bs-toggle="modal" data-bs-target="#modaleditBottle">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-md">
                    <div class="card h-100">
                        <img src="img/slide-3.PNG" class="card-img-top" alt="Water Bottle">
                        <div class="card-body">
                            <h5 class="card-title">[Bottle Type]</h5>
                            <p class="card-text">[Bottle measurements and bottle currency]</p>
                            <!-- Button Edit Bottle trigger modal -->
                            <button type="button" class="btn btn-secondary btn-lg editbtn" data-bs-toggle="modal" data-bs-target="#modaleditBottle">
                                Edit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Add Bottle -->
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
                        <input class="form-control" type="file" id="addBottleFile">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-1" id="btype" placeholder="Enter Bottle Type" name="btype" value="[Bottle Type]">
                        <label for="btype" required>Bottle Type</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-1" id="bsize" placeholder="Enter Bottle Size" name="bsize" value="[Bottle Size]">
                        <label for="bsize" required>Bottle Size</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="peso" class="form-control rounded-1" id="bcurrency" placeholder="Enter Bottle Currency" name="bcurrency" value="[999.999]">
                        <label for="bcurrency" required>Bottle Currency</label>
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

    <!-- Modal Add Bottle Confirmation -->
    <div class="modal fade" id="modalAddBConfirm" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddBConfirm">Add Bottle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure to add this Bottle?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-secondary">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Bottle Edit-->
    <div class="modal fade" id="modaleditBottle" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modaleditBottle">Bottle Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="editBottleFile" class="form-label">Change Image</label>
                        <input class="form-control" type="file" id="editBottleFile">
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-1" id="btype" placeholder="Enter Bottle Type" name="btype" value="[Bottle Type]">
                        <label for="btype" required>Bottle Type</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control rounded-1" id="bsize" placeholder="Enter Bottle Size" name="bsize" value="[Bottle Size]">
                        <label for="bsize" required>Bottle Size</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="peso" class="form-control rounded-1" id="bcurrency" placeholder="Enter Bottle Currency" name="bcurrency" value="[999.999]">
                        <label for="bcurrency" required>Bottle Currency</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- Button Edit Bottle Save Changes trigger modal -->
                    <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modalEditBSaveChanges">
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Edit Bottle Save Changes -->
    <div class="modal fade" id="modalEditBSaveChanges" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditBSaveChanges">Bottle Edit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Are you sure to Save Changes to this Bottle?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-secondary">Confirm</button>
                </div>
            </div>
        </div>
    </div>

    <!-- black line -->
    <section class="bg-primary d-none d-sm-block p-3">
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>