<?php
include_once 'config.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title> Show doctors available Data </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include_once 'config.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $Dept_ID = $_POST['dept_id'];

        $sql = "select Doc_ID ,Doc_fname,Doc_lname,Doc_gender,Doc_contactno,Doc_emailID,Doc_Specialist from doctor_info where Doc_DeptID = '$Dept_ID'";
    }

    $result = mysqli_query($link, $sql);
    if (mysqli_num_rows($result) > 0) {
    ?>
        <div>
            <br>
            <h3 class="my-4 mx-5">Doctors data</h3>
            <table style='width:60vw; margin-left:5vw;'>

                <tr>
                    <th>Doctor ID</th>
                    <th>First name</th>
                    <th>Last name</th>
                    <th>Gender</th>
                    <th>Contact no</th>
                    <th>Email ID</th>
                    <th>Speciality</th>
                </tr>

                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td><?php echo $row["Doc_ID"]; ?></td>
                        <td><?php echo $row["Doc_fname"]; ?></td>
                        <td><?php echo $row["Doc_lname"]; ?></td>
                        <td><?php echo $row["Doc_gender"]; ?></td>
                        <td><?php echo $row["Doc_contactno"]; ?></td>
                        <td><?php echo $row["Doc_emailID"]; ?></td>
                        <td><?php echo $row["Doc_Specialist"]; ?></td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <br>
        <a class="btn btn-link ml-2 " href="show_doc_department.php">Go Back</a>
    <?php
    } else {
        echo '<h2 style="text-align:center;margin-top:5vw;font-family:arial">No doctor found in given department</h2><br>
        <center><a class="btn btn-link ml-2" href="show_doc_department.php">Go Back</a></center>';
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>