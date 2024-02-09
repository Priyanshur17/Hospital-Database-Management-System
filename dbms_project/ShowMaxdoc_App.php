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
            Appointment.Doc_ID, Doctor_info.Doc_fname, Doctor_info.Doc_contactno, Doctor_info.Doc_DOB, Doctor_info.Doc_gender, COUNT(Doc_ID) AS `value_occurrence`
        FROM
            Appointment
        NATURAL JOIN Doctor_info GROUP BY Doc_ID
        ORDER BY
            `value_occurrence`
        DESC
        LIMIT 5 ;");
        ?>

        <h2 class="text-center">Doctors with Maximum Appointments</h2>
        <div class="table-responsive">
            <?php
            if (mysqli_num_rows($result) > 0) {
            ?>
                <table class="table table-bordered table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Doctor ID</th>
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
                                <td><?php echo $row["Doc_ID"]; ?></td>
                                <td><?php echo $row["Doc_fname"]; ?></td>
                                <td><?php echo $row["Doc_contactno"]; ?></td>
                                <td><?php echo $row["Doc_DOB"]; ?></td>
                                <td><?php echo $row["Doc_gender"]; ?></td>
                            </tr>
                        <?php
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            } else {
                echo "<p class='text-muted'>No doctors found</p>";
            }
            ?>
        </div>
        <br>
        <a class="btn btn-link ml-2" href="index.php">Cancel</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>