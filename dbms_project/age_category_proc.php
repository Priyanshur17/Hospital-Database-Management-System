<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show Age Category</title>

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

            $patage = $_POST['patage'];

            $query = "SELECT `age`('$patage') AS `age`;";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_row($result);
            foreach ($row as $key => $value) {
                echo '<p>Age: ' . $value . '</p>';
            }
            ?>

            <?php
            $query = "CALL `patient_age_msg`('$patage');";
            $result = mysqli_query($link, $query);
            $row = mysqli_fetch_row($result);
            foreach ($row as $key => $value) {
                echo '<p>' . $value . '</p>';
            }
            ?>

            <a class="btn btn-link" href="age_category.php">Go back</a>
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
