<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css" />
</head>

<body>
  <div class="container mt-5">
    <div class="col-md-6 mx-5">
      <h2 class="text-center my-3">Insert Patient</h2>
      <form method="post" action="insertPatientInfo.php">
        <div class="form-group">
          <label for="Pat_ID">Patient ID</label>
          <input type="number" class="form-control" id="Pat_ID" name="Pat_ID" required>
        </div>
        <div class="form-group">
          <label for="Pat_fname">First Name</label>
          <input type="text" class="form-control" id="Pat_fname" name="Pat_fname" required>
        </div>
        <div class="form-group">
          <label for="Pat_mname">Middle Name</label>
          <input type="text" class="form-control" id="Pat_mname" name="Pat_mname">
        </div>
        <div class="form-group">
          <label for="Pat_lname">Last Name</label>
          <input type="text" class="form-control" id="Pat_lname" name="Pat_lname">
        </div>

        <div class="form-group">
          <label for="Pat_gender">Gender(M or F)</label>
          <input type="text" class="form-control" id="Pat_gender" name="Pat_gender" required>
        </div>
        <div class="form-group">
          <label for="Pat_DOB">Date Of Birth</label>
          <input type="date" class="form-control" id="Pat_DOB" name="Pat_DOB" required>
        </div>

        <div class="form-group">
          <label for="Pat_contactno">Contact Number</label>
          <input type="tel" minlength="10" maxlength="10" class="form-control" id="Pat_contactno" name="Pat_contactno" required>
        </div>

        <div class="form-group">
          <label for="Pat_emailID">Email Address</label>
          <input type="email" class="form-control" id="Pat_emailID" name="Pat_emailID">
        </div>

        <div class="form-group">
          <label for="Pat_Address">Address (city)</label>
          <input type="text" class="form-control" id="Pat_Address" name="Pat_Address" required>
        </div>
        <div class="form-group">
          <label for="Pat_MedHistory">Medical history</label>
          <input type="text" class="form-control" id="Pat_MedHistory" name="Pat_MedHistory">
        </div>

        <label for="Pat_BloodGroup">Choose BloodGroup</label>
        <select class="form-select" aria-label="Default select example" name="Pat_BloodGroup" id="Pat_BloodGroup" required>
          <option selected>Choose</option>
          <option>O+ve</option>
          <option>O-ve</option>
          <option>A+ve</option>
          <option>B+ve</option>
          <option>B-ve</option>
          <option>AB+ve</option>
          <option>AB-ve</option>
        </select>
        <div class="form-group my-4">
          <button type="submit" class="btn btn-primary" name="save">Submit</button>
          <a class="btn btn-link ml-2" href="index.php">Cancel</a>
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<div class="container my-5 mx-5">
  <h3 class="mb-4">Patient Table</h3>
  <?php
  include 'config.php';
  $sql = "SELECT * FROM Patient_personal_info";
  $result = mysqli_query($link, $sql);
  $num = mysqli_num_rows($result);

  if ($result) {
    if ($num > 0) {
      echo '<div class="table-responsive">';
      echo '<table class="table table-striped">';
      echo '<thead class="thead-dark">';
      echo '<tr>';
      echo '<th>Pat_ID</th>';
      echo '<th>Pat_fname</th>';
      echo '<th>Pat_mname</th>';
      echo '<th>Pat_lname</th>';
      echo '<th>Pat_gender</th>';
      echo '<th>Pat_DOB</th>';
      echo '<th>Pat_contactno</th>';
      echo '<th>Pat_emailID</th>';
      echo '<th>Pat_Address</th>';
      echo '<th>Pat_MedHistory</th>';
      echo '<th>Pat_BloodGroup</th>';
      echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo "<td>{$row['Pat_ID']}</td>";
        echo "<td>{$row['Pat_fname']}</td>";
        echo "<td>{$row['Pat_mname']}</td>";
        echo "<td>{$row['Pat_lname']}</td>";
        echo "<td>{$row['Pat_gender']}</td>";
        echo "<td>{$row['Pat_DOB']}</td>";
        echo "<td>{$row['Pat_contactno']}</td>";
        echo "<td>{$row['Pat_emailID']}</td>";
        echo "<td>{$row['Pat_Address']}</td>";
        echo "<td>{$row['Pat_MedHistory']}</td>";
        echo "<td>{$row['Pat_BloodGroup']}</td>";
        echo '</tr>';
      }
      echo '</tbody>';
      echo '</table>';
      echo '</div>';
    } else {
      echo "No patients were found.";
    }
  } else {
    die("Failed to fetch patients data.");
  }
  ?>
</div>