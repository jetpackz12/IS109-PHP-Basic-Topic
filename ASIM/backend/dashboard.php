<?php
require_once "../lib/database.php";

$active_student = "";
$inactive_student = "";
$total_student = "";
$total_course = "";

$sql = "SELECT COUNT(id) AS active_student FROM student WHERE status = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$active_student = $row['active_student'];

$sql = "SELECT COUNT(id) AS inactive_student FROM student WHERE status = 0";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$inactive_student = $row['inactive_student'];

$sql = "SELECT COUNT(id) AS total_student FROM student";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_student = $row['total_student'];

$sql = "SELECT COUNT(id) AS total_course FROM course";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_course = $row['total_course'];