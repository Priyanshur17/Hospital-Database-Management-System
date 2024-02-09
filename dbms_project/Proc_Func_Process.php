<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Age Category</title>

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
            include "config.php";

            
            $dayno = $_POST['dayno'];
            $query = "SELECT total_patients_on_this_day($dayno);";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_row($result);
            foreach ($row as $key => $value) {
                echo '<h3>Total patients on this day are '. $value.'</h3>';
            }

            $query = "CALL `patient_count_msg`($dayno);";

            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_row($result);
            foreach ($row as $key => $value) {

                echo $value . "<br>";
            }            c
            ?>
            <a class="btn btn-link" href="Procedure_Func.php">Go back and explore more Days</a>
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

