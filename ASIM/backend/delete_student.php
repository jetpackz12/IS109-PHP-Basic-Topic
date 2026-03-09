<?php
require_once "../lib/database.php";
require_once "../lib/route.php";

$ACTIVE_STATUS = 1;
$INACTIVE_STATUS = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = !empty($_POST["id"]) ? filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $status = !empty($_POST["status"]) ? filter_input(INPUT_POST, 'status', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $status = $status == $ACTIVE_STATUS ? $INACTIVE_STATUS : $ACTIVE_STATUS;

    $sql = "UPDATE student SET status = '$status' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: " . ROUTE_STUDENT);
        exit;
    }
}
