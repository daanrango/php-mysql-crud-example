<?php
include ("../database/db.php");

if (isset($_POST['save_task'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $in_charger = $_POST['inCharger'];

    $query = "insert into task (description, in_charge, name, status) 
        values ('$description','$in_charger','$title', 'asignado')";

    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query failed");
    }

    $_SESSION['message'] = 'Task save successfully';
    $_SESSION['message-type'] = 'success';

    header("Location: ../index.php");
}