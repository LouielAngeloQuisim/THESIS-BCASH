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
      <section class="bg-white p-5">
      </section>
      <section class="bg-white p-4">
      </section>
      <section class="bg-white p-5">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col">
                    <div class="card shadow bg-light p-4 border border-5 border-dark">
                        <div class="h1 text-center">
                            <i class="bi bi-lock"></i>
                        </div>
                        <h3 class="mb-4 text-center fs-0">
                            Change Password
                        </h3>
                        <form action="" method="post">
                            <div class="form-floating mb-3">
                                <input type="password" id="pass" name="pass" class="form-control" id="floatingInput" placeholder="Enter Password">
                                <label for="floatingInput">Password</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="password" id="conpass" name="conpass" class="form-control" id="floatingPassword" placeholder="Enter Confirm Password">
                                <label for="floatingPassword">Confirm Password</label>
                            </div>
                            <!-- Change Pass Confirm trigger modal -->
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#modalchangepassConfirm" id="submit">
                                    Confirm
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </section>

      <div class="modal fade" id="modalchangepassConfirm" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalchangepassConfirm">Change Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p class="text-fondark fw-bolder">
                            Are you sure to change your current password?
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <!-- Confirm Change Pass trigger modal data-bs-toggle="modal" data-bs-target="#modalConchangepass"-->
                        <button type="button" id="confirm_modal" class="btn btn-secondary" data-bs-toggle="modal" name="Changepass">
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
                            
        <!-- Modal Confirm Change Pass -->
        <div class="modal fade" id="modalConchangepass" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalConchangepass">Change Password</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="h1 text-success">
                            <i class="bi bi-check-circle"></i>
                        </div>
                        <p class="text-fondark fw-bolder">
                            Password Successfully Changed!<br>
                            Please login again using your new password.
                        </p>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" name="Changepass">Ok</button>
                    </div>
                </div>
            </div>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
  </body>
</html>