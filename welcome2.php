<!DOCTYPE HTML>
<html>

<body>

    <?php

    $name = $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //The empty function check whether a variable is empty (0, 0.0, "0", NULL, false, empty arrays, and undefined variables).
        if (!empty($_POST["name"])) {
            echo "Welcome " . $_POST['name'];
        } else {
            echo "Provide name!";
        }

        echo "<br>";

        if (!empty($_POST["email"])) {
            echo "Your email address is: " . $_POST['email'];
        } else {
            echo "Provide email!";
        }

        echo "<br>";
        echo "<br>";

        //The isset function check whether a variable is set and is not NULL.
        $name = isset($_POST['name']) ?  "Welcome " . $_POST['name'] :  "Provide name!";
        $email = isset($_POST['email']) ?  "Your email address is: " . $_POST['email'] :  "Provide email!";
        echo $name;
        echo "<br>";
        echo $email;
    } else {
        echo "You have to go on the form_handle.php file and submit name and email!";
    }

    ?>

</body>

</html>