<?php
require_once "route.php";

if (empty($_SESSION["username"]) && empty($_SESSION["password"])) {
    header("Location: " . ROUTE_LOGIN);
}
