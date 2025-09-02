<?php
include'navber.php';
include '../database/config.php'; // database connection

// ✅ Add Department
if (isset($_POST['addDepartment'])) {
  $name = $_POST['department_name'];
  $conn->query("INSERT INTO department (deptt_name) VALUES ('$name')");
  header("Location: department.php");
  exit();
}

// ✅ Delete Department
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $conn->query("DELETE FROM department WHERE deptt_id = $id");
  header("Location: department.php");
  exit();
}

// ✅ Update Department
if (isset($_POST['updateDepartment'])) {
  $id = $_POST['dept_id'];
  $name = $_POST['department_name'];
  $conn->query("UPDATE department SET deptt_name = '$name' WHERE deptt_id = $id");
  header("Location: department.php");
  exit();
}

// ✅ Fetch All Departments
$departments = $conn->query("SELECT * FROM department");

// ✅ Check for Edit Mode
$edit = false;
$editData = null;
if (isset($_GET['edit'])) {
  $edit = true;
  $id = $_GET['edit'];
  $result = $conn->query("SELECT * FROM department WHERE deptt_id = $id");
  $editData = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Manage Departments - Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container py-4">
    <h2 class="mb-4 text-center text-primary">Manage Departments</h2>

    <!-- Add or Edit Department Form -->
    <div class="card mb-4 shadow-sm">
      <div class="card-header bg-primary text-white">
        <?= $edit ? 'Edit Department' : 'Add New Department' ?>
      </div>
      <div class="card-body">
        <form method="POST" action="">
          <div class="row g-3 align-items-end">
            <div class="col-md-6">
              <label class="form-label">Department Name</label>
              <input type="text" name="department_name" class="form-control"
                     value="<?= $edit ? $editData['deptt_name'] : '' ?>" required>
              <?php if ($edit): ?>
                <input type="hidden" name="dept_id" value="<?= $editData['deptt_id'] ?>">
              <?php endif; ?>
            </div>
            <div class="col-md-6">
              <?php if ($edit): ?>
                <button type="submit" name="updateDepartment" class="btn btn-warning">Update</button>
                <a href="department.php" class="btn btn-secondary">Cancel</a>
              <?php else: ?>
                <button type="submit" name="addDepartment" class="btn btn-success">Add Department</button>
              <?php endif; ?>
            </div>
          </div>
        </form>
      </div>
    </div>

    <!-- Departments Table -->
    <div class="card shadow-sm">
      <div class="card-header bg-secondary text-white">Departments List</div>
      <div class="card-body table-responsive">
        <table class="table table-striped table-bordered align-middle text-center">
          <thead class="table-dark">
            <tr>
              <th>ID</th>
              <th>Department Name</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $departments->fetch_assoc()): ?>
              <tr>
                <td><?= $row['deptt_id'] ?></td>
                <td><?= $row['deptt_name'] ?></td>
                <td>
                  <a href="department.php?edit=<?= $row['deptt_id'] ?>" class="btn btn-sm btn-primary">Edit</a>
                  <a href="department.php?delete=<?= $row['deptt_id'] ?>" class="btn btn-sm btn-danger"
                     onclick="return confirm('Are you sure you want to delete this department?')">Delete</a>
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
