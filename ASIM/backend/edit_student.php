<?php
require_once "../lib/database.php";
require_once "../lib/route.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = !empty($_POST["id"]) ? filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $old_firstname = !empty($_POST["old_firstname"]) ? filter_input(INPUT_POST, 'old_firstname', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $old_middlename = !empty($_POST["old_middlename"]) ? filter_input(INPUT_POST, 'old_middlename', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $old_lastname = !empty($_POST["old_lastname"]) ? filter_input(INPUT_POST, 'old_lastname', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $firstname = !empty($_POST["firstname"]) ? filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $middlename = !empty($_POST["middlename"]) ? filter_input(INPUT_POST, 'middlename', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $lastname = !empty($_POST["lastname"]) ? filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $address = !empty($_POST["address"]) ? filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $birthdate = !empty($_POST["birthdate"]) ? filter_input(INPUT_POST, 'birthdate', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $phone = !empty($_POST["phone"]) ? filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $gender = !empty($_POST["gender"]) ? filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $course = !empty($_POST["course"]) ? filter_input(INPUT_POST, 'course', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $yearlevel = !empty($_POST["yearlevel"]) ? filter_input(INPUT_POST, 'yearlevel', FILTER_SANITIZE_SPECIAL_CHARS) : "";

    if ($old_firstname != $firstname || $old_middlename != $middlename || $old_lastname != $lastname) {
        $sql = "SELECT * FROM student WHERE first_name = '$firstname' AND middle_name = '$middlename' AND last_name = '$lastname' AND id <> '$id'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $message = "This student already exist";
            echo "
                <script type='text/javascript'>
                    alert('$message')
                    location.href = '" . ROUTE_STUDENT . "'
                </script>
            ";
            return;
        }
    }

    $sql = "UPDATE student SET first_name = '$firstname', middle_name = '$middlename', last_name = '$lastname', address = '$address', birthdate = '$birthdate', phone_number = '$phone', gender = '$gender', course_id = '$course', yearlevel_id = '$yearlevel' WHERE id = '$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: " . ROUTE_STUDENT);
        exit;
    }
}
