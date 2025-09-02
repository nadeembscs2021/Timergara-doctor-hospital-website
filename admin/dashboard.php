<?php
include'navber.php';
include '../database/config.php';

// Count doctors
$doctorResult = $conn->query("SELECT COUNT(*) AS total_doctors FROM doctor");
$doctorCount = $doctorResult->fetch_assoc()['total_doctors'];

// Count patients
$patientResult = $conn->query("SELECT COUNT(*) AS total_patients FROM patient");
$patientCount = $patientResult->fetch_assoc()['total_patients'];

// Count appointments
$appointmentResult = $conn->query("SELECT COUNT(*) AS total_appointments FROM appointment");
$appointmentCount = $appointmentResult->fetch_assoc()['total_appointments'];

// Count departments
$departmentResult = $conn->query("SELECT COUNT(*) AS total_departments FROM department");
$departmentCount = $departmentResult->fetch_assoc()['total_departments'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Admin Dashboard - Doctors Hospital</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <style>
    .card-link-wrapper {
      text-decoration: none;
    }
    .card-link-wrapper:hover {
      opacity: 0.95;
    }
  </style>
</head>
<body>
  <div class="container py-4">
    <h2 class="text-center text-primary mb-4">Admin Dashboard</h2>

    <div class="row g-4">
      <!-- Doctors -->
      <div class="col-md-3">
        <a href="doctor.php" class="card-link-wrapper">
          <div class="card text-white bg-primary shadow h-100">
            <div class="card-body text-center position-relative">
              <h5 class="card-title"><i class="fas fa-user-md fa-lg me-2"></i>Doctors</h5>
              <h3 class="card-text"><?php echo $doctorCount; ?></h3>
              <span class="stretched-link"></span>
            </div>
          </div>
        </a>
      </div>

      <!-- Patients -->
      <div class="col-md-3">
        <a href="patient.php" class="card-link-wrapper">
          <div class="card text-white bg-success shadow h-100">
            <div class="card-body text-center position-relative">
              <h5 class="card-title"><i class="fas fa-user-injured fa-lg me-2"></i>Patients</h5>
              <h3 class="card-text"><?php echo $patientCount; ?></h3>
              <span class="stretched-link"></span>
            </div>
          </div>
        </a>
      </div>

      <!-- Appointments -->
      <div class="col-md-3">
        <a href="appointment.php" class="card-link-wrapper">
          <div class="card text-white bg-warning shadow h-100">
            <div class="card-body text-center position-relative">
              <h5 class="card-title"><i class="fas fa-calendar-check fa-lg me-2"></i>Appointments</h5>
              <h3 class="card-text"><?php echo $appointmentCount; ?></h3>
              <span class="stretched-link"></span>
            </div>
          </div>
        </a>
      </div>

      <!-- Departments -->
      <div class="col-md-3">
        <a href="department.php" class="card-link-wrapper">
          <div class="card text-white bg-info shadow h-100">
            <div class="card-body text-center position-relative">
              <h5 class="card-title"><i class="fas fa-building fa-lg me-2"></i>Departments</h5>
              <h3 class="card-text"><?php echo $departmentCount; ?></h3>
              <span class="stretched-link"></span>
            </div>
          </div>
        </a>
      </div>
    </div>

    <!-- Footer Note -->
    <div class="mt-5 text-center">
      <p class="text-muted">Welcome to the Doctor's hospital Timergara admin panel.</p>
    </div>
  </div>
</body>
</html>
