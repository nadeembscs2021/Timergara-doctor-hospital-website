<!-- Sidebar -->
<div class="sidebar bg-dark" id="sidebar">
    <div class="sidebar-header p-3">
        <h5 class="text-white">Navigation Menu</h5>
    </div>
    
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>" href="dashboard.php">
                <i class="fa fa-dashboard mr-2"></i> Dashboard
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'doctors.php' ? 'active' : ''; ?>" href="doctors.php">
                <i class="fa fa-user-md mr-2"></i> Doctors
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'patients.php' ? 'active' : ''; ?>" href="patients.php">
                <i class="fa fa-procedures mr-2"></i> Patients
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'appointments.php' ? 'active' : ''; ?>" href="appointments.php">
                <i class="fa fa-calendar-check-o mr-2"></i> Appointments
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'departments.php' ? 'active' : ''; ?>" href="departments.php">
                <i class="fa fa-building mr-2"></i> Departments
            </a>
        </li>
        
        <li class="nav-item mt-3">
            <hr class="bg-secondary">
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa fa-cog mr-2"></i> Settings
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="logout.php">
                <i class="fa fa-sign-out mr-2"></i> Logout
            </a>
        </li>
    </ul>
</div>

<!-- Main Content Wrapper -->
<div class="main-content" id="main-content">