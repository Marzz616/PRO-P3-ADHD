  // Adding an event listener for when the DOM content is loaded
document.addEventListener("DOMContentLoaded", function () {
  // Selecting all elements with the class "faq-question" and storing them in a variable
  const faqQuestions = document.querySelectorAll('.faq-question');

  // Iterating over each faq-question element
  faqQuestions.forEach(question => {
      // Adding a click event listener to each faq-question element
      question.addEventListener('click', function () {
          // Toggling the 'active' class on the clicked faq-question element
          question.classList.toggle('active');

          // Selecting the next element sibling of the clicked faq-question element
          const answer = question.nextElementSibling;

          // Toggling the display property of the answer element
          answer.style.display = (answer.style.display === 'block') ? 'none' : 'block';
      });
  });
});