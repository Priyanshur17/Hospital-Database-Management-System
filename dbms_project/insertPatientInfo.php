<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Pat_ID = $_POST['Pat_ID'];
    $Pat_fname = $_POST['Pat_fname'];
    $Pat_mname = $_POST['Pat_mname'];
    $Pat_lname = $_POST['Pat_lname'];
    $Pat_gender = $_POST['Pat_gender'];
    $Pat_DOB = $_POST['Pat_DOB'];
    $Pat_contactno = $_POST['Pat_contactno'];
    $Pat_emailID = $_POST['Pat_emailID'];
    $Pat_Address = $_POST['Pat_Address'];
    $Pat_MedHistory = $_POST['Pat_MedHistory'];
    $Pat_BloodGroup = $_POST['Pat_BloodGroup'];

    $sql = "INSERT INTO `Patient_personal_info` (`Pat_ID`, `Pat_fname`, `Pat_mname`, `Pat_lname`, `Pat_gender`, `Pat_DOB`, `Pat_contactno`, `Pat_emailID`, `Pat_Address`, `Pat_MedHistory`, `Pat_BloodGroup`) VALUES ('$Pat_ID','$Pat_fname','$Pat_mname','$Pat_lname','$Pat_gender','$Pat_DOB','$Pat_contactno','$Pat_emailID','$Pat_Address','$Pat_MedHistory','$Pat_BloodGroup')";

    
    
  

    try {
        if (mysqli_query($link, $sql)) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">Patient details added successfully</h2>';
              $sqll = "INSERT INTO logs (id,action) VALUES ('$Pat_ID','Registered' )";
            mysqli_query($link, $sqll);
        } 
    } catch (Exception $e) {
        $err = $e->getMessage();
        if ( stripos($err, "Pat_emailID") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Email already registerd . Please try with differnt one." . '</h2>';
            goto label;
        }
        if (stripos($err, "Duplicate entry") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Duplicate entry of patient ID : $Pat_ID" . '</h2>';
            
        }
        if (stripos($err, "foreign key") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Invalid department $Doc_DeptID, Please check or try agian" . '</h2>';
            
        }
    }
    label:
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <p class="text-center mt-3"><a class="btn btn-link ml-2" href="Patient_personal_info.php"><strong>Go back</strong></a> for inserting More patients</p><br>

    <?php
    $sql = "SELECT * FROM logs";
    if ($result = mysqli_query($link, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<h2 class='ms-5'>Patient Log data</h2>";
            echo "<table class='ms-5 table table-bordered table-striped' style='width: 60vw;'>";
            echo "<tr>";
            echo "<th>PatientID</th>";
            echo "<th>Action</th>";
            echo "<th>Created Date</th>";
            echo "</tr>";
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['action'] . "</td>";
                echo "<td>" . $row['created_date'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo '<h2 class="text-center mt-5" style="font-family: Arial;">No records matching your query were found</h2>';
        }
    } else {
        echo '<h2 class="text-center mt-5" style="font-family: Arial;">ERROR: Could not able to execute $sql. ' . mysqli_error($link) . '</h2>';
    }
    mysqli_close($link);
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>