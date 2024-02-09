<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill Details</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <?php
        include_once 'config.php';
        if (isset($_POST['save'])) {
            $Pat_ID1 = $_POST['Pat_ID1'];
            $Doc_ID1 = $_POST['Doc_ID1'];
            $visit_charge1 = $_POST['visit_charge1'];
            $Doc_charge1 = $_POST['Doc_charge1'];
            $no_of_days1 = $_POST['no_of_days1'];
            $total_charge = ($visit_charge1 + $Doc_charge1) * $no_of_days1;
        ?>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title mb-4">Patient and Billing Details</h2>
                    <h5 class="card-text"><strong>Patient ID:</strong> <?= $Pat_ID1 ?></h5>
                    <h5 class="card-text"><strong>Doctor ID:</strong> <?= $Doc_ID1 ?></h5>
                    <h5 class="card-text"><strong>Visit Charge:</strong> <?= $visit_charge1 ?></h5>
                    <h5 class="card-text"><strong>Doctor Charge:</strong> <?= $Doc_charge1 ?></h5>
                    <h5 class="card-text"><strong>Number of Days Visited/Stayed:</strong> <?= $no_of_days1 ?></h5>
                    <h5 class="card-text"><strong>Total Charge: <span class="text-primary"><?= $total_charge ?></span></p>
                            <h6 class="card-text small text-muted">(Total_charge = (visit_charge + Doc_charge) * no_of_days )</h6>
                </div>
            </div>

            <p class="mt-4">
                <a class="btn btn-primary" href="PrintBill.php">Generate Another Bill</a>
            </p>
        <?php
            mysqli_close($link);
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>