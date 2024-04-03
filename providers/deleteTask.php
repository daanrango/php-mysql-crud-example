<?php
include ("../database/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "delete from task where id_task ='$id'";

    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query failed");
    }

    $_SESSION['message'] = 'Task delete successfully';
    $_SESSION['message-type'] = 'danger';

    header("Location: ../index.php");
}