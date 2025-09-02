<html>
  <head>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

<!-- Font Awesome (for icons) -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
  <style>


.hover-dropdown:hover .dropdown-menu {
  display: block;
  margin-top: 0;
}

</style>

</style>

  </head>
  <body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top p-4 shadow">
  <div class="container-fluid px-4 py">
    <!-- Brand -->
    <a class="navbar-brand d-flex align-items-center" href="dashboard.php">
      <i class="fas fa-user-shield me-2"></i>Admin Panel
    </a>

    <!-- Toggler -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Links -->
    <div class="collapse navbar-collapse" id="adminNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'dashboard.php') echo 'active'; ?>" href="dashboard.php">
            <i class="fas fa-chart-line me-1"></i>Dashboard
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'doctor.php') echo 'active'; ?>" href="doctor.php">
            <i class="fas fa-user-md me-1"></i>Doctors
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'patient.php') echo 'active'; ?>" href="patient.php">
            <i class="fas fa-user-injured me-1"></i>Patients
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'appointment.php') echo 'active'; ?>" href="appointment.php">
            <i class="fas fa-calendar-check me-1"></i>Appointments
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'department.php') echo 'active'; ?>" href="department.php">
            <i class="fas fa-building me-1"></i>Departments
          </a>
        </li>

      </ul>

      <!-- Right side: Admin dropdown -->
      <ul class="navbar-nav hover-dropdown ms-auto">
        <li class="nav-item  dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
            <i class="fas fa-user-cog me-1"></i> Admin
          </a>
          <ul class="dropdown-menu dropdown-menu-end">
            <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-1"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  </body>
</html>