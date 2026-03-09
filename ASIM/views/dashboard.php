<?php
session_start();
require_once "../lib/route.php";
require_once "../backend/dashboard.php";
ob_start();
?>
<main>
    <div class="container-fluid px-3">
        <div class="row mt-3">
            <div class="col-md-6">
                <?php
                $color = "bg-primary";
                $text = "Total Active Student: $active_student";
                $link = ROUTE_STUDENT;
                include "../components/cards.php"; ?>
            </div>
            <div class="col-md-6">
                <?php
                $color = "bg-danger";
                $text = "Total Inactive Student: $inactive_student";
                $link = ROUTE_STUDENT;
                include "../components/cards.php";
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?php
                $color = "bg-success";
                $text = "Total Student: $total_student";
                $link = ROUTE_STUDENT;
                include "../components/cards.php";
                ?>
            </div>
            <div class="col-md-6">
                <?php
                $color = "bg-warning";
                $text = "Total Course: $total_course";
                $link = ROUTE_COURSE;
                include "../components/cards.php";
                ?>
            </div>
        </div>
    </div>
</main>
<script>
    const sidebar = document.getElementById('dashboard');
    sidebar.classList.add('bg-primary', 'active');
</script>
<?php
$content = ob_get_clean();

include 'layout/layout.php';
?>