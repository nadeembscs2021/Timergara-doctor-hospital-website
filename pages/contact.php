<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      name="description"
      content="Contact Doctors Hospital Timergara - Get in touch with our healthcare professionals"
    />
    <title>Contact Us | Doctors Hospital Timergara</title>

  

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
    <link rel="stylesheet" href="assets/css/contact.css" />
  </head>
  <body>
 
    <!-- Navbar -->
   <?php include '../includes/navbar.php'; ?>

    <!-- Main Content -->
    <main id="main-content">
      <!-- Hero Banner -->
      <section class="contact-hero position-relative">
        <div class="container py-5 text-center text-white">
          <h1 class="display-5 fw-bold mb-3">Contact Our Hospital</h1>
          <p class="lead">We're here to help with all your healthcare needs</p>
        </div>
      </section>

      <!-- Contact Info Cards -->
      <section class="contact-info-section py-5 bg-light">
        <div class="container">
          <div class="row g-4">
            <div class="col-md-4">
              <div class="card contact-info-card h-100 border-0 shadow-sm">
                <div class="card-body p-4 d-flex align-items-center">
                  <div class="icon-circle bg-primary text-white me-4">
                    <i class="fas fa-map-marker-alt fa-lg"></i>
                  </div>
                  <div>
                    <h3 class="h5 mb-2">Address</h3>
                    <p class="mb-0">
                      DHQ Dir Road, Opp. Gohar Lab<br />Timergara, Lower Dir,
                      KPK
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card contact-info-card h-100 border-0 shadow-sm">
                <div class="card-body p-4 d-flex align-items-center">
                  <div class="icon-circle bg-primary text-white me-4">
                    <i class="fas fa-phone-alt fa-lg"></i>
                  </div>
                  <div>
                    <h3 class="h5 mb-2">Call Us</h3>
                    <p class="mb-2">
                      <a href="tel:0945821666" class="text-decoration-none"
                        >0945-821666</a
                      >
                    </p>
                    <p class="mb-0"><small>Emergency: 24/7</small></p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="card contact-info-card h-100 border-0 shadow-sm">
                <div class="card-body p-4 d-flex align-items-center">
                  <div class="icon-circle bg-primary text-white me-4">
                    <i class="fas fa-envelope fa-lg"></i>
                  </div>
                  <div>
                    <h3 class="h5 mb-2">Email Us</h3>
                    <p class="mb-2">
                      <a
                        href="mailto:DHT@gmail.com"
                        class="text-decoration-none"
                        >DHT@gmail.com</a
                      >
                    </p>
                    <p class="mb-0"><small>Response within 24 hours</small></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Contact Form and Map -->
      <section class="contact-form-section py-5">
        <div class="container">
          <div class="row g-5">
            <div class="col-lg-6">
              <div class="pe-lg-5">
                <h2 class="mb-4">Send Us a Message</h2>
                <p class="mb-4">
                  Have questions or feedback? Fill out the form below and our
                  team will get back to you as soon as possible.
                </p>

                <form id="contactForm" novalidate>
                  <div class="mb-3">
                    <label for="name" class="form-label"
                      >Your Name <span class="text-danger">*</span></label
                    >
                    <input
                      type="text"
                      class="form-control"
                      id="name"
                      required
                    />
                    <div class="invalid-feedback">Please enter your name</div>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label"
                      >Email Address <span class="text-danger">*</span></label
                    >
                    <input
                      type="email"
                      class="form-control"
                      id="email"
                      required
                    />
                    <div class="invalid-feedback">
                      Please enter a valid email
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" />
                  </div>
                  <div class="mb-3">
                    <label for="subject" class="form-label"
                      >Subject <span class="text-danger">*</span></label
                    >
                    <select class="form-select" id="subject" required>
                      <option value="" selected disabled>
                        Select a subject
                      </option>
                      <option value="General Inquiry">General Inquiry</option>
                      <option value="Appointment Help">Appointment Help</option>
                      <option value="Billing Question">Billing Question</option>
                      <option value="Feedback">Feedback</option>
                      <option value="Other">Other</option>
                    </select>
                    <div class="invalid-feedback">Please select a subject</div>
                  </div>
                  <div class="mb-3">
                    <label for="message" class="form-label"
                      >Message <span class="text-danger">*</span></label
                    >
                    <textarea
                      class="form-control"
                      id="message"
                      rows="4"
                      required
                    ></textarea>
                    <div class="invalid-feedback">
                      Please enter your message
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary px-4 py-2">
                    <i class="fas fa-paper-plane me-2"></i>Send Message
                  </button>
                </form>
              </div>
            </div>

            <div class="col-lg-6">
              <div
                class="contact-map-container rounded shadow-sm overflow-hidden"
              >
                <h2 class="mb-4">Our Location</h2>
                <div class="ratio ratio-16x9">
                  <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3307.123456789012!2d71.84123456789012!3d34.12345678901234!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzTCsDA3JzI0LjQiTiA3McKwNTAnMjQuNiJF!5e0!3m2!1sen!2s!4v1234567890123!5m2!1sen!2s"
                    allowfullscreen=""
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    title="Doctors Hospital Timergara Location Map"
                  >
                  </iframe>
                </div>
                <div class="mt-3">
                  <h3 class="h5">Visiting Hours</h3>
                  <ul class="list-unstyled">
                    <li><strong>Monday-Friday:</strong> 8:00 AM - 8:00 PM</li>
                    <li><strong>Saturday:</strong> 9:00 AM - 5:00 PM</li>
                    <li><strong>Emergency:</strong> 24/7</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Emergency CTA -->
      <section class="emergency-cta py-4 bg-danger text-white">
        <div class="container text-center">
          <div
            class="d-flex flex-column flex-md-row justify-content-center align-items-center"
          >
            <div class="mb-3 mb-md-0 me-md-4">
              <i class="fas fa-ambulance fa-2x me-2"></i>
              <span class="h4 mb-0">Emergency? Call 0945-821666</span>
            </div>
            <a href="tel:0945821666" class="btn btn-light btn-lg px-4">
              <i class="fas fa-phone-alt me-2"></i>Call Now
            </a>
          </div>
        </div>
      </section>
    </main>

    <!-- Footer -->
    <?php include '../includes/footer.php'; ?>

   

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

      // Form validation
      (function () {
        "use strict";
        const form = document.getElementById("contactForm");

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
              alert("Thank you for your message! We will contact you soon.");
              form.reset();
              form.classList.remove("was-validated");
            }
          },
          false
        );
      })();
    </script>
  </body>
</html>
