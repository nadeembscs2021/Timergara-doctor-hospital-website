<?php
include '../database/config.php';
include 'navber.php';

$success = $error = "";

// ✅ Handle Delete Request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    if (mysqli_query($conn, "DELETE FROM appointment WHERE id = $id")) {
        $success = "Appointment deleted successfully.";
    } else {
        $error = "Error deleting appointment: " . mysqli_error($conn);
    }
}

// ✅ Handle Update Request (with optional email notification)
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    // Get email and patient name
    $infoQuery = mysqli_query($conn, "SELECT email, patient_name FROM appointment WHERE id = $id");
    $info = mysqli_fetch_assoc($infoQuery);
    $email = $info['email'];
    $patient_name = $info['patient_name'];

    // Update status in database
    $sql = "UPDATE appointment SET status = '$status' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        $success = "Appointment updated successfully.";

        // ✅ Optional email notification
        $subject = "Your Appointment Status Updated";
        $message = "Dear $patient_name,\n\nYour appointment status has been updated to: $status.\n\nRegards,\nDoctor Hospital Timergara";
        $headers = "From: hospital@example.com"; // Replace with your sender email

        if (!empty($email)) {
            @mail($email, $subject, $message, $headers); // Send mail silently
        }

    } else {
        $error = "Error updating appointment: " . mysqli_error($conn);
    }
}

// ✅ Fetch All Appointments with Doctor & Department Info
$query = "
SELECT 
  a.*, d.d_name AS doctor_name, dept.deptt_name AS department_name
FROM appointment a
JOIN doctor d ON a.doctor_id = d.doctor_id
JOIN department dept ON a.department_id = dept.deptt_id
ORDER BY a.appointment_date DESC
";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Appointments</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
  <h2 class="mb-4 text-center text-primary">Appointment Management</h2>

  <?php if ($success): ?>
    <div class="alert alert-success"><?= $success ?></div>
  <?php endif; ?>
  <?php if ($error): ?>
    <div class="alert alert-danger"><?= $error ?></div>
  <?php endif; ?>

  <table class="table table-bordered table-striped text-center align-middle">
    <thead class="table-dark">
      <tr>
        <th>#</th>
        <th>Patient</th>
        <th>Phone</th>
        <th>Doctor</th>
        <th>Department</th>
        <th>Date</th>
        <th>Time</th>
        <th>Message</th>
        <th>Status</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if (mysqli_num_rows($result) > 0): ?>
        <?php $i = 1; while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= $i++ ?></td>
            <td><?= $row['patient_name'] ?> <br><small><?= $row['email'] ?></small></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['doctor_name'] ?></td>
            <td><?= $row['department_name'] ?></td>
            <td><?= $row['appointment_date'] ?></td>
            <td><?= $row['preferred_time'] ?></td>
            <td><?= $row['message'] ?></td>
            <td>
              <form method="POST" class="d-flex gap-1">
                <input type="hidden" name="id" value="<?= $row['id'] ?>">
                <select name="status" class="form-select form-select-sm">
                  <option value="Pending" <?= $row['status'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                  <option value="Approved" <?= $row['status'] == 'Approved' ? 'selected' : '' ?>>Approved</option>
                  <option value="Cancelled" <?= $row['status'] == 'Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                  <option value="Suspended" <?= $row['status'] == 'Suspended' ? 'selected' : '' ?>>Suspended</option>
                </select>
                <button type="submit" name="update" class="btn btn-sm btn-warning">Update</button>
              </form>
            </td>
            <td>
              <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="10">No appointments found.</td></tr>
      <?php endif; ?>
    </tbody>
  </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php mysqli_close($conn); ?>
