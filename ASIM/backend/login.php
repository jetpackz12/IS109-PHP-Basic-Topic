<?php
$error = [
    "isWrongUsername" => false,
    "isWrongPassword" => false,
];

if (!empty($_SESSION["username"]) && !empty($_SESSION["password"])) {
    header("Location: " . ROUTE_DASHBOARD);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = !empty($_POST["username"]) ? filter_input(INPUT_POST, 'username', FILTER_SANITIZE_SPECIAL_CHARS) : "";
    $password = !empty($_POST["password"]) ? filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS) : "";

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {

            $_SESSION["username"] = $row['username'];
            $_SESSION["password"] = $row['password'];

            header("Location: " . ROUTE_DASHBOARD);
            exit;
        } else {
            $error['isWrongPassword'] = true;
        }
    } else {
        $error['isWrongUsername'] = true;
    }
}
