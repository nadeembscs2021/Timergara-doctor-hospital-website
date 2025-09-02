
<nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top py-3">
  <div class="container">
    <a class="navbar-brand d-flex align-items-center" href="index.php">
      <i class="fas fa-hospital me-2" aria-hidden="true"></i>
      <span>Doctors Hospital</span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>" href="index.php">
            Home
          </a>
        </li>

       <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'doctors.php') echo 'active'; ?>" href="doctors.php">
           Doctors
          </a>
        </li>
  <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'departments.php') echo 'active'; ?>" href="departments.php">
            Departments
          </a>
        </li>
  <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'appointments.php') echo 'active'; ?>" href="appointments.php">
            Appointments
          </a>
        </li>
  <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'contact.php') echo 'active'; ?>" href="contact.php">
            Contact
          </a>
        </li>
  <li class="nav-item">
          <a class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'login.php') echo 'active'; ?>" href="login.php">
            <i class="fas fa-sign-in-alt me-1"></i> 
            Login
          </a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>