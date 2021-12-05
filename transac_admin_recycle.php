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
            <a href="transac_admin_recycle.php" class="navbar-brand fw-bold">BCASH</a>

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
                        <!-- logout trigger modal -->
                        <a href="login.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modallogout">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal logout -->
    <div class="modal fade" id="modallogout" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modallogout">Logout Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                    </button>
                </div>
                <div class="modal-body text-center">
                    <div class="h1 text-danger">
                        <i class="bi bi-exclamation-circle"></i>
                    </div>
                    <p class="text-fondark">
                        Are you sure to Logout?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>
                    <a href="login.php" class="btn btn-secondary">Confirm</a>
                </div>
            </div>
        </div>
    </div>

    <!-- transactions header  -->
    <section class=" bg-dark p-5">
        <div class="container text-center">
            <div class="h1 text-white">
                <i class="bi bi-card-text"></i>
            </div>
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

    <!-- Recycle transactions area -->
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
                    <div class="h2">
                        <i class="bi bi-trash"></i>
                    </div>
                    <h5 class="card-title">Recycle Transactions</h5>
                    <p class="lead text-center">
                        <!-- Button Generate Recycle trigger modal -->
                        <button type="button" class="btn btn-secondary btn-sm addbtn" data-bs-toggle="modal" data-bs-target="#modalgenRepRecycle">
                            Generate Recycle Reports
                        </button>
                    </p>
                    <!-- user all recycle records -->
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

    <!-- Modal Generate All -->
    <div class="modal fade modalpopup" id="modalgenRepAll" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalgenRepAll">Generate All</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="row row-cols-1 row-cols-md-2 text-center">
                        <div class="col text-start py-3">
                            <!-- eto kapag na oon yung switch tapos (kapaag eto nakaon madidisable na yung the rest kase priprint niya all ehh) -->
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="optionswitch" checked>
                                <label class="form-check-label ms-2" for="optionswitch">
                                    Generate All
                                </label>
                            </div>
                            <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos (kapag nakapamili sa iba like lname chuchu dapat disable na agad to)
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="optionswitch" disable>
                                <label class="form-check-label ms-2" for="optionswitch">
                                    Generate All
                                </label>
                            </div>
                            -->
                        </div>
                        <div class="col">
                            <!-- eto kapag na oon yung switch tapos -->
                            <div class="form-check form-switch">
                                <input class="form-check-input switchbtn" type="checkbox" id="lnameswitch" checked>
                                <label class="form-check-label" for="lnameswitch">
                                    <div class="form-floating">
                                        <input type="text" class="form-control tfield" id="lname" placeholder="Enter Last Name">
                                        <label for="lname">Last Name</label>
                                    </div>
                                </label>
                            </div>
                            <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                            <div class="form-check form-switch">
                                <input class="form-check-input switchbtn" type="checkbox" id="lnameswitch" disable>
                                <label class="form-check-label" for="lnameswitch">
                                    <div class="form-floating">
                                        <input type="text" class="form-control tfield" id="lname" placeholder="Enter Last Name">
                                        <label for="lname">Last Name</label>
                                    </div>
                                </label>
                            </div>
                            -->
                        </div>
                        <div class="col">
                            <!-- eto kapag na oon yung switch tapos -->
                            <div class="form-check form-switch">
                                <input class="form-check-input switchbtn" type="checkbox" id="fnameswitch" checked>
                                <label class="form-check-label" for="fnamewitch">
                                    <div class="form-floating">
                                        <input type="text" class="form-control tfield" id="fname" placeholder="Enter First Name">
                                        <label for="fname">First Name</label>
                                    </div>
                                </label>
                            </div>
                            <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                            <div class="form-check form-switch">
                                <input class="form-check-input switchbtn" type="checkbox" id="fnameswitch" disable>
                                <label class="form-check-label" for="fnameswitch">
                                    <div class="form-floating">
                                        <input type="text" class="form-control tfield" id="fname" placeholder="Enter First Name">
                                        <label for="fname">First Name</label>
                                    </div>
                                </label>
                            </div>
                            -->
                        </div>
                        <div class="col">
                            <!-- eto kapag na oon yung switch tapos -->
                            <div class="form-check form-switch">
                                <input class="form-check-input switchbtn" type="checkbox" id="mnameswitch" checked>
                                <label class="form-check-label" for="mnameswitch">
                                    <div class="form-floating">
                                        <input type="text" class="form-control tfield" id="mname" placeholder="Enter Middle Name">
                                        <label for="mname">Middle Name</label>
                                    </div>
                                </label>
                            </div>
                            <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                            <div class="form-check form-switch">
                                <input class="form-check-input switchbtn" type="checkbox" id="mnameswitch" disable>
                                <label class="form-check-label" for="mnameswitch">
                                    <div class="form-floating">
                                        <input type="text" class="form-control tfield" id="mname" placeholder="Enter Middle Name">
                                        <label for="mname">Middle Name</label>
                                    </div>
                                </label>
                            </div>
                            -->
                        </div>
                    </div>
                    <div class="col">
                        <!-- eto kapag na oon yung switch tapos -->
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="timeswitch" checked>
                            <label class="form-check-label" for="timeswitch">
                                <div class="input-group inputtg">
                                    <input type="time" class="form-control" id="mintime">
                                    <span class="input-group-text">to</span>
                                    <input type="time" class="form-control" id="maxtime">
                                </div>
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                        <div class="form-check form-switch">
                            <input class="form-check-input switchbtn" type="checkbox" id="mnameswitch" disable>
                            <label class="form-check-label" for="mnameswitch">
                                <div class="input-group inputg">
                                    <input type="time" class="form-control" id="mintime">
                                    <span class="input-group-text">to</span>
                                    <input type="time" class="form-control" id="maxtime">
                                </div>
                            </label>
                        </div>
                        -->
                    </div>
                    <div class="col">
                        <!-- eto kapag na oon yung switch tapos -->
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="dateswitch" checked>
                             <label class="form-check-label" for="dateswitch">
                                <div class="input-group inputdg">
                                    <input type="date" class="form-control" id="mindate">
                                    <span class="input-group-text">to</span>
                                    <input type="date" class="form-control" id="maxdate">
                                </div>
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                        <div class="form-check form-switch">
                            <input class="form-check-input switchbtn" type="checkbox" id="mnameswitch" disable>
                            <label class="form-check-label" for="mnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield" id="mname" placeholder="Enter Middle Name">
                                    <label for="mname">Middle Name</label>
                                </div>
                            </label>
                        </div>
                        -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- Button Generate Confirm trigger modal -->
                    <button type="button" class="btn btn-secondary btn-md addbtn" data-bs-toggle="modal" data-bs-target="#modalgenAllConfirm">
                        Generate
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Generate All Confirm -->
    <div class="modal fade modalpopup" id="modalgenAllConfirm" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalgenAllConfirm">Generate All Reports</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        Are you sure to Generate All Reports?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="preview.php" class="btn btn-secondary btn-md addbtn" id="confirm">
                        Confirm
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Generate Recycle -->
    <div class="modal fade modalpopup" id="modalgenRepRecycle" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalgenRepRecycle">Generate Recycle Reports</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="col text-start py-3">
                        <!-- eto kapag na oon yung switch tapos (kapaag eto nakaon madidisable na yung the rest kase priprint niya all ehh) -->
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="optionswitch" checked>
                            <label class="form-check-label ms-2" for="optionswitch">
                                Generate All
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos (kapag nakapamili sa iba like lname chuchu dapat disable na agad to)
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="optionswitch" disable>
                            <label class="form-check-label ms-2" for="optionswitch">
                                Generate All
                            </label>
                        </div>
                        -->
                    </div>
                    <div class="col">
                        <!-- eto kapag na oon yung switch tapos -->
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="lnameswitch" checked>
                            <label class="form-check-label" for="lnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="lname" placeholder="Enter Last Name">
                                    <label for="lname">Last Name</label>
                                </div>
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="lnameswitch" disable>
                            <label class="form-check-label" for="lnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="lname" placeholder="Enter Last Name">
                                    <label for="lname">Last Name</label>
                                </div>
                            </label>
                        </div>
                        -->
                    </div>
                    <div class="col">
                        <!-- eto kapag na oon yung switch tapos -->
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="fnameswitch" checked>
                            <label class="form-check-label" for="fnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="fname" placeholder="Enter First Name">
                                    <label for="fname">First Name</label>
                                </div>
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="fnameswitch" disable>
                            <label class="form-check-label" for="fnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="fname" placeholder="Enter First Name">
                                    <label for="fname">First Name</label>
                                </div>
                            </label>
                        </div>
                        -->
                    </div>
                    <div class="col">
                        <!-- eto kapag na oon yung switch tapos -->
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="mnameswitch" checked>
                            <label class="form-check-label" for="mnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="mname" placeholder="Enter Middle Name">
                                    <label for="mname">Middle Name</label>
                                </div>
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="mnameswitch" disable>
                            <label class="form-check-label" for="mnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield1" id="mname" placeholder="Enter Middle Name">
                                    <label for="mname">Middle Name</label>
                                </div>
                            </label>
                        </div>
                        -->
                    </div>
                    <div class="col">
                        <!-- eto kapag na oon yung switch tapos -->
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="epswitch" checked>
                            <label class="form-check-label" for="epswitch">
                                <div class="input-group inputtg1">
                                    <input type="double" class="form-control" id="minep" placeholder="Min Points">
                                    <span class="input-group-text">to</span>
                                    <input type="double" class="form-control" id="maxep" placeholder="Max Points">
                                </div>
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="epswitch" disable>
                            <label class="form-check-label" for="epswitch">
                                <div class="input-group inputg">
                                    <input type="double" class="form-control" id="minep" placeholder="Min Points">
                                    <span class="input-group-text">to</span>
                                    <input type="double" class="form-control" id="maxep" placeholder="Max Points">
                                </div>
                            </label>
                        </div>
                        -->
                    </div>
                    <div class="col">
                        <!-- eto kapag na oon yung switch tapos -->
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="timeswitch" checked>
                            <label class="form-check-label" for="timeswitch">
                                <div class="input-group inputtg1">
                                    <input type="time" class="form-control" id="mintime">
                                    <span class="input-group-text">to</span>
                                    <input type="time" class="form-control" id="maxtime">
                                </div>
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="timeswitch" checked>
                            <label class="form-check-label" for="timeswitch">
                                <div class="input-group inputtg">
                                    <input type="time" class="form-control" id="mintime">
                                    <span class="input-group-text">to</span>
                                    <input type="time" class="form-control" id="maxtime">
                                </div>
                            </label>
                        </div>
                        -->
                    </div>
                    <div class="col">
                        <!-- eto kapag na oon yung switch tapos -->
                        <div class="form-check form-switch">
                            <input class="form-check-input switchgbtn" type="checkbox" id="dateswitch" checked>
                             <label class="form-check-label" for="dateswitch">
                                <div class="input-group inputdg1">
                                    <input type="date" class="form-control" id="mindate">
                                    <span class="input-group-text">to</span>
                                    <input type="date" class="form-control" id="maxdate">
                                </div>
                            </label>
                        </div>
                        <!-- eto kapag na hindi nakaon yung switch at hindi mapindot yung input type tapos
                        <div class="form-check form-switch">
                            <input class="form-check-input switchbtn" type="checkbox" id="mnameswitch" disable>
                            <label class="form-check-label" for="mnameswitch">
                                <div class="form-floating">
                                    <input type="text" class="form-control tfield" id="mname" placeholder="Enter Middle Name">
                                    <label for="mname">Middle Name</label>
                                </div>
                            </label>
                        </div>
                        -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- Button Generate Confirm trigger modal -->
                    <button type="button" class="btn btn-secondary btn-md addbtn" data-bs-toggle="modal" data-bs-target="#modalgenRecConfirm">
                        Generate
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Generate Recycle Confirm -->
    <div class="modal fade modalpopup" id="modalgenRecConfirm" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalgenRecConfirm">Generate Recycle Report</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p class="lead">
                        Are you sure to Generate this Recycle Report?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="preview.php" class="btn btn-secondary btn-md addbtn" id="confirm">
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