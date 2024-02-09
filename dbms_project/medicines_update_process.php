<?php
include_once 'config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title> Show medicines available Data </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include_once 'config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Med_ID = $_POST['Med_ID'];
        $Med_Name = $_POST['Med_Name'];
        $Med_company = $_POST['Med_company'];
        $Med_price = $_POST['Med_price'];
        $Med_dose = $_POST['Med_dose'];
        $Med_type = $_POST['Med_type'];

        $sql = "UPDATE `MEDICINES` SET `Med_Name`='$Med_Name', `Med_company`='$Med_company', `Med_price`='$Med_price', `Med_dose`='$Med_dose', `Med_type`='$Med_type' WHERE `Med_ID`='$Med_ID'";

        if (mysqli_query($link, $sql)) {
            echo '<h2 style="text-align:center;margin-top:5vw;font-family:arial">Record Modified successfully</h2>';
            header("Location: medicines_update.php");
        } else {
            echo '<h2 style="text-align:center;margin-top:5vw;font-family:arial">Update failed: ' . mysqli_error($link) . '</h2>';
        }
    }

    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $row = null;
    if ($id !== null) {
        $result = mysqli_query($link, "SELECT * FROM medicines WHERE Med_ID='$id'");
        $row = mysqli_fetch_assoc($result);
    }

    ?>


    <div class="col-md-6 mx-5">
        <h2 class="text-center my-3">Medicine List</h2>
        <form method="post" action="medicines_update_process.php">

            <div class="form-group">
                <label for="Med_ID">Medicine ID</label>
                <input type="text" class="form-control" id="Med_ID" name="Med_ID" value="<?php echo $row["Med_ID"]; ?>" disabled>
                <input type="hidden" name="Med_ID" value="<?php echo $row["Med_ID"]; ?>">
            </div>
            <div class="form-group">
                <label for="Med_Name">Medicine name</label>
                <input type="text" class="form-control" id="Med_Name" name="Med_Name" value="<?php echo $row["Med_Name"]; ?>">
            </div>
            <div class="form-group">
                <label for="Med_company">Medicine company</label>
                <input type="text" class="form-control" id="Med_company" name="Med_company" value="<?php echo $row["Med_company"]; ?>">
            </div>
            <div class="form-group">
                <label for="Med_price">Medicine price (in Rs)</label>
                <input type="number" class="form-control" id="Med_price" name="Med_price" value="<?php echo $row["Med_price"]; ?>">
            </div>
            <div class="form-group">
                <label for="Med_dose">Medicine dose (in Mg)</label>
                <input type="number" class="form-control" id="Med_dose" name="Med_dose" value="<?php echo $row["Med_dose"]; ?>">
            </div>
            <div class="form-group">
                <label for="Med_type">Medicine type</label>
                <input type="text" class="form-control" id="Med_type" name="Med_type" value="<?php echo $row["Med_type"]; ?>">
            </div>
            <div class="form-group my-4">
                <button type="submit" class="btn btn-primary" name="save">Submit</button>
                <a class="btn btn-link ml-2" href="medicines_update.php">Go back </a>
            </div>

        </form>
    </div>

    <?php
    $result = mysqli_query($link, "SELECT * FROM medicines_updates");
    if (mysqli_num_rows($result) > 0) {
    ?>
        <div>
            <br>
            <h3 class="my-4 mx-5">Medicines Updates data</h3>
            <table style='width:60vw; margin-left:5vw;'>

                <tr>
                    <td>Med_ID</td>
                    <td>change_date</td>
                    <td>field_name</td>
                    <td>before_value</td>
                    <td>after_value</td>
                </tr>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["Med_ID"]; ?></td>
                        <td><?php echo $row["change_date"]; ?></td>
                        <td><?php echo $row["field_name"]; ?></td>
                        <td><?php echo $row["before_value"]; ?></td>
                        <td><?php echo $row["after_value"]; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
    <?php
    } else {
        echo '<h2 style="text-align:center;margin-top:5vw;font-family:arial">No result found</h2>';
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>