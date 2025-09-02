<?php
// Database connection
require_once '../database/config.php';

// Fetch featured departments
$dept_query = "SELECT * FROM department LIMIT 3";
$dept_result = mysqli_query($conn, $dept_query);
$departments = mysqli_fetch_all($dept_result, MYSQLI_ASSOC);

// Count statistics
$stats = [
    'doctors' => 0,
    'departments' => 0,
    'patients' => 10000 // Assuming this is a fixed value
];

$doctor_count = mysqli_query($conn, "SELECT COUNT(*) as count FROM doctor");
if ($doctor_count) {
    $stats['doctors'] = mysqli_fetch_assoc($doctor_count)['count'];
}

$dept_count = mysqli_query($conn, "SELECT COUNT(*) as count FROM department");
if ($dept_count) {
    $stats['departments'] = mysqli_fetch_assoc($dept_count)['count'];
}

// Close connection
mysqli_close($conn);

// Define icons for departments
$department_icons = [
    'Cardiology' => 'fa-heartbeat',
    'Neurology' => 'fa-brain',
    'Orthopedics' => 'fa-bone',
    'Pulmonary' => 'fa-lungs',
    'Dental' => 'fa-tooth',
    'Laboratory' => 'fa-vials',
    'Default' => 'fa-hospital'
];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Doctors Hospital Timergara - Premier healthcare services with expert medical professionals"
    />
    <title>Doctors Hospital Timergara</title>

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-... (add integrity hash)"
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <style>
      .icon-circle {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
      }
      .stats-bar .display-6 {
        font-size: 2.2rem;
      }
    </style>
  </head>
  <body>
    <!-- Navbar -->
    <?php include '../includes/navbar.php'; ?>
    <!-- Hero Section -->
    <main id="main-content">
      <!-- Main content landmark -->
      <header class="hero-section py-5 bg-light">
        <div class="container text-center">
          <div class="py-3">
            <h1 class="display-5 fw-bold text-primary mb-3">
              Welcome to Doctors Hospital Timergara
            </h1>
          </div>
          <p class="lead text-muted mb-4">
            Providing expert medical services with experienced professionals and
            modern facilities.
          </p>
          <div class="d-flex gap-3 justify-content-center">
            <a
              href="appointments.php"
              class="btn btn-primary btn-lg px-4 py-2"
              role="button"
            >
              <i class="fas fa-calendar-check me-2"></i>Book Appointment
            </a>
            <a
              href="tel:0945821666"
              class="btn btn-outline-primary btn-lg px-4 py-2"
            >
              <i class="fas fa-phone-alt me-2"></i>Emergency Call
            </a>
          </div>
        </div>
      </header>

      <!-- Stats Bar -->
      <section class="stats-bar py-3 bg-primary text-white">
        <div class="container">
          <div class="row text-center g-4">
            <div class="col-md-3 col-6">
               <a href="doctors.php" class="text-decoration-none ">
          <div class="card text-white bg-primary shadow h-100">
            <div class="card-body text-center position-relative ">
              <div class="display-6 fw-bold "><?php echo $stats['doctors']; ?>+</div>
              <p class="mb-0 ">Expert Doctors</p>
            </div>
          </div>
        </a>
     </div>
            <div class="col-md-3 col-6">
                     <a href="#" class="text-decoration-none ">
          <div class="card text-white bg-primary shadow h-100">
            <div class="card-body text-center position-relative ">
         <div class="display-6 fw-bold ">24/7</div>
              <p class="mb-0 ">Energency Call</p>
            </div>
          </div>
        </a>
            </div>
            <div class="col-md-3 col-6">
                   <a href="departments.php" class="text-decoration-none ">
          <div class="card text-white bg-primary shadow h-100">
            <div class="card-body text-center position-relative ">
              <div class="display-6 fw-bold "><?php echo $stats['departments']; ?>+</div>
              <p class="mb-0 ">Departments</p>
            </div>
          </div>
        </a>
         
            </div>
       <div class="col-md-3 col-6">
         <a href="doctor.php" class="text-decoration-none ">
          <div class="card text-white bg-primary shadow h-100">
            <div class="card-body text-center position-relative ">
              <div class="display-6 fw-bold ">10000+</div>
              <p class="mb-0 ">Patient Yearly</p>
            </div>
          </div>
        </a>
       </div>
          </div>
        </div>
      </section>

      <!-- Intro Video Section -->
<section class="video-section py-5 bg-white">
  <div class="container text-center">
    <h2 class="text-primary mb-4">Take a Virtual Tour</h2>
    <p class="lead mb-4">Experience our hospital’s environment and facilities through this short video.</p>

    <div class="ratio ratio-16x9 rounded shadow">
      <video autoplay muted controls>
        <source src="../assets/videos/Medical.mp4" type="video/mp4" />
        Your browser does not support the video tag.
      </video>
    </div>
  </div>
</section>




      <!-- About Section -->
      <section class="about-section py-5 bg-white">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-md-6 order-md-1 order-2">
              <img
                src="../assets/images/Hospital.png"
                class="img-fluid rounded shadow"
                alt="Doctors Hospital Timergara"
                width="800"
                height="600"
              />
            </div>
            <div class="col-md-6 order-md-2 order-1 mb-4 mb-md-0">
              <h2 class="text-primary mb-3">About Us</h2>
              <p class="lead">
                Doctors Hospital Timergara is committed to providing quality
                healthcare with compassion.
              </p>
              <p>
                Our <?php echo $stats['departments']; ?> departments are staffed by <?php echo $stats['doctors']; ?> qualified doctors and specialists
                who ensure the best care for our patients with state-of-the-art
                medical equipment and personalized treatment plans.
              </p>
              <div class="d-flex gap-2 mt-4">
                <a href="departments.php" class="btn btn-outline-primary"
                  >Our Departments</a
                >
                <a href="doctors.php" class="btn btn-primary"
                  >Meet Our Doctors</a
                >
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Services Highlights -->
      <section class="services-section py-5 bg-light">
        <div class="container">
          <div class="text-center mb-5">
            <h2 class="text-primary">Our Key Services</h2>
            <p class="lead">
              Comprehensive healthcare solutions for all your needs
            </p>
          </div>
          <div class="row g-4">
            <?php foreach($departments as $dept): 
              $dept_name = htmlspecialchars($dept['deptt_name']);
              $icon = $department_icons[$dept_name] ?? $department_icons['Default'];
              $description = "Specialized care with modern diagnostic tools and treatment procedures.";
              
              // You could add a description field to your department table and use:
              // $description = !empty($dept['description']) ? htmlspecialchars($dept['description']) : "Specialized care...";
            ?>
            <div class="col-md-4">
              <div class="card h-100 border-0 shadow-sm">
                <div class="card-body text-center p-4">
                  <div class="icon-circle bg-primary text-white mb-3">
                    <i class="fas <?php echo $icon; ?> fa-2x"></i>
                  </div>
                  <h3 class="h5"><?php echo $dept_name; ?></h3>
                  <p><?php echo $description; ?></p>
                  <a href="departments.php#<?php echo strtolower(str_replace(' ', '-', $dept_name)); ?>" class="btn btn-link px-0"
                    >Learn More <i class="fas fa-arrow-right ms-1"></i
                  ></a>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <?php include '../includes/footer.php'; ?>
    <!-- Scripts -->
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-... (add integrity hash)"
      crossorigin="anonymous"
    ></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
  </body>
</html>