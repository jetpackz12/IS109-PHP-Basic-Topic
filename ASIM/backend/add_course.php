<?php
require_once "../lib/database.php";
require_once "../lib/route.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course = !empty($_POST["course"]) ? filter_input(INPUT_POST, 'course', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $description = !empty($_POST["description"]) ? filter_input(INPUT_POST, 'description', FILTER_SANITIZE_SPECIAL_CHARS) : "";

    $sql = "SELECT * FROM course WHERE course = '$course'";
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

    $sql = "INSERT INTO course( `course`, `description` ) VALUES ('$course', '$description')";

    if ($conn->query($sql) === TRUE) {
        header("Location: " . ROUTE_COURSE);
        exit;
    }
}
