<?php
require_once "../lib/route.php";
session_start();

if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
    session_unset();
    session_destroy();
    header("Location: " . ROUTE_LOGIN);
    exit;
} else {
    header("Location: " . ROUTE_LOGIN);
    exit;
}
