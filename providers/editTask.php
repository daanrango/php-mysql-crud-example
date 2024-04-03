<?php
include ("../database/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "select * from task where id_task ='$id'";

    $result = mysqli_query($con, $query);
    if (!$result) {
        die("Query failed");
    }

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['name'];
        $description = $row['description'];
        $in_charger = $row['in_charge'];
        $status = $row['status'];

    }
}

if (isset($_POST['updateTask'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $in_charger = $_POST['inCharger'];
    $status = $_POST['status'];

    $query = "UPDATE task SET description = '$description', in_charge = '$in_charger', status = '$status', name = '$title', fecha_registro = NOW() WHERE id_task = '$id'";

    mysqli_query($con, $query);


    $_SESSION['message'] = 'Task update successfully';
    $_SESSION['message-type'] = 'info';

    header("Location: ../index.php");
}
?>

<?php include ("../includes/header.php") ?>
<div class="container p-4">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body mx-auto">
                <form action="editTask.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="title" autofocus
                            value="<?php echo $title ?>" />
                    </div>
                    <div class="form-group mt-2 ">
                        <textarea class="form-control" rows="3" name="description"
                            id="description"><?php echo $description ?></textarea>
                    </div>
                    <div class="form-group mt-2 ">
                        <input type="text" class="form-control" name="inCharger" id="inCharger"
                            value="<?php echo $in_charger ?>" />
                    </div>
                    <div class="form-group mt-2 ">
                        <label for="exampleSelect1" class="form-label mt-4">Status:</label>
                        <select class="form-select" id="status" name="status">
                            <?php
                            $query = "SELECT * FROM status";
                            $result = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_array($result)) {
                                $selected = ($row['name_status'] == $status) ? 'selected' : '';
                                ?>
                                <option value="<?php echo $row['name_status']; ?>" <?php echo $selected; ?>>
                                    <?php echo $row['name_status']; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <button class="btn btn-info w-100 mt-2" name="updateTask">Update Task</button>

                </form>
            </div>
        </div>
    </div>
</div>

<?php include ("../includes/footer.php") ?>