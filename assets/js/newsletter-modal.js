jQuery(document).ready(function($){
    var newsletterModalShown = sessionStorage.getItem('newsletterModalShown');
    if (!newsletterModalShown) {
      // Show the modal if it hasn't been shown before
      $("#newsletterModal").modal('show');
      sessionStorage.setItem('newsletterModalShown', true);
    }
  });
  