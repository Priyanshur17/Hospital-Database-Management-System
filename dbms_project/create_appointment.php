<!DOCTYPE html>
<html>

<head>
    <title> Create Appointments </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="col-md-6 mx-5">
        <h2 class="text-center my-3">Create Appointment</h2>
        <form method="post" action="appointment_proc.php">

            <div class="form-group">
                <label for="app_id">Appointment ID</label>
                <input type="text" class="form-control" id="app_id" name="app_id" required>
            </div>
            <div class="form-group">
                <label for="pat_id">Patient ID</label>
                <input type="number" class="form-control" id="pat_id" name="pat_id" required>
            </div>
            <div class="form-group">
                <label for="doc_id">Doctor ID</label>
                <input type="text" class="form-control" id="doc_id" name="doc_id" required>
            </div>
            <div class="form-group">
                <label for="app_desc">Appointment Description</label>
                <input type="text" class="form-control" id="app_desc" name="app_desc" required>
            </div>

            <div class="form-group my-4">
                <button type="submit" class="btn btn-primary" name="save">Submit</button>
                <a class="btn btn-link ml-2" href="index.php">Cancel</a>
            </div>

        </form>
    </div>
    <div class="container my-5 mx-5">


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>