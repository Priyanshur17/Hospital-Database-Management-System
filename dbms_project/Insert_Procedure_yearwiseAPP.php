<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <form method="post" action="Procedure3a_yearwiseApp.php">
      <br>
      <br>
      <br>
      <br>
      <h3>Display Appointments for a Specific Year</h3>
      <div class="form-group">
        <label for="App_year">Appointment Year:</label>
        <input type="number" class="form-control" id="App_year" name="App_year">
      </div>
      <button type="submit" name="save" class="btn btn-primary">Submit</button>
      <a class="btn btn-link ml-2" href="index.php">Cancel</a>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>