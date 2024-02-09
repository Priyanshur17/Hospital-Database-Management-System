<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {

    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .nav-item.dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-item:hover {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg  navbar-dark bg-dark">
        <a class="navbar-brand" href="#">HospitalP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- Staff Management Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="staffDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Staff Management
                    </a>
                    <div class="dropdown-menu" aria-labelledby="staffDropdown">
                        <a href="Staff_InsertForm.php" class="dropdown-item">Add/Show Staff</a>
                        <a href="insert_doc_process.php" class="dropdown-item">Add Doctor Info</a>
                        <a href="show_doc_department.php" class="dropdown-item">Show doctors by department</a>
                        <a href="add_update_hod.php" class="dropdown-item">Add/Update HOD</a>

                    </div>
                </li>

                <!-- Medicines Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="medicinesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Medicines
                    </a>
                    <div class="dropdown-menu" aria-labelledby="medicinesDropdown">
                        <a href="show_addmedicines.php" class="dropdown-item">Show/Add medicines</a>
                        <a href="medicines_update.php" class="dropdown-item">Update/Delete medicines</a>

                    </div>
                </li>

                <!-- Patients Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="patientsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Patients
                    </a>
                    <div class="dropdown-menu" aria-labelledby="patientsDropdown">
                        <a href="Patient_personal_info.php" class="dropdown-item">create new patient</a>
                        <a href="Delete_patient.php" class="dropdown-item">delete patient record</a>
                        <a href="Outdoor_patients.php" class="dropdown-item">Show Outdoor Patients</a>
                        <a href="add_show_inpatient.php" class="dropdown-item">Add/Show in patients</a>
                        <a href="age_category.php" class="dropdown-item">display patients Age and Age category</a>
                        <a href="bloodgroup.php" class="dropdown-item">Check Patient's by Blood Group</a>
                        <a href="Show_pat_Month.php" class="dropdown-item">Show patient this Month</a>
                        <a href="Procedure5.php" class="dropdown-item">display patients on weekend</a>
                        <a href="Procedure_Func.php" class="dropdown-item">Show No of patients on a particular day</a>

                    </div>
                </li>

                <!-- Appointments Dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="appointmentsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Appointments
                    </a>
                    <div class="dropdown-menu" aria-labelledby="appointmentsDropdown">

                        <a href="procedure1_appointments.php" class="dropdown-item">Show Appointments </a>
                        <a href="create_appointment.php" class="dropdown-item">Create an Appointment</a>
                        <a href="create_visit.php" class="dropdown-item">Add Patient Visit</a>
                        <a href="Insert_Procedure3b.php" class="dropdown-item">Show Visits Year Wise</a>
                        <a href="Insert_Procedure_yearwiseAPP.php" class="dropdown-item">Show Appointments year Wise</a>
                        <a href="ShowMaxdoc_App.php" class="dropdown-item">Show Doctors with Maximum Appointments</a>
                        <a href="ShowMaxPat_App.php" class="dropdown-item">Show Patients with Maximum Appointments</a>

                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="appointmentsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More
                    </a>
                    <div class="dropdown-menu" aria-labelledby="appointmentsDropdown">

                        <a href="Room_insert.php" class="dropdown-item">Add Rooms</a>
                        <a href="PrintBill.php" class="dropdown-item">Final Bill</a>
                    </div>
                </li>
            </ul>
        </div>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item mr-2">
                <a class="nav-link btn btn-primary btn-sm text-light" href="reset-password.php">Reset Password</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-danger btn-sm text-light" href="logout.php">Sign Out</a>
            </li>
        </ul>

    </nav>
    <h1 class="text-center my-4">Hi, <b><?php echo $_SESSION['user']; ?></b></h1>


    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6">
                <h1>Welcome to<br> HospitalP</h1>
                <p class="lead">Our mission is to provide exceptional healthcare services and ensure the efficient management of our hospital. Here's what we offer:</p>
            </div>
        </div>
        <div class="row mb-5 mt-2">
            <div class="col-lg-4">
                <div class="card">
                    <img src="https://plus.unsplash.com/premium_photo-1673958771843-12c73b278bd0?q=80&w=3870&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Patient Records">
                    <div class="card-body">
                        <h3 class="card-title">Patient Records</h3>
                        <p class="card-text">Easily create and manage patient records, including personal information and medical history, all in one place.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="https://plus.unsplash.com/premium_photo-1664302336737-37fce6daca3c?w=1000&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8ZG9jdG9yJTIwcGF0aWVudHxlbnwwfHwwfHx8MA%3D%3D" class="card-img-top" alt="Appointments">
                    <div class="card-body">
                        <h3 class="card-title">Appointments</h3>
                        <p class="card-text">Effortlessly schedule and track patient appointments, ensuring a smooth and organized healthcare process.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1585435557343-3b092031a831?q=80&w=3870&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="card-img-top" alt="Medicine Management">
                    <div class="card-body">
                        <h3 class="card-title">Medicines</h3>
                        <p class="card-text">Stay in control of your hospital's medicine inventory, add new medicines, and manage stock efficiently.</p>
                    </div>
                </div>
            </div>
        </div>


    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
</body>
<footer class="bg-dark text-light py-2">
    <div class="container">
        <div class="col-md-6">
            <h4>Contact Us</h4>
            <p>If you have any questions or need assistance, feel free to reach out to our team. We're here to help.</p>
        </div>

        <p class="text-center mb-0">&copy; <?php echo date("Y"); ?> HospitalP. All rights reserved.</p>
    </div>
</footer>

</html>