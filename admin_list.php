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

    <!-- List of User Header  --> 
    <section class=" bg-dark p-5">
        <div class="container text-center">
            <div class="h1 text-white">
                <i class="bi bi-person-lines-fill"></i>
            </div>
            <h2 class="text-light text-center mb-3">
                LIST OF ADMIN
            </h2>
            <p class="lead text-center">
                <!-- Button Add Admin trigger modal -->
                <button type="button" class="btn btn-secondary btn-md addbtn" data-bs-toggle="modal" data-bs-target="#modaladdAdmin">
                  Add Admin
                </button>
            </p>
        </div>
    </section>

    <!-- List of User Table -->
    <section class="p-5">
        <div class="container">
            <div class="card text-center">
                <div class="card-body">
                    <!-- All of Users that are Registered -->
                    <p class="card-text">
                        <div class="infocontent">
                            <div class="scroll">
                                <table class="table table-striped">
                                    <thead>
                                      <tr>
                                        <th scope="col">Username</th>
                                        <th scope="col">Password</th>
                                        <th scope="col"></th>
                                      </tr>
                                    </thead>
                                    <tbody class="align-middle">
                                      <tr>
                                        <td>admin</td>
                                        <td>admin</td>
                                        <td>
                                            <!-- Button Edit Admin trigger modal -->
                                            <button type="button" class="btn btn-secondary btn-md addbtn" data-bs-toggle="modal" data-bs-target="#modaleditAdmin">
                                                Edit
                                            </button>
                                            <form action="" method = "post">
                                              <!-- Modal Edit Admin -->
                                              <div class="modal fade modalpopup" id="modaleditAdmin" tabindex="-1">
                                                  <div class="modal-dialog modal-dialog-centered">
                                                      <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="modaleditAdmin">
                                                              Edit Admin
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                          </div>
                                                          <div class="modal-body">
                                                            <div class="form-floating mb-2">
                                                              <input type="text" id="uname" name="uname" class="form-control" placeholder="Username" required>
                                                              <label for="uname">Username</label>
                                                            </div>
                                                            <div class="form-floating">
                                                                <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
                                                                <label for="pass">Password</label>
                                                            </div>
                                                          <div class="modal-footer">
                                                              <button type="submit" id="editbtn" class="btn btn-secondary btn-md addbtn" name ="editbtn">
                                                                  Confirm
                                                              </button>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                            </form>
                                        </td>
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

    <!-- lines -->
    <section class="bg-dark p-5">
    </section>
    <section class="bg-primary p-3">
    </section>

    <form action="" method = "post">
      <!-- Modal Add Admin -->
      <div class="modal fade modalpopup" id="modaladdAdmin" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="modaladdAdmin">
                      Add Admin
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                  </div>
                  <div class="modal-body">
                    <div class="form-floating mb-2">
                      <input type="text" id="uname" name="uname" class="form-control" placeholder="Username" required>
                      <label for="uname">Username</label>
                    </div>
                    <div class="form-floating">
                        <input type="password" id="pass" name="pass" class="form-control" placeholder="Password" required>
                        <label for="pass">Password</label>
                    </div>
                  <div class="modal-footer">
                      <button type="submit" id="registerbtn" class="btn btn-secondary btn-md addbtn" name ="registerbtn">
                          Add
                      </button>
                  </div>
              </div>
          </div>
      </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>