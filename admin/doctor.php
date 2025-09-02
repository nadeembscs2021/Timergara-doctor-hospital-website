<?php
include'navber.php';
include '../database/config.php';

// 🟢 Handle Add Doctor
if (isset($_POST['addDoctor'])) {
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $specialization = $_POST['specialization'];
  $department_id = $_POST['department_id'];
  $image = $_POST['image'];
    $time =$_POST['time'];

  $sql = "INSERT INTO doctor (d_name, d_contact, specialization, deptt_id,image,time)
          VALUES ('$name', '$contact', '$specialization', '$department_id','$image','$time')";
  if (mysqli_query($conn, $sql)) {
    header("Location: dashboard.php");
    exit();
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}


// 🟡 Handle Delete Doctor
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $sql = "DELETE FROM doctor WHERE doctor_id = $id";
  
  if (mysqli_query($conn, $sql)) {
    header("Location: doctor.php");
    exit();
  } else {
    echo "Error deleting doctor: " . mysqli_error($conn);
  }
}


// 🔵 Handle Edit Doctor
if (isset($_POST['updateDoctor'])) {
  $id = $_POST['doctor_id'];
  $name = $_POST['name'];
  $contact = $_POST['contact'];
  $specialization = $_POST['specialization'];
  $department_id = $_POST['department_id'];
  $image = $_POST['image'];
  $time =$_POST['time'];

  $stmt = $conn->prepare("UPDATE doctor SET d_name=?, d_contact=?, specialization=?, deptt_id=? ,image=? ,time=? WHERE doctor_id=?");
  $stmt->bind_param("sssissi", $name, $contact, $specialization, $department_id,$image, $time, $id);
  $stmt->execute();
  $stmt->close();
  header("Location: doctor.php");
  exit();
}

// 🔍 Fetch doctors
$doctors = $conn->query("SELECT doctor.*, department.deptt_name AS dept_name 
                         FROM doctor 
                         JOIN department ON doctor.deptt_id = department.deptt_id");


// 🔍 Fetch departments for dropdown
$departments = $conn->query("SELECT * FROM department");

// ✏️ Check if editing
$editing = false;
$editData = null;
if (isset($_GET['edit'])) {
  $editing = true;
  $editId = $_GET['edit'];
  $editQuery = $conn->query("SELECT * FROM doctor WHERE doctor_id = $editId");
  $editData = $editQuery->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Doctors - Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-4">
  <h2 class="mb-4 text-center text-primary">Manage Doctors</h2>

  <!-- Add/Edit Doctor Form -->
  <div class="card mb-4 shadow-sm">
    <div class="card-header bg-primary text-white"><?= $editing ? 'Edit Doctor' : 'Add New Doctor' ?></div>
    <div class="card-body">
      <form method="POST" action="">
        <?php if ($editing): ?>
          <input type="hidden" name="doctor_id" value="<?= $editData['doctor_id'] ?>">
        <?php endif; ?>
        <div class="row g-3">
          <div class="col-md-4">
            <label class="form-label">Doctor Name</label>
            <input type="text" name="name" class="form-control" value="<?= $editing ? $editData['d_name'] : '' ?>" required>
          </div>
          <div class="col-md-4">
            <label class="form-label">Contact</label>
            <input type="text" name="contact" class="form-control" value="<?= $editing ? $editData['d_contact'] : '' ?>" required>
          </div>
          <div class="col-md-4">
            <label class="form-label">Specialization</label>
            <input type="text" name="specialization" class="form-control" value="<?= $editing ? $editData['specialization'] : '' ?>" required>
          </div>
          <div class="col-md-4">
            <label class="form-label">Department</label>
            <select name="department_id" class="form-select" required>
              <option disabled <?= $editing ? '' : 'selected' ?>>-- Select Department --</option>
              <?php while($dept = $departments->fetch_assoc()): ?>
                <option value="<?= $dept['deptt_id'] ?>" 
                  <?= $editing && $editData['deptt_id'] == $dept['deptt_id'] ? 'selected' : '' ?>>
                  <?= $dept['deptt_name'] ?>
                </option>
              <?php endwhile; ?>
            </select>
          </div>
            <div class="col-md-4">
            <label class="form-label">Dr image</label>
            <input type="text" name="image" class="form-control" value="<?= $editing ? $editData['image'] : '' ?>" required>
          </div>
          <div class="col-md-4">
            <label class="form-label">Available time</label>
            <input type="text" name="time" class="form-control" value="<?= $editing ? $editData['time'] : '' ?>" required>
          </div>
        
          <div class="col-12">
            <?php if ($editing): ?>
              <button type="submit" name="updateDoctor" class="btn btn-warning">Update Doctor</button>
              <a href="doctor.php" class="btn btn-secondary">Cancel</a>
            <?php else: ?>
              <button type="submit" name="addDoctor" class="btn btn-success">Add Doctor</button>
            <?php endif; ?>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Doctors Table -->
  <div class="card shadow-sm">
    <div class="card-header bg-secondary text-white">Doctors List</div>
    <div class="card-body table-responsive">
      <table class="table table-striped table-bordered align-middle text-center">
        <thead class="table-dark">
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Contact</th>
          <th>Specialization</th>
          <th>Department</th>
          <th>Available time</th>
          <th>Image</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row = $doctors->fetch_assoc()): ?>
          <tr>
            <td><?= $row['doctor_id'] ?></td>
            <td><?= $row['d_name'] ?></td>
            <td><?= $row['d_contact'] ?></td>
            <td><?= $row['specialization'] ?></td>
            <td><?= $row['dept_name'] ?></td>
            <td><?= $row['time'] ?></td>
            <td><?= $row['image'] ?></td>
            <td>
              <a href="doctor.php?edit=<?= $row['doctor_id'] ?>" class="btn btn-sm btn-primary">Edit</a>
              <a href="doctor.php?delete=<?= $row['doctor_id'] ?>" class="btn btn-sm btn-danger"
                 onclick="return confirm('Are you sure you want to delete this doctor?')">Delete</a>
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
