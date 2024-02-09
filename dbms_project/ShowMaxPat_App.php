<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <?php
        include_once 'config.php';

        $result = mysqli_query($link, "SELECT
            Patient_personal_info.Pat_ID, Patient_personal_info.Pat_fname, Patient_personal_info.Pat_contactno, Patient_personal_info.Pat_DOB, Patient_personal_info.Pat_gender,
            COUNT(App_ID) AS `value_occurrence`
        FROM
            Appointment
        NATURAL JOIN Patient_personal_info 
        GROUP BY Pat_ID
        ORDER BY
            `value_occurrence`
        DESC
        LIMIT 5 ;");
        ?>

        <h2 class="text-center">Patients With Maximum Appointments</h2>
        <div class="table-responsive">
            <?php
            if (mysqli_num_rows($result) > 0) {
            ?>
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Patient ID</th>
                            <th>First Name</th>
                            <th>Contact No</th>
                            <th>DOB</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        while ($row = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td><?php echo $row["Pat_ID"]; ?></td>
                                <td><?php echo $row["Pat_fname"]; ?></td>
                                <td><?php echo $row["Pat_contactno"]; ?></td>
                                <td><?php echo $row["Pat_DOB"]; ?></td>
                                <td><?php echo $row["Pat_gender"]; ?></td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            } else {
                echo "<p class='text-muted'>No patients found</p>";
            }
            ?>
        </div>
        <br>
        <a class="btn btn-link ml-2" href="index.php">Cancel</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>