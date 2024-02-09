<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <form method="post" action="insertidentify_hod.php">
      <h2>Patients with Appointments this Month</h2>
      <div class="table-responsive">
        <?php
        include_once 'config.php';
        $result = mysqli_query($link, "select distinct patient_personal_info.Pat_ID, patient_personal_info.Pat_contactno, patient_personal_info.Pat_fname, patient_personal_info.Pat_gender, appointment.app_date_time from appointment natural join patient_personal_info where month(appointment.app_date_time) = month(current_date()) and year(appointment.app_date_time) = year(current_date())");
        ?>
        <?php
        if (mysqli_num_rows($result) > 0) {
        ?>
          <table class="table table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>Pat_ID</th>
                <th>Pat_contactno</th>
                <th>Pat_fname</th>
                <th>Pat_gender</th>
                <th>App_date_time</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = 0;
              while ($row = mysqli_fetch_array($result)) {
              ?>
                <tr>
                  <td><?php echo $row["Pat_ID"]; ?></td>
                  <td><?php echo $row["Pat_contactno"]; ?></td>
                  <td><?php echo $row["Pat_fname"]; ?></td>
                  <td><?php echo $row["Pat_gender"]; ?></td>
                  <td><?php echo $row["app_date_time"]; ?></td>
                </tr>
              <?php
                $i++;
              }
              ?>
            </tbody>
          </table>
        <?php
        } else {
          echo "<p class='text-muted'>No patients found</p>";
        }
        ?>
      </div>
    </form>
    <br>
    <a class="btn btn-link ml-2" href="index.php">Cancel</a>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>