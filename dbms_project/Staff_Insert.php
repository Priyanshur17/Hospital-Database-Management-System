<?php
include_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Staff_ID = $_POST['Staff_ID'];
    $Staff_fname = $_POST['Staff_fname'];
    $Staff_mname = $_POST['Staff_mname'];
    $Staff_lname = $_POST['Staff_lname'];
    $Staff_gender = $_POST['Staff_gender'];
    $Staff_contactno = $_POST['Staff_contactno'];
    $Staff_type = $_POST['Staff_type'];
    $Staff_roomassigned1 = $_POST['Staff_roomassigned1'];
    $Staff_roomassigned2 = $_POST['Staff_roomassigned2'];
    $Staff_dutystarttime = $_POST['Staff_dutystarttime'];
    $Staff_dutyendtime = $_POST['Staff_dutyendtime'];
    $Staff_holiday = $_POST['Staff_holiday'];
    $Staff_DeptID = $_POST['Staff_DeptID'];
    $Staff_Charge = $_POST['Staff_Charge'];

    $sql = "INSERT INTO `Staff` (`Staff_ID`, `Staff_fname`, `Staff_mname`, `Staff_lname`, `Staff_gender`, `Staff_contactno`, `Staff_type`, `Staff_roomassigned1`, `Staff_roomassigned2`, `Staff_dutystarttime`, `Staff_dutyendtime`, `Staff_holiday`, `Staff_DeptID`, `Staff_Charge`) VALUES ('$Staff_ID','$Staff_fname','$Staff_mname','$Staff_lname','$Staff_gender','$Staff_contactno','$Staff_type','$Staff_roomassigned1','$Staff_roomassigned2','$Staff_dutystarttime','$Staff_dutyendtime','$Staff_holiday','$Staff_DeptID','$Staff_Charge')";


    try {
        if (mysqli_query($link, $sql)) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">New record created successfully.</h2>';
        } 
    } catch (Exception $e) {
        $err = $e->getMessage();
    
        if (stripos($err, "Duplicate entry") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Duplicate entry with $Staff_ID" . '</h2>';
            
        }
    
        if (stripos($err, "foreign key constraint") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Either you are assigning an invalid room or assigning an invalid department. Please check." . '</h2>';
            
        }
        if (stripos($err, "start time") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Error: Duty start time cannot be same as Duty end time...,Please try again" . '</h2>';
        
        }
        
    }
  
    mysqli_close($link);
    
}
?>

<html>
</head>

<body>
    <p>
        <a class="btn btn-link ml-2 text-center" href="Staff_InsertForm.php">Go back for inserting More staff</a>
    </p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<?php
