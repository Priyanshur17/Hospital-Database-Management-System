<?php
include 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Room_ID = $_POST['Room_ID'];
    $Room_Type = $_POST['Room_Type'];
    $Room_Charge = $_POST['Room_Charge'];
    $sql = "INSERT INTO `Rooms`(`Room_ID`, `Room_Type`, `Room_Charge`) VALUES ('$Room_ID','$Room_Type','$Room_Charge')";
    // if (mysqli_query($link, $sql)) {
    //     echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">Room added successfully.</h2>';
    //     echo '<p style="text-align:center;font-family:arial"><a href="Room_insert.php">Go back </a>and add other rooms</p>';
    //     exit();
    // } else {
    //     echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' . "Duplicate entry of $Room_ID" . '</h2>';
    // }

    try {
        if (mysqli_query($link, $sql)) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">Room added successfully.</h2>';
        } 
    } catch (Exception $e) {
        $err = $e->getMessage();
    
        if (stripos($err, "Duplicate entry") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Duplicate entry with $Room_ID" . '</h2>';
            
        }
    }

    mysqli_close($link);
}
?>
<br>
<center><strong><a class="btn btn-link ml-2" href="Room_insert.php">Go back</a></strong></center>