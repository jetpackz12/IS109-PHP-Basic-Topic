<?php
require_once "../lib/database.php";
require_once "../lib/route.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = !empty($_POST["id"]) ? filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $old_yearlevel = !empty($_POST["old_yearlevel"]) ? filter_input(INPUT_POST, 'old_yearlevel', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $yearlevel = !empty($_POST["yearlevel"]) ? filter_input(INPUT_POST, 'yearlevel', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $description = !empty($_POST["description"]) ? filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS) : "";

    if ($old_yearlevel != $yearlevel) {
        $sql = "SELECT * FROM yearlevel WHERE yearlevel = '$yearlevel' AND id <> '$id'";
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
    }

    $sql = "UPDATE yearlevel SET yearlevel = '$yearlevel', description = '$description' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: " . ROUTE_YEARLEVEL);
        exit;
    }
}
