<?php
include_once 'config.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $vis_id  = $_POST['vis_id'];
    $app_id  = $_POST['app_id'];
    $pat_wt  = $_POST['pat_wt'];
    $pat_ht  = $_POST['pat_ht'];
    $disease  = $_POST['disease'];
    $vis_charge  = $_POST['vis_charge'];

    $sql = "INSERT INTO `visit`(`Visit_ID`, `App_ID`, `Pat_weight`,  `Pat_height` ,`Disease_name`,`Visit_charge`) VALUES ('$vis_id','$app_id','$pat_wt','$pat_ht','$disease','$vis_charge')";


    
    try {
        if (mysqli_query($link, $sql)) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">New visit created successfully.</h2>';
        } 
    } catch (Exception $e) {
        $err = $e->getMessage();
    
        if (stripos($err, "Duplicate entry") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Duplicate entry with $vis_id , $app_id" . '</h2>';
            
        }
    
        if (stripos($err, "foreign key constraint") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Assigning an invalid  Appointment id $app_id. Please check." . '</h2>';
            
        }
      
        
    }
  
    
    mysqli_close($link);
}
?>
<html>
</head>

<body>
    <h3 style="text-align:center;"><a class=" btn btn-link ml-2" href="create_visit.php"><strong>Go back</strong> <br>
            <p>
        </a> to add more visits</h3>
    </p>
    </p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>