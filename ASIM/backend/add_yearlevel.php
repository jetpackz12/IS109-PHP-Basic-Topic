<?php
require_once "../lib/database.php";
require_once "../lib/route.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $yearlevel = !empty($_POST["yearlevel"]) ? filter_input(INPUT_POST, 'yearlevel', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $description = !empty($_POST["description"]) ? filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS) : "";

    $sql = "SELECT * FROM yearlevel WHERE yearlevel = '$yearlevel'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $message = "This year level already exist";
        echo "
            <script type='text/javascript'>
                alert('$message')
                location.href = '" . ROUTE_YEARLEVEL . "'
            </script>
        ";
        return;
    }

    $sql = "INSERT INTO yearlevel( `yearlevel`, `description` ) VALUES ('$yearlevel', '$description')";

    if ($conn->query($sql) === TRUE) {
        header("Location: " . ROUTE_YEARLEVEL);
        exit;
    }
}
