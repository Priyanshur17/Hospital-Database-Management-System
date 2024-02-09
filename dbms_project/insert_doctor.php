<?php
include_once 'config.php';
if (isset($_POST['save'])) {

    $Doc_ID  = $_POST['Doc_ID'];
    $Doc_fname = $_POST['Doc_fname'];
    $Doc_mname = $_POST['Doc_mname'];
    $Doc_lname = $_POST['Doc_lname'];
    $Doc_gender = $_POST['Doc_gender'];
    $Doc_DOB = $_POST['Doc_DOB'];
    $Doc_contactno = $_POST['Doc_contactno'];
    $Doc_emailID = $_POST['Doc_emailID'];
    $Doc_Address = $_POST['Doc_Address'];
    $Doc_Specialist = $_POST['Doc_Specialist'];
    $Doc_DeptID = $_POST['Doc_DeptID'];
    $Doc_charge = $_POST['Doc_charge'];




    $sql = "INSERT INTO `Doctor_info`(`Doc_ID`, `Doc_fname`, `Doc_mname`, `Doc_lname`, `Doc_gender`, `Doc_DOB`, `Doc_contactno`, `Doc_emailID`, `Doc_Address`, `Doc_Specialist`, `Doc_DeptID`, `Doc_charge`) VALUES ('$Doc_ID','$Doc_fname','$Doc_mname','$Doc_lname','$Doc_gender','$Doc_DOB','$Doc_contactno','$Doc_emailID','$Doc_Address','$Doc_Specialist','$Doc_DeptID','$Doc_charge')";


     try {
        if (mysqli_query($link, $sql)) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">doctor record added successfully.</h2>';
        } 
    } catch (Exception $e) {
        $err = $e->getMessage();
       // echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' . $err . '</h2>';
           
        if ( stripos($err, "Doc_emailID") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Email already registerd . Please try with diffeent one." . '</h2>';
            goto label;
        }
        if (stripos($err, "Duplicate entry") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Duplicate entry with $Doc_ID" . '</h2>';
            
        }
        if (stripos($err, "foreign key") !== false) {
            echo '<h2 style="text-align:center;margin-top:3vw;font-family:arial">' ."Invalid department $Doc_DeptID, Please check or try agian" . '</h2>';
            
        }
    }
    label:
  
    mysqli_close($link);
}
?>

<html>
</head>

<body>

    <p>

        <a class="btn btn-link ml-2" href="insert_doc_process.php">Go back for inserting More doctors</a>
    </p>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>
<?php
