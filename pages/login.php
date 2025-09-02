<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Login to Doctors Hospital Timergara - Access your patient or staff account"
    />
    <title>Login | Doctors Hospital Timergara</title>

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    />

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/login.css" />
  </head>
  <body class="bg-light">
    <!-- Skip to Content Link -->
    <a class="skip-link visually-hidden-focusable" href="#main-content"
      >Skip to main content</a
    >

    <!-- Navbar -->
    <?php include '../includes/navbar.php'; ?>

    <!-- Main Content -->
    <main id="main-content">
      <section class="login-section py-5">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="card border-0 shadow-sm">
                <div class="card-body p-5">
                  <div class="text-center mb-5">
                    <h2 class="fw-bold text-primary">Welcome Back</h2>
                    <p class="text-muted">
                      Please login to access your account
                    </p>
                  </div>

                  <!-- Login Form -->
                  <form id="loginForm" novalidate>
                    <div class="mb-4">
                      <label for="email" class="form-label"
                        >Email Address <span class="text-danger">*</span></label
                      >
                      <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                          <i class="fas fa-envelope text-muted"></i>
                        </span>
                        <input
                          type="email"
                          class="form-control"
                          id="email"
                          placeholder="Enter your email"
                          required
                        />
                      </div>
                      <div class="invalid-feedback">
                        Please enter a valid email address
                      </div>
                    </div>

                    <div class="mb-4">
                      <label for="password" class="form-label"
                        >Password <span class="text-danger">*</span></label
                      >
                      <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                          <i class="fas fa-lock text-muted"></i>
                        </span>
                        <input
                          type="password"
                          class="form-control"
                          id="password"
                          placeholder="Enter your password"
                          required
                        />
                        <button
                          class="btn btn-outline-secondary toggle-password"
                          type="button"
                        >
                          <i class="fas fa-eye"></i>
                        </button>
                      </div>
                      <div class="invalid-feedback">
                        Please enter your password
                      </div>
                    </div>

                    <div
                      class="d-flex justify-content-between align-items-center mb-4"
                    >
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="checkbox"
                          id="rememberMe"
                        />
                        <label class="form-check-label" for="rememberMe"
                          >Remember me</label
                        >
                      </div>
                      <a
                        href="forgot-password.html"
                        class="text-decoration-none"
                        >Forgot password?</a
                      >
                    </div>

                    <button
                      type="submit"
                      class="btn btn-primary w-100 py-2 mb-3"
                    >
                      <i class="fas fa-sign-in-alt me-2"></i>Login
                    </button>

                    <div class="text-center">
                      <p class="mb-0">
                        Don't have an account?
                        <a href="register.html" class="text-decoration-none"
                          >Register here</a
                        >
                      </p>
                    </div>
                  </form>

                  <!-- Social Login -->
                  <div class="mt-4 pt-3 border-top">
                    <p class="text-center text-muted mb-3">Or login with</p>
                    <div class="d-flex justify-content-center gap-3">
                      <a
                        href="#"
                        class="btn btn-outline-primary rounded-circle social-login"
                      >
                        <i class="fab fa-google"></i>
                      </a>
                      <a
                        href="#"
                        class="btn btn-outline-primary rounded-circle social-login"
                      >
                        <i class="fab fa-facebook-f"></i>
                      </a>
                      <a
                        href="#"
                        class="btn btn-outline-primary rounded-circle social-login"
                      >
                        <i class="fab fa-twitter"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-light pt-5">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-4 col-md-6">
            <h3 class="text-light mb-4">
              <i class="fas fa-hospital me-2"></i>Doctors Hospital
            </h3>
            <p class="mb-4">
              Providing quality healthcare services to the Timergara community
              with compassion and medical excellence.
            </p>
            <div class="d-flex pt-2 gap-2">
              <a
                class="btn btn-outline-light btn-social rounded-circle"
                href="#"
                aria-label="Twitter"
              >
                <i class="fab fa-twitter"></i>
              </a>
              <a
                class="btn btn-outline-light btn-social rounded-circle"
                href="#"
                aria-label="Facebook"
              >
                <i class="fab fa-facebook-f"></i>
              </a>
              <a
                class="btn btn-outline-light btn-social rounded-circle"
                href="#"
                aria-label="YouTube"
              >
                <i class="fab fa-youtube"></i>
              </a>
              <a
                class="btn btn-outline-light btn-social rounded-circle"
                href="#"
                aria-label="LinkedIn"
              >
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
          </div>
          <div class="col-lg-2 col-md-6">
            <h5 class="text-light mb-4">Quick Links</h5>
            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="index.html" class="text-light text-decoration-none"
                  >Home</a
                >
              </li>
              <li class="mb-2">
                <a href="doctors.html" class="text-light text-decoration-none"
                  >Doctors</a
                >
              </li>
              <li class="mb-2">
                <a
                  href="departments.html"
                  class="text-light text-decoration-none"
                  >Departments</a
                >
              </li>
              <li class="mb-2">
                <a
                  href="appointment.html"
                  class="text-light text-decoration-none"
                  >Appointments</a
                >
              </li>
              <li>
                <a href="contact.html" class="text-light text-decoration-none"
                  >Contact</a
                >
              </li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="text-light mb-4">Services</h5>
            <ul class="list-unstyled">
              <li class="mb-2">
                <a href="#" class="text-light text-decoration-none"
                  >Cardiology</a
                >
              </li>
              <li class="mb-2">
                <a href="#" class="text-light text-decoration-none"
                  >Neurology</a
                >
              </li>
              <li class="mb-2">
                <a href="#" class="text-light text-decoration-none"
                  >Orthopedics</a
                >
              </li>
              <li class="mb-2">
                <a href="#" class="text-light text-decoration-none"
                  >Pediatrics</a
                >
              </li>
              <li>
                <a href="#" class="text-light text-decoration-none"
                  >Emergency Care</a
                >
              </li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6">
            <h5 class="text-light mb-4">Contact</h5>
            <p class="mb-2">
              <i class="fas fa-map-marker-alt me-2"></i>Timergara, Lower Dir,
              KPK, Pakistan
            </p>
            <p class="mb-2"><i class="fas fa-phone-alt me-2"></i>0945-821666</p>
            <p class="mb-2">
              <i class="fas fa-envelope me-2"></i>info@doctorstimergara.com
            </p>
            <h6 class="mt-4 mb-2">Opening Hours</h6>
            <p class="mb-1">Monday-Friday: 8:00 AM - 8:00 PM</p>
            <p>Emergency: 24/7</p>
          </div>
        </div>
      </div>
      <div class="container py-4 border-top border-secondary">
        <div class="row">
          <div class="col-md-6 text-center text-md-start">
            &copy; <span class="copyright-year"></span>
            <a class="text-light text-decoration-none" href="index.html"
              >Doctors Hospital Timergara</a
            >. All Rights Reserved.
          </div>
          <div class="col-md-6 text-center text-md-end">
            <a href="#" class="text-light text-decoration-none me-3"
              >Privacy Policy</a
            >
            <a href="#" class="text-light text-decoration-none"
              >Terms of Service</a
            >
          </div>
        </div>
      </div>
    </footer>

    <!-- Back to Top Button -->
    <button
      type="button"
      class="btn btn-primary btn-floating rounded-circle shadow"
      id="back-to-top"
    >
      <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
    <script>
      // Dynamic copyright year
      document.querySelector(".copyright-year").textContent =
        new Date().getFullYear();

      // Back to top button
      const backToTopButton = document.getElementById("back-to-top");
      window.addEventListener("scroll", () => {
        backToTopButton.style.display =
          window.pageYOffset > 300 ? "block" : "none";
      });
      backToTopButton.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
      });

      // Toggle password visibility
      document.querySelectorAll(".toggle-password").forEach((button) => {
        button.addEventListener("click", function () {
          const passwordInput = this.previousElementSibling;
          const icon = this.querySelector("i");
          const type =
            passwordInput.getAttribute("type") === "password"
              ? "text"
              : "password";
          passwordInput.setAttribute("type", type);
          icon.classList.toggle("fa-eye");
          icon.classList.toggle("fa-eye-slash");
        });
      });

      // Form validation
      (function () {
        "use strict";
        const form = document.getElementById("loginForm");

        form.addEventListener(
          "submit",
          function (event) {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            }

            form.classList.add("was-validated");

            if (form.checkValidity()) {
              // Form submission logic would go here
              alert("Login successful! Redirecting to your dashboard...");
              // In a real application, you would redirect after successful login
              // window.location.href = 'dashboard.html';
            }
          },
          false
        );
      })();
    </script>
  </body>
</html>
