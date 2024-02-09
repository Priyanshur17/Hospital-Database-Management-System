<?php
include_once 'config.php';
if (isset($_POST['save'])) {


    $PatID  = $_POST['Pat_ID'];
    $treatment  = $_POST['treatment'];
    $room_assigned  = $_POST['room_assigned'];
    $ot_assigned  = $_POST['ot_assigned'];
    $operatime = $_POST['operatime'];

    $sql = "INSERT INTO `in_patients`(`Pat_ID`, `In_treatments`, `Room_assigned`, `OT_assigned`, `Operation_Date_Time`) VALUES ('$PatID','$treatment','$room_assigned','$ot_assigned','$operatime')";
    
    try {
        if (mysqli_query($link, $sql)) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">In patient record created successfully.</h2>';
        } 
    } catch (Exception $e) {
        $err = $e->getMessage();
        if (stripos($err, "Pat_ID") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Invalid Patient id. Please check." . '</h2>';
           
        }
        if (stripos($err, "OT_assigned") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Invalid OT room assigning $ot_assigned" . '</h2>';
            
        }
    
        if (stripos($err, "Room_assigned") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Invalid Room assigning $room_assigned" . '</h2>';
           
        }
        
    }
    
    mysqli_close($link);
}
?>
<html>
</head>

<body>
    <h3 style="text-align:center;"><a class=" btn btn-link ml-2" href="add_show_inpatient.php"><strong>Go back</strong> <br>
            <p>
        </a> for inserting more in patients</h3>
    </p>
    </p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>