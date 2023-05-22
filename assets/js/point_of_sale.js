document.addEventListener('DOMContentLoaded', function() {
  // Get all the card headers
  const cardHeaders = document.querySelectorAll('.card-header');

  // Find the tallest card header
  let maxHeight = 0;
  cardHeaders.forEach(cardHeader => {
    maxHeight = Math.max(maxHeight, cardHeader.offsetHeight);
  });

  // Set the same height for all card headers
  cardHeaders.forEach(cardHeader => {
    cardHeader.style.height = `${maxHeight}px`;
  });
});