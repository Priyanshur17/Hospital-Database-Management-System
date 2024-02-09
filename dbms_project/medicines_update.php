<?php
include 'config.php';
$result = mysqli_query($link, "SELECT * FROM Medicines");
?>

<!DOCTYPE html>
<html>

<head>
	<title>Update Medicine Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<div class="container mt-5">
		<?php if (mysqli_num_rows($result) > 0) { ?>
			<h3 class="my-4">Medicines List</h3>
			<table class="table">
				<thead>
					<tr>
						<th>Med_ID</th>
						<th>Med_Name</th>
						<th>Med_company</th>
						<th>Med_price</th>
						<th>Med_dose</th>
						<th>Med_type</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while ($row = mysqli_fetch_array($result)) {
					?>
						<tr>
							<td><?php echo $row["Med_ID"]; ?></td>
							<td><?php echo $row["Med_Name"]; ?></td>
							<td><?php echo $row["Med_company"]; ?></td>
							<td><?php echo $row["Med_price"]; ?></td>
							<td><?php echo $row["Med_dose"]; ?></td>
							<td><?php echo $row["Med_type"]; ?></td>
							<td>
								<a href="medicines_update_process.php?id=<?php echo $row["Med_ID"]; ?>" class="btn btn-primary btn-sm">Update</a>
								<a class="btn btn-danger btn-sm" href="medicines_delete_process.php?Med_ID=<?php echo $row["Med_ID"]; ?>">Delete</a>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
			<a href="index.php" class="btn btn-secondary">Cancel</a>
		<?php
		} else {
			echo
			'<div class="container my-5">
				<h2 class="text-center my-4">No medicines available</h2>
				<a class="btn btn-link d-block text-center mt-3" href="show_addmedicines.php">Go back and add medicines</a>
			</div>';
		}
		?>
		<?php
		$result = mysqli_query($link, "SELECT * FROM medicines_updates");
		if (mysqli_num_rows($result) > 0) {
		?>
			<div>
				<br>
				<h3 class="my-4">Medicines Updates data</h3>
				<table class="table">
					<thead>
						<tr>
							<th>Med_ID</th>
							<th>change_date</th>
							<th>field_name</th>
							<th>before_value</th>
							<th>after_value</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while ($row = mysqli_fetch_assoc($result)) {
						?>
							<tr>
								<td><?php echo $row["Med_ID"]; ?></td>
								<td><?php echo $row["change_date"]; ?></td>
								<td><?php echo $row["field_name"]; ?></td>
								<td><?php echo $row["before_value"]; ?></td>
								<td><?php echo $row["after_value"]; ?></td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div>
		<?php
		} else {
			echo '<h2 class="text-center my-4">No medicines update log is available</h2>';
		}
		?>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>