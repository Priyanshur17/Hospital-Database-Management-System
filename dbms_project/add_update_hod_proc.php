<?php
    include_once 'config.php';  
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $row = null;
    if ($id !== null) {
        $result = mysqli_query($link, "SELECT `Doc_ID`,`Doc_fname`,`Doc_lname`,`Doc_Specialist` FROM doctor_info WHERE Doc_DeptID='$id'");
    }

   
?>
<!DOCTYPE html>
<html>

<head>
    <title>Add/Update HOD</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>

    <div class="col-md-6 mx-5">
        <h2 class="text-center my-3">Add/Update HOD</h2>
        <form method="post" action="add_update_hod.php">
            <div class="form-group">
                <label for="doc_id">Enter Doctor ID</label>
                <input type="text" class="form-control" id="doc_id" name="doc_id">
                <input type="hidden" name="dept_id" value="<?php echo $id; ?>">
            </div>

            <div class="form-group my-4">
                <button type="submit" class="btn btn-primary" name="save">Submit</button>
                <a class="btn btn-link ml-2" href="add_update_hod.php">Go back </a>
            </div>
        </form>
    </div>

    <?php
    if (mysqli_num_rows($result) > 0) {
    ?>
        <div class="my-4 mx-5">
            <h3>Doctors List</h3>
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Doctor ID</th>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Speciality</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row["Doc_ID"]; ?></td>
                            <td><?php echo $row["Doc_fname"]; ?></td>
                            <td><?php echo $row["Doc_lname"]; ?></td>
                            <td><?php echo $row["Doc_Specialist"]; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    <?php
    } else {
        echo '<h2 style="text-align:center;margin-top:5vw;font-family:arial">No doctors found</h2>';
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
