<?php
include'navber.php';
include '../database/config.php';

// ✅ Add Patient
if (isset($_POST['addPatient'])) {
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $b_group = $_POST['b_group'];

  $conn->query("INSERT INTO patient (P_name, p_contact, p_age, Gender, p_adress, B_group)
                VALUES ('$name', '$contact', '$age', '$gender', '$address', '$b_group')");
  header("Location: patient.php");
  exit();
}

// ✅ Delete Patient
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $conn->query("DELETE FROM patient WHERE patient_id = $id");
  header("Location: patient.php");
  exit();
}

// ✅ Update Patient
if (isset($_POST['updatePatient'])) {
  $id = $_POST['patient_id'];
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $address = $_POST['address'];
  $b_group = $_POST['b_group'];

  $conn->query("UPDATE patient SET 
                  P_name = '$name',
                  p_contact = '$contact',
                  p_age = '$age',
                  Gender = '$gender',
                  p_adress = '$address',
                  B_group = '$b_group'
                WHERE patient_id = $id");
  header("Location: patient.php");
  exit();
}

// ✅ Fetch All Patients
$patients = $conn->query("SELECT * FROM patient");

// ✅ Check for Edit Mode
$edit = false;
$editData = null;
if (isset($_GET['edit'])) {
  $edit = true;
  $editId = $_GET['edit'];
  $result = $conn->query("SELECT * FROM patient WHERE patient_id = $editId");
  $editData = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Patients - Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-4">
    <h2 class="mb-4 text-center text-primary">Manage Patients</h2>

    <!-- Add/Edit Patient Form -->
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-primary text-white"><?= $edit ? 'Edit Patient' : 'Add New Patient' ?></div>
      <div class="card-body">
        <form method="POST" action="">
          <?php if ($edit): ?>
            <input type="hidden" name="patient_id" value="<?= $editData['patient_id'] ?>">
          <?php endif; ?>
          <div class="row g-3">
            <div class="col-md-4">
              <label class="form-label">Patient Name</label>
              <input type="text" name="name" class="form-control" value="<?= $edit ? $editData['P_name'] : '' ?>" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Contact</label>
              <input type="text" name="contact" class="form-control" value="<?= $edit ? $editData['p_contact'] : '' ?>" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Age</label>
              <input type="text" name="age" class="form-control" value="<?= $edit ? $editData['p_age'] : '' ?>" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Gender</label>
              <select name="gender" class="form-select" required>
                <option disabled <?= $edit ? '' : 'selected' ?>>-- Select Gender --</option>
                <option value="Male" <?= $edit && $editData['Gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                <option value="Female" <?= $edit && $editData['Gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                <option value="Other" <?= $edit && $editData['Gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Address</label>
              <input type="text" name="address" class="form-control" value="<?= $edit ? $editData['p_adress'] : '' ?>" required>
            </div>
            <div class="col-md-4">
              <label class="form-label">Blood Group</label>
              <input type="text" name="b_group" class="form-control" value="<?= $edit ? $editData['B_group'] : '' ?>" >
            </div>
            <div class="col-12">
              <?php if ($edit): ?>
                <button type="submit" name="updatePatient" class="btn btn-warning">Update Patient</button>
                <a href="patient.php" class="btn btn-secondary">Cancel</a>
              <?php else: ?>
                <button type="submit" name="addPatient" class="btn btn-success">Add Patient</button>
              <?php endif; ?>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Patients Table -->
    <div class="card shadow-sm">
      <div class="card-header bg-secondary text-white">Patients List</div>
      <div class="card-body table-responsive">
        <table class="table table-striped table-bordered align-middle text-center">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Contact</th>
              <th>Age</th>
              <th>Gender</th>
              <th>Address</th>
              <th>Blood Group</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $patients->fetch_assoc()): ?>
              <tr>
                <td><?= $row['patient_id'] ?></td>
                <td><?= $row['P_name'] ?></td>
                <td><?= $row['p_contact'] ?></td>
                <td><?= $row['p_age'] ?></td>
                <td><?= $row['Gender'] ?></td>
                <td><?= $row['p_adress'] ?></td>
                <td><?= $row['B_group'] ?></td>
                <td>
                  <a href="patient.php?edit=<?= $row['patient_id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                  <a href="patient.php?delete=<?= $row['patient_id'] ?>" class="btn btn-sm btn-danger"
                     onclick="return confirm('Are you sure you want to delete this patient?')">Delete</a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>
