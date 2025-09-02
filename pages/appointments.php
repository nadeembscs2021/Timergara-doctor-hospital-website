<?php

include '../database/config.php';


$success = "";
$error = "";

// Handle appointment form submission
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submitAppointment'])) {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department_id = $_POST['department_id'];
    $doctor_id = $_POST['doctor_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $message = $_POST['message'];

    if (
        !empty($name) && !empty($age) && !empty($email) && !empty($phone) &&
        !empty($department_id) && !empty($doctor_id) &&
        !empty($date) && !empty($time)
    ) {
        $stmt = $conn->prepare("INSERT INTO appointment 
            (patient_name, age, email, phone, department_id, doctor_id, appointment_date, preferred_time, message) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssiisss", $name, $age, $email, $phone, $department_id, $doctor_id, $date, $time, $message);

        if ($stmt->execute()) {
            $success = "Appointment booked successfully!";
        } else {
            $error = "Database error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        $error = "All required fields must be filled.";
    }
}

// Fetch departments and doctors
$departments = mysqli_query($conn, "SELECT * FROM department");
$doctor_result = mysqli_query($conn, "SELECT doctor_id, d_name, deptt_id FROM doctor");

// Fetch existing appointments for JavaScript
$appointments = [];
$result = mysqli_query($conn, "SELECT doctor_id, appointment_date, preferred_time FROM appointment");
while ($row = mysqli_fetch_assoc($result)) {
    $appointments[] = $row;
}

$doctorList = [];
while ($doc = mysqli_fetch_assoc($doctor_result)) {
    $doctorList[] = $doc;
}


// get doctor id from url

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Appointment</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<?php  include '../includes/navbar.php'; ?>
  <div class="container my-5">
    <div class="card shadow p-4">
      <h2 class="mb-4">Book Your Appointment</h2>

      <?php if ($success): ?>
        <div class="alert alert-success"><?= $success ?></div>
      <?php endif; ?>
      <?php if ($error): ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php endif; ?>

      <form method="POST" action="">
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">Patient Name</label>
            <input type="text" name="name" class="form-control" required />
          </div>
          <div class="col-md-6">
            <label class="form-label">Age</label>
            <input type="text" name="age" class="form-control" required />
          </div>
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required />
          </div>
          <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input type="text" name="phone" class="form-control" required />
          </div>

          <div class="col-md-6">
            <label class="form-label">Select Department</label>
            <select name="department_id" id="departmentSelect" class="form-select" required>
              <option value="" disabled selected>Choose Department</option>
              <?php while ($dept = mysqli_fetch_assoc($departments)): ?>
                <option value="<?= $dept['deptt_id'] ?>"><?= $dept['deptt_name'] ?></option>
              <?php endwhile; ?>
            </select>
          </div>

          <div class="col-md-6">
            <label class="form-label">Select Doctor</label>
            <select name="doctor_id" id="doctorSelect" class="form-select" required>
              <option value="" disabled selected>Choose Doctor</option>
            </select>
          </div>

          <div class="col-md-6">
            <label class="form-label">Appointment Date</label>
            <input type="date" name="date" id="appointmentDate" class="form-control" min="<?= date('Y-m-d') ?>" required />
          </div>

          <div class="col-md-6">
            <label class="form-label">Preferred Time</label>
            <select name="time" id="timeSelect" class="form-select" required>
              <option value="" disabled selected>Select Time</option>
            </select>
          </div>

          <div class="col-12">
            <label class="form-label">Message</label>
            <textarea name="message" class="form-control" rows="3" placeholder="Describe symptoms or concerns..."></textarea>
          </div>

          <div class="col-12">
            <button type="submit" name="submitAppointment" class="btn btn-primary w-100">
              <i class="fas fa-calendar-check me-2"></i>Book Appointment
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php include '../includes/footer.php'; ?>

  <!-- JavaScript Section -->
 
<script>
  const doctorData = <?= json_encode($doctorList) ?>;
  const appointmentsData = <?= json_encode($appointments) ?>;
</script>
<script src="../assets/JS/appointments.js"></script>


  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php mysqli_close($conn); ?>
