<?php
require_once "../lib/database.php";
require_once "../lib/route.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = !empty($_POST["id"]) ? filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $old_course = !empty($_POST["old_course"]) ? filter_input(INPUT_POST, 'old_course', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $course = !empty($_POST["course"]) ? filter_input(INPUT_POST, 'course', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $description = !empty($_POST["description"]) ? filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS) : "";

    if ($old_course != $course) {
        $sql = "SELECT * FROM course WHERE course = '$course' AND id <> '$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $message = "This course already exist";
            echo "
                <script type='text/javascript'>
                    alert('$message')
                    location.href = '" . ROUTE_COURSE . "'
                </script>
            ";
            return;
        }
    }

    $sql = "UPDATE course SET course = '$course', description = '$description' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: " . ROUTE_COURSE);
        exit;
    }
}
