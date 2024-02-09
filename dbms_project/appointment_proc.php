<?php
include_once 'config.php';
if (isset($_POST['save'])) {


    $app_id  = $_POST['app_id'];
    $pat_id  = $_POST['pat_id'];
    $doc_id  = $_POST['doc_id'];
    $app_desc  = $_POST['app_desc'];

    $sql = "INSERT INTO `appointment`(`App_ID`, `Pat_ID`, `Doc_ID`,  `App_Description`) VALUES ('$app_id','$pat_id','$doc_id','$app_desc')";


    // if (mysqli_query($link, $sql)) {
    //     echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">Appointment created successfully</h2>';
    // } else {
    //     echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">Duplicate appointment ID</h2>';
    // }

    
    try {
        if (mysqli_query($link, $sql)) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">Appointment created successfully.</h2>';
        } 
    } catch (Exception $e) {
        $err = $e->getMessage();
        //echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' . $err . '</h2>';
        if (stripos($err, "Duplicate entry") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Duplicate entry can't creates with $app_id" . '</h2>';
            
        }
    
        if (stripos($err, "Pat_ID") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Assigning invalid Patient id $pat_id. Please check." . '</h2>';
            
        }
        if (stripos($err, "Doc_ID") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Assigning invalid doctor id $doc_id Please check." . '</h2>';
            
        }
        // if (stripos($err, "start time") !== false) {
        //     echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Error: Duty start time cannot be same as Duty end time...,Please try again" . '</h2>';
        
        // }
        

        
    }
    mysqli_close($link);
}
?>
<html>
</head>

<body>
    <h3 style="text-align:center;"><a class=" btn btn-link ml-2" href="create_appointment.php"><strong>Go back</strong> <br>
            <p>
        </a> for inserting more appointments</h3>
    </p>
    </p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>