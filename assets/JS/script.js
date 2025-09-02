















      
      // appointment section start

       // Form validation
       (function () {
        "use strict";
        const form = document.getElementById("appointmentForm");

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
              alert(
                "Appointment booked successfully! We will contact you shortly."
              );
              form.reset();
              form.classList.remove("was-validated");
            }
          },
          false
        );
      })();

      // Set minimum date to today
      document.getElementById("date").min = new Date()
        .toISOString()
        .split("T")[0];

      // appointment section end