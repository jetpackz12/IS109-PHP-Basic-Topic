<?php
session_start();

if (isset($_POST['create'])) {
    $_SESSION["favcolor"] = $_POST["color"];
    $_SESSION["favanimal"] = $_POST["animal"];
}

if (isset($_POST['update'])) {
    $_SESSION["favcolor"] = $_POST["color"];
}

if (isset($_POST['delete'])) {
    session_unset();
}

if (isset($_POST['destroy'])) {
    session_destroy();
    header("Location: /IS109/session.php");
}

?>
<!DOCTYPE html>
<html>

<body>

    <h2>PHP Session Example</h2>

    <!-- Create Session -->
    <form method="POST">
        <input type="text" name="color" placeholder="Favorite Color">
        <input type="text" name="animal" placeholder="Favorite Animal">
        <button type="submit" name="create">Create Session</button>
    </form>

    <br>

    <!-- Update Session -->
    <form method="POST">
        <input type="text" name="color" placeholder="New Favorite Color">
        <button type="submit" name="update">Update Session</button>
    </form>

    <br>

    <!-- Unset Session -->
    <form method="POST">
        <button type="submit" name="delete">Unset Session Variables</button>
    </form>

    <br>

    <!-- Destroy Session -->
    <form method="POST">
        <button type="submit" name="destroy">Destroy Session</button>
    </form>

    <hr>

    <h3>Session Data</h3>

    <?php
    if (isset($_SESSION["favcolor"])) {
        echo "Favorite Color: " . $_SESSION["favcolor"] . "<br>";
        echo "Favorite Animal: " . $_SESSION["favanimal"] . "<br>";
    } else {
        echo "No session data found.";
    }
    ?>

    <hr>

    <h3>Session Array</h3>

    <pre>
<?php print_r($_SESSION); ?>
</pre>

</body>

</html>