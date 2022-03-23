<!-- navbar -->
<!-- eto design ng header kapag nasa may redeem_scan.php at redeeming.php
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3"> -->
<nav class="navbar navbar-expand-lg bg-primary navbar-dark py-3">
    <div class="container">
        <a href="index.php" class="navbar-brand fw-bold">BCASH</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navmenu">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a href="dash_shop.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item">
                    <!-- logout trigger modal -->
                    <!-- <a href="login.php" class="nav-link" data-bs-toggle="modal" data-bs-target="#modallogout">
                        Logout
                    </a> -->
                </li>
            </ul>
        </div>
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
                        <p class="text-fondark fw-bolder">
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
    </div>
</nav>