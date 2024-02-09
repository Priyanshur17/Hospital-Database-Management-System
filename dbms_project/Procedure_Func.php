<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <form method="post" action="Proc_Func_Process.php">
      <h3>Display No. of Patients on a Particular Day</h3>
      <div class="form-group">
        <label for="dayno">Day of the Week (1-7, Sunday to Monday):</label>
        <input type="text" class="form-control" id="dayno" name="dayno">
      </div>
      <button type="submit" name="save" class="btn btn-primary">Submit</button>
      <a class="btn btn-link ml-2" href="index.php">Cancel</a>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>