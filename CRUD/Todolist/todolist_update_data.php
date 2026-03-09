<?php
require_once 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $status = $_POST['status'] == 1 ? 0 : 1;

    $sql = "UPDATE todolist SET status = " .$status. " WHERE id = " .$_POST['id']. "";

    if (!$conn->query($sql) === TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    header("Location: {$_SERVER['HTTP_REFERER']}"); // This will return to the previous PHP page after submitting a form.
}
