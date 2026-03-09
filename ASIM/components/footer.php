<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid px-4">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">ASIM &copy; Copyright 2025 - 2026</div>
            <div>
                <div class="text-muted">ASIM - Version 1.0.0</div>
            </div>
        </div>
    </div>
</footer>

<!-- Logout Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-center bg-primary p-2">
                <h1 class="modal-title text-white fs-5" id="logoutModalLabel">Logout</h1>
            </div>
            <div class="modal-body">
                <p class="text-center">Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer d-flex justify-content-between align-items-center">
                <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">
                    <i class="fa fa-close"></i>
                    No
                </button>
                <a class="btn btn-primary px-4" href="<?php echo ROUTE_LOGOUT; ?>">
                    <i class="fa fa-door-open"></i>
                    Yes
                </a>
            </div>
        </div>
    </div>
</div>