<?php
// Include database connection
include "../database/config.php";

// Fetch all departments from database
$dept_query = "SELECT * FROM department";
$dept_result = mysqli_query($conn, $dept_query);

// Check if we're viewing a specific doctor profile
$viewing_doctor = false;
$doctor_details = null;

if(isset($_GET['doctor_id'])) {
    $doctor_id = intval($_GET['doctor_id']);
    $doctor_query = "SELECT * FROM doctor WHERE doctor_id = $doctor_id";
    $doctor_result = mysqli_query($conn, $doctor_query);
    
    if(mysqli_num_rows($doctor_result) > 0) {
        $viewing_doctor = true;
        $doctor_details = mysqli_fetch_assoc($doctor_result);
    }
}

// Create an array to store departments with their doctors
$departments = array();

if(mysqli_num_rows($dept_result) > 0) {
    while($dept = mysqli_fetch_assoc($dept_result)) {
        // Get doctors for this department
        $doctor_query = "SELECT * FROM doctor WHERE deptt_id = ".$dept['deptt_id'];
        $doctor_result = mysqli_query($conn, $doctor_query);
        $doctors = array();
        
        if(mysqli_num_rows($doctor_result) > 0) {
            while($doctor = mysqli_fetch_assoc($doctor_result)) {
                $doctors[] = $doctor;
            }
        }
        
        $departments[] = array(
            'dept' => $dept,
            'doctors' => $doctors
        );
    }
}

// Define icons for each department type
$department_icons = array(
    'Cardiology' => 'fa-heartbeat',
    'Pulmonary' => 'fa-lungs',
    'Neurology' => 'fa-brain',
    'Orthopedics' => 'fa-bone',
    'Dental Surgery' => 'fa-tooth',
    'Laboratory' => 'fa-vials',
    'Default' => 'fa-hospital'
);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $viewing_doctor ? "Doctor Profile" : "Medical Departments"; ?></title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/departments.css" />
    
  </head>
  <body>
    <!-- Navbar -->
    <?php include '../includes/navbar.php'; ?>
    
    <!-- Main Content -->
    <main id="main-content">
      <?php if($viewing_doctor && $doctor_details): ?>
        <!-- Doctor Profile Section -->
       <section class="doctor-profile-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 text-center">
                <img style="width:150px; height:150px; border-radius:100%; border:none" src="<?php echo !empty($doctor_details['image']) ? '../assets/images/'.$doctor_details['image'] : '../assets/images/doctor-placeholder.jpg'; ?>" 
                     alt="<?php echo htmlspecialchars($doctor_details['d_name']); ?>" class="doctor-modal-img" />
                <h2 class="mt-3"><?php echo htmlspecialchars($doctor_details['d_name']); ?></h2>
                <p class="text-muted"><?php echo htmlspecialchars($doctor_details['specialization']); ?></p>
                <div class="mb-4">
                    <span class="badge bg-primary">MBBS</span>
                    <span class="badge bg-success ms-2"><?php echo rand(5,20); ?>+ Years</span>
                </div>
                <a href="appointments.php?doctor=<?php echo $doctor_details['doctor_id']; ?>" class="btn btn-primary">
                    <i class="fas fa-calendar-check me-2"></i>Book Appointment
                </a>
                <a href="departments.php" class="btn btn-outline-secondary ms-2 mt-3">
                    <i class="fas fa-arrow-left me-2"></i>Back to Departments
                </a>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                       
                        
                        <h4 class="card-title">About</h4>
                        <p class="card-text">
                            <?php 
                            echo "Dr. ".htmlspecialchars($doctor_details['d_name'])." is a specialist in ".htmlspecialchars($doctor_details['specialization'])." with extensive experience in the field.";
                            ?>
                        </p>
                        
                        <h4 class="mt-4">Contact Information</h4>
                        <p><i class="fas fa-phone me-2"></i> <?php echo htmlspecialchars($doctor_details['d_contact'] ?: 'Not available'); ?></p>
                        
                        <h4 class="mt-4">Specializations</h4>
                        <div>
                            <?php 
                            $specializations = explode(',', $doctor_details['specialization']);
                            foreach($specializations as $spec) {
                                echo '<span class="badge bg-secondary me-2 mb-2">'.trim(htmlspecialchars($spec)).'</span>';
                            }
                            ?>
                        </div>
                        
                        <h4 class="mt-4">Availability</h4>
                        <p><i class="fas fa-calendar-alt me-2"></i> Monday to Friday: 9:00 AM - 5:00 PM</p>
                        
                        <h4 class="mt-4">Department</h4>
                        <?php 
                        $dept_query = "SELECT deptt_name FROM department WHERE deptt_id = ".$doctor_details['deptt_id'];
                        $dept_result = mysqli_query($conn, $dept_query);
                        if(mysqli_num_rows($dept_result) > 0) {
                            $dept = mysqli_fetch_assoc($dept_result);
                            echo '<p><i class="fas fa-hospital me-2"></i> '.htmlspecialchars($dept['deptt_name']).' Department</p>';
                        }
                        ?>
  
                  
                </div>
            </div>
        </div>
    </div>
</section>
      
      <?php else: ?>
        <!-- Departments Listing (original content) -->
        <section class="department-hero position-relative">
          <img src="../assets/images/header-page.jpg" alt="Doctors Hospital Timergara Departments" 
               class="img-fluid w-100" style="height: 300px; object-fit: cover" />
          <div class="hero-overlay d-flex align-items-center">
            <div class="container text-center text-white">
              <h1 class="display-5 fw-bold mb-3">Our Medical Departments</h1>
              <p class="lead">Specialized care for all your healthcare needs</p>
            </div>
          </div>
        </section>

        <section class="departments-section py-5 bg-light">
          <div class="container">
            <div class="text-center mb-5">
              <div class="badge bg-primary text-white fs-5 rounded-pill px-4 py-2 mb-3">
                Specialized Care
              </div>
              <h2 class="mb-3">Comprehensive Healthcare Services</h2>
              <p class="lead text-muted">
                Explore our specialized medical departments
              </p>
            </div>

            <div class="row g-4">
              <?php if(!empty($departments)): ?>
                <?php foreach($departments as $department): 
                  $dept = $department['dept'];
                  $doctors = $department['doctors'];
                  $dept_slug = strtolower(str_replace(' ', '-', $dept['deptt_name']));
                  $icon = isset($department_icons[$dept['deptt_name']]) ? $department_icons[$dept['deptt_name']] : $department_icons['Default'];
                ?>
                  <div class="col-lg-4 col-md-6">
                    <div class="department-container">
                      <div class="card department-card h-100 border-0 shadow-sm">
                        <div class="card-body p-4 text-center">
                          <div class="icon-circle bg-primary text-white mb-4 mx-auto">
                            <i class="fas <?php echo $icon; ?> fa-2x"></i>
                          </div>
                          <h3 class="h4 mb-3"><?php echo htmlspecialchars($dept['deptt_name']); ?></h3>
                          <p class="mb-4">
                            <?php 
                            // You could add a description field to your department table
                            // For now using a placeholder
                            echo "Comprehensive care with advanced diagnostic tools and treatment procedures. Our specialists provide expert care in this field.";
                            ?>
                          </p>
                          <button class="btn btn-outline-primary learn-more-btn" data-dept="<?php echo $dept_slug; ?>">
                            <i class="fas fa-plus me-2"></i>View Doctors
                          </button>
                        </div>
                      </div>
                      
                      <!-- Doctors for this Department -->
                      <?php if(!empty($doctors)): ?>
                        <div class="department-doctors card  border border-3 shadow-sm" id="<?php echo $dept_slug; ?>-doctors">
                          <div  class="card-body p-4">
                            <h4 class="text-center mb-4">Our <?php echo htmlspecialchars($dept['deptt_name']); ?> Specialists</h4>
                            <div class="row g-3">
                              <?php foreach($doctors as $doctor): ?>
                                <div class="col-md-<?php echo count($doctors) > 1 ? '6' : '12'; ?>">
                                  <div class="card doctor-card h-100 border-0 shadow-sm">
                                    <div class="card-body p-4">
                                      <div class="text-center mb-3">
                                        <img src="<?php echo !empty($doctor['image']) ? '../assets/images/'.$doctor['image'] : '../assets/images/doctor-placeholder.jpg'; ?>" 
                                             alt="<?php echo htmlspecialchars($doctor['d_name']); ?>" class="doctor-modal-img" />
                                      </div>
                                      <h5 class="text-center mb-2"><?php echo htmlspecialchars($doctor['d_name']); ?></h5>
                                      <p class="text-muted text-center mb-3">
                                        <?php echo htmlspecialchars($doctor['specialization']); ?>
                                      </p>
                                      <div class="text-center mb-3">
                                        <span class="badge bg-primary doctor-badge">MBBS</span>
                                        <span class="badge bg-success doctor-badge"><?php echo rand(5,20); ?>+ Years</span>
                                      </div>
                                      <p class="mb-3">
                                        <?php 
                                        // You could add a bio field to your doctor table
                                        echo "Specializes in ".htmlspecialchars($doctor['specialization'])." with extensive experience in the field.";
                                        ?>
                                      </p>
                                      <div class="d-flex justify-content-center">
                                        <a href="appointments.php?doctor=<?php echo $doctor['doctor_id']; ?>" class="btn btn-primary btn-sm me-2">
                                          <i class="fas fa-calendar-check me-1"></i>Book
                                        </a>
                                        <a href="departments.php?doctor_id=<?php echo $doctor['doctor_id']; ?>" class="btn btn-outline-primary btn-sm">
                                          <i class="fas fa-user me-1"></i>Profile
                                        </a>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              <?php endforeach; ?>
                            </div>
                          </div>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="col-12 text-center py-5">
                  <h4>No departments found</h4>
                  <p>Please check back later or contact administration</p>
                </div>
              <?php endif; ?>
            </div>
          </div>
        </section>

        <!-- Call to Action -->
        <section class="cta-section py-5 bg-primary text-white">
          <div class="container text-center">
            <h2 class="mb-4">Need Specialized Care?</h2>
            <p class="lead mb-4">
              Our expert teams are ready to provide you with the best medical treatment
            </p>
            <div class="d-flex justify-content-center gap-3">
              <a href="appointment.php" class="btn btn-light btn-lg px-4">
                <i class="fas fa-calendar-check me-2"></i>Book Appointment
              </a>
              <a href="contact.php" class="btn btn-outline-light btn-lg px-4">
                <i class="fas fa-phone-alt me-2"></i>Contact Us
              </a>
            </div>
          </div>
        </section>
      <?php endif; ?>
    </main>

    <!-- Footer -->
    <?php include '../includes/footer.php'; ?>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/JS/departments.js";></script>
  </body>
</html>