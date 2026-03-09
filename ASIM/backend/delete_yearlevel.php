<?php
require_once "../lib/database.php";
require_once "../lib/route.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = !empty($_POST["id"]) ? filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS) : "";

    $sql = "DELETE FROM yearlevel WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: " . ROUTE_YEARLEVEL);
        exit;
    }
}
