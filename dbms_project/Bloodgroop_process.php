<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Group Count</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .btn-link {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $mysqli = new mysqli("localhost", "root", "", "HospitalP");

        if ($mysqli === false) {
            die("ERROR: Could not connect. " . $mysqli->connect_error);
        }

        $Pat_Bloodgroup1 = $_POST['Pat_BloodGroup1'];
        $sql = "SELECT COUNT(Pat_ID) AS patient_count FROM Patient_personal_info WHERE Pat_Bloodgroup='$Pat_Bloodgroup1'";

        if ($result = $mysqli->query($sql)) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<h3>Number of patients with chosen blood group is <strong>" . $row['patient_count'] . "</strong></h3>";
                $result->free();
            } else {
                echo "<h2>No records matching your criteria were found.</h2>";
            }
        } else {
            echo "ERROR: Could not execute $sql. " . $mysqli->error;
        }

        $mysqli->close();
        ?>

        <br>
        <a class="btn btn-link ml-2" href="bloodgroup.php">Go back</a>
    </div>

    <!-- Bootstrap JavaScript (optional, but required for certain components) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
