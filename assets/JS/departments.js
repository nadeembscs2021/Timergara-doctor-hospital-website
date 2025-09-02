 $(document).ready(function() {
        // Learn More button functionality
        $('.learn-more-btn').click(function() {
          const dept = $(this).data('dept');
          const doctorSection = $('#' + dept + '-doctors');
          
          // Hide all doctor sections first
          $('.department-doctors').slideUp();
          
          // Toggle the current one
          if (doctorSection.is(':visible')) {
            doctorSection.slideUp();
          } else {
            doctorSection.slideDown();
            $('html, body').animate({
              scrollTop: doctorSection.offset().top - 100
            }, 500);
          }
        });
        
        // Back to top button
        $(window).scroll(function() {
          if ($(this).scrollTop() > 300) {
            $('#back-to-top').fadeIn();
          } else {
            $('#back-to-top').fadeOut();
          }
        });
        
        $('#back-to-top').click(function() {
          $('html, body').animate({scrollTop: 0}, 500);
          return false;
        });
      });


