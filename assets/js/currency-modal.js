jQuery(document).ready(function($) {
    var newsletterModalShown = sessionStorage.getItem('newsletterModalShown');
  
    if (!newsletterModalShown) {
      // Show the newsletter modal if it hasn't been shown before
      $("#newsletterModal").modal('show');
      sessionStorage.setItem('newsletterModalShown', true);
    } else {
      // Close event for the newsletterModal
      $("#newsletterModal").on('hidden.bs.modal', function() {
        var currencyModalShown = sessionStorage.getItem('currencyModalShown');
        if (!currencyModalShown) {
          // Show the currency modal if it hasn't been shown before
          $("#currencyModal").modal('show');
          sessionStorage.setItem('currencyModalShown', true);
        }
      });
    }
  });
  