<?php

$cookie_name = "username";

// CREATE COOKIE
if (isset($_POST['create'])) {
    $cookie_value = $_POST['name'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/"); // 7 days
    header("Location: /IS109/cookies.php");
}

// UPDATE COOKIE
if (isset($_POST['update'])) {
    $cookie_value = $_POST['name'];
    setcookie($cookie_name, $cookie_value, time() + (86400 * 7), "/");
    header("Location: /IS109/cookies.php");
}

// DELETE COOKIE
if (isset($_POST['delete'])) {
    setcookie($cookie_name, "", time() - 3600, "/");
    header("Location: /IS109/cookies.php");
}

?>

<!DOCTYPE html>
<html>

<body>

    <h2>PHP Cookie Example</h2>

    <!-- Create Cookie -->
    <form method="POST">
        <input type="text" name="name" placeholder="Enter name">
        <button type="submit" name="create">Create Cookie</button>
    </form>

    <br>

    <!-- Update Cookie -->
    <form method="POST">
        <input type="text" name="name" placeholder="New name">
        <button type="submit" name="update">Update Cookie</button>
    </form>

    <br>

    <!-- Delete Cookie -->
    <form method="POST">
        <button type="submit" name="delete">Delete Cookie</button>
    </form>

    <hr>

    <h3>Cookie Status</h3>

    <?php
    if (isset($_COOKIE[$cookie_name])) {
        echo "Cookie is set! <br>";
        echo "Username: " . $_COOKIE[$cookie_name];
    } else {
        echo "Cookie is not set.";
    }
    ?>

</body>

</html>