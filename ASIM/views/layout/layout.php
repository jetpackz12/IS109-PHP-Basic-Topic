<?php
    require_once "../lib/route.php";
    require_once "../lib/auth.php";
?>
<?php require_once "../components/head.php"; ?>

<body class="sb-nav-fixed">
    <?php require_once "../components/navbar.php"; ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php require_once "../components/sidebar.php"; ?>
        </div>
        <div id="layoutSidenav_content">
            <?php echo $content; ?>
            <?php require_once "../components/footer.php"; ?>
        </div>
    </div>
    <?php require_once "../components/script.php"; ?>
</body>

</html>