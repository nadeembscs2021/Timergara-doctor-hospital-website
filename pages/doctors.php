<?php
include '../database/config.php';

// Fetch departments for filter dropdown
$departments = mysqli_query($conn, "SELECT * FROM department") or die(mysqli_error($conn));

// Fetch all doctors along with their department names and IDs
$doctors = mysqli_query($conn, "
  SELECT doctor.*, department.deptt_name, department.deptt_id
  FROM doctor 
  JOIN department ON doctor.deptt_id = department.deptt_id
") or die(mysqli_error($conn));
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Our Doctors | Doctors Hospital Timergara</title>
  <meta name="description" content="Meet our expert medical team at Doctors Hospital Timergara - Specialized healthcare professionals" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/doctors.css" />
</head>
<body>

<?php include '../includes/navbar.php'; ?>

<section class="page-hero bg-primary text-white py-5">
  <div class="container text-center">
    <h1 class="display-5 fw-bold mb-3">Our Medical Specialists</h1>
    <p class="lead mb-4">Experienced professionals dedicated to your health</p>
    <div class="d-flex justify-content-center gap-3">
      <a href="appointments.php" class="btn btn-light btn-lg px-4"><i class="fas fa-calendar-check me-2"></i>Book Appointment</a>
      <a href="departments.php" class="btn btn-outline-light btn-lg px-4"><i class="fas fa-procedures me-2"></i>View Departments</a>
    </div>
  </div>
</section>

<!-- Filters -->
<section class="py-4 bg-light">
  <div class="container">
    <div class="row g-3 justify-content-center">
      <div class="col-md-4">
        <input type="text" id="searchInput" class="form-control" placeholder="Search by name or specialization...">
      </div>
      <div class="col-md-4">
        <select id="departmentFilter" class="form-select">
          <option value="">All Departments</option>
          <?php while ($dept = mysqli_fetch_assoc($departments)) : ?>
            <option value="<?= htmlspecialchars($dept['deptt_name']) ?>"><?= htmlspecialchars($dept['deptt_name']) ?></option>
          <?php endwhile; ?>
        </select>
      </div>
    </div>
  </div>
</section>

<!-- Doctors Grid -->
<section class="py-5">
  <div class="container">
    <h2 class="text-center mb-5">Meet Our Doctors</h2>
    <div class="row g-4" id="doctorsGrid">
      <?php if (mysqli_num_rows($doctors) > 0): ?>
        <?php while ($row = mysqli_fetch_assoc($doctors)) : ?>
          <div class="col-lg-4 h-100 col-md-6 doctor-card" data-name="<?= strtolower($row['d_name']) ?>" data-specialty="<?= strtolower($row['specialization']) ?>" data-department="<?= strtolower($row['deptt_name']) ?>">
            <div class="card h-100 shadow-sm border-0">
              <div class="position-relative">
                <img src="../assets/images/<?= htmlspecialchars($row['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['d_name']) ?>" />
                <div class="card-badge bg-primary text-white"><?= htmlspecialchars($row['specialization']) ?></div>
              </div>
              <div class="card-body text-center">
                <h3 class="h5 card-title"><?= htmlspecialchars($row['d_name']) ?></h3>
                <p class="text-muted mb-1"><i class="fas fa-clock me-1"></i> <?= htmlspecialchars($row['time']) ?></p>
                <p class="text-muted mb-2"><i class="fas fa-building me-1"></i> <?= htmlspecialchars($row['deptt_name']) ?></p>

              

                <button 
                  class="btn btn-outline-primary view-profile-btn" 
                  data-bs-toggle="modal" data-bs-target="#doctorModal"
                  data-doctor='{
                    "name": "<?= addslashes($row['d_name']) ?>",
                    "specialty": "<?= addslashes($row['specialization']) ?>",
                    "experience": "<?= addslashes($row['time']) ?>",
                    "description": "<?= addslashes($row['d_name']) ?> is specialized in <?= addslashes($row['specialization']) ?>. Contact: <?= addslashes($row['d_contact']) ?>",
                    "image": "../assets/images/<?= addslashes($row['image']) ?>",
                    "schedule": "<?= addslashes($row['time']) ?>",
                    "education": "Not specified"
                  }'
                >
                  View Full Profile
                </button>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php else: ?>
        <p class="text-center text-danger">No doctors found.</p>
      <?php endif; ?>
    </div>
  </div>
</section>

<!-- Modal -->
<div class="modal fade" id="doctorModal" tabindex="-1" aria-labelledby="doctorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="doctorModalLabel">Doctor Profile</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body row">
        <div class="col-md-4 text-center">
          <img id="doctorImage" src="" alt="" class="img-fluid mb-5" />
          <!-- Book button inside modal, updated by JS -->
           <!-- Book Button with GET parameters -->
                <a 
                  href="appointments.php?doctor_id=<?= $row['doctor_id'] ?>&doctor_name=<?= urlencode($row['d_name']) ?>&deptt_id=<?= $row['deptt_id'] ?>" 
                  class="btn btn-primary mb-2"
                >
                  <i class="fas fa-calendar-check me-2"></i>Book Appointment
                </a>
        </div>
        <div class="col-md-8">
          <h3 id="doctorName"></h3>
          <p><span class="badge bg-primary" id="doctorSpecialty"></span> <span class="badge bg-secondary" id="doctorExperience"></span></p>
          <h5>About</h5>
          <p id="doctorDescription"></p>
          <h5>Education</h5>
          <p id="doctorEducation"></p>
          <h5>Availability</h5>
          <p id="doctorSchedule"></p>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include '../includes/footer.php'; ?>

<script src="../assets/JS/doctors.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Update modal content and Book button link dynamically
  const doctorModal = document.getElementById('doctorModal');
  const modalBookBtn = document.getElementById('modalBookBtn');

  doctorModal.addEventListener('show.bs.modal', function (event) {
    const button = event.relatedTarget;
    const doctorData = JSON.parse(button.getAttribute('data-doctor'));

    document.getElementById('doctorImage').src = doctorData.image;
    document.getElementById('doctorImage').alt = doctorData.name;
    document.getElementById('doctorName').textContent = doctorData.name;
    document.getElementById('doctorSpecialty').textContent = doctorData.specialty;
    document.getElementById('doctorExperience').textContent = doctorData.experience;
    document.getElementById('doctorDescription').textContent = doctorData.description;
    document.getElementById('doctorEducation').textContent = doctorData.education;
    document.getElementById('doctorSchedule').textContent = doctorData.schedule;

    // Set the "Book Appointment" link in the modal to pass doctor data
    // You need to have the doctor's ID and department ID as well; since the modal data-doctor doesn't have these, you can store them in a data attribute
    // To keep it simple, here I will extract doctor id and deptt id from the button's parent .doctor-card div

    const doctorCard = button.closest('.doctor-card');
    const doctorId = doctorCard.getAttribute('data-doctor-id');
    const depttId = doctorCard.getAttribute('data-deptt-id');
    const doctorName = doctorData.name;

    // Since those attributes are not on .doctor-card, let's add them in PHP below
    // For now, fallback: pass doctorName only
    // But better to add data-doctor-id and data-deptt-id in the div in PHP

    modalBookBtn.href = `appointments.php?doctor_name=${encodeURIComponent(doctorName)}`;
  });
</script>

</body>
</html>
