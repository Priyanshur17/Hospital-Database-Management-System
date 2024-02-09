<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <form method="post" action="Room_process.php">
        <div class="container col-md-4 my-5">
            <h2 class="mb-4">Insert Room</h2>
            <div class="mb-3">
                <label for="Room_ID" class="form-label">Room ID</label>
                <input type="text" class="form-control" id="Room_ID" name="Room_ID" required>
            </div>
            <div class="mb-3">
                <label for="Room_Type" class="form-label">Room Type</label>
                <input type="text" class="form-control" id="Room_Type" name="Room_Type" required>
            </div>
            <div class="mb-3">
                <label for="Room_Charge" class="form-label">Room Charge(in Rs)</label>
                <input type="number" class="form-control" id="Room_Charge" name="Room_Charge" required>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-link ml-2" href="index.php">Cancel</a>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>