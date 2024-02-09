<?php
include_once 'config.php';
if (isset($_POST['save'])) {


    $Med_ID  = $_POST['Med_ID'];
    $Med_Name  = $_POST['Med_Name'];
    $Med_company  = $_POST['Med_company'];
    $Med_price  = $_POST['Med_price'];
    $Med_dose = $_POST['Med_dose'];
    $Med_type = $_POST['Med_type'];


    $sql = "INSERT INTO `MEDICINES`(`Med_ID`, `Med_Name`, `Med_company`, `Med_price`, `Med_dose`, `Med_type`) VALUES ('$Med_ID','$Med_Name','$Med_company','$Med_price','$Med_dose','$Med_type')";


    try {
        if (mysqli_query($link, $sql)) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">Medicine record created successfully</h2>';
        }
    } catch (Exception $e) {
        echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' . "Medicine with ID $Med_ID already exists. Please choose a different ID.". '</h2>';
    } 
        mysqli_close($link);
    
}
?>
<html>
</head>

<body>
    <h3 style="text-align:center;"><a class=" btn btn-link ml-2" href="show_addmedicines.php"><strong>Go back</strong> <br>
            <p>
        </a> for inserting more medicines</h3>
    </p>
    </p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>