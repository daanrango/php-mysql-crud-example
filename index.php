<?php include ("database/db.php"); ?>
<?php include ("includes/header.php"); ?>

<div class="container p-4">
    <div class="row ">
        <div class="col-md-4">
            <?php
            if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message-type']; ?> alert-dismissible fade show" role="alert">
                    <strong>
                        <?= $_SESSION['message'] ?>
                    </strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php session_unset();
            } ?>

            <div class="card card-body">
                <form action="providers/saveTask.php" method="POST">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" id="title" placeholder="Task Title"
                            autofocus />
                    </div>
                    <div class="form-group mt-2 ">
                        <textarea class="form-control" rows="3" name="description" id="description"
                            placeholder="Task Description"></textarea>
                    </div>
                    <div class="form-group mt-2 ">
                        <input type="text" class="form-control" name="inCharger" id="inCharger"
                            placeholder="Task in Charger" />
                    </div>
                    <input name="save_task" id="save_task" class="btn btn-success w-100 mt-2" type="submit"
                        value="Save Task" />

                </form>
            </div>
        </div>
        <div class="col-md-8">
            <table class="table table-hover">
                <thead>
                    <tr class="table-dark">
                        <th scope=" col">Id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">In Charger</th>
                        <th scope="col">Status</th>
                        <th scope="col">Time</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_array($result)) { ?>
                        <tr class="table-active">
                            <th scope="row">
                                <?php echo $row['id_task'] ?>
                            </th>
                            <th>
                                <?php echo $row['name'] ?>
                            </th>
                            <th>
                                <?php echo $row['description'] ?>
                            </th>
                            <th>
                                <?php echo $row['in_charge'] ?>
                            </th>
                            <th>
                                <?php echo $row['status'] ?>
                            </th>
                            <th>
                                <?php echo $row['fecha_registro'] ?>
                            </th>
                            <th>
                                <a class="btn btn-warning" href="providers/editTask.php?id=<?php echo $row['id_task'] ?>"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a class="btn btn-danger mt-2"
                                    href="providers/deleteTask.php?id=<?php echo $row['id_task'] ?>"><i
                                        class="fa-solid fa-trash"></i></a>
                            </th>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include ("includes/footer.php"); ?>