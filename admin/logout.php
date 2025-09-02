<?php
session_start();

// Destroy admin session
session_unset();
session_destroy();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Logging Out </title>



  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet" />
  <style>
    body {
      background-color:rgb(244, 246, 248);
    }
    .logout-box {
      margin-top: 100px;
    }
    .card{
      height:300px;
      width: 500px;
    }
  </style>
</head>
<body>
  <div class="container logout-box">
    <div class="row justify-content-center">
      <div class="col-md-6 text-center">
        <div class="card shadow-sm border-0">
          <div class="card-body p-5">
            <h2 class="mb-3 text-success mb-5">You have been logged out</h2>
            <p class="text-muted mb-5">Thank you for using the Admin Panel. You will be redirected to login page shortly.</p>
            <a href="login.php" class="btn btn-primary fs-5 fw-bold">Login Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
