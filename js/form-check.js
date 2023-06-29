window.addEventListener("DOMContentLoaded", function() {
  const form = document.querySelector("form");

  function validateForm(event) {
    event.preventDefault();
    const fields = form.querySelectorAll(".required");
    fields.forEach(validateField);
  }

  function validateField(field) {
    if (!field.value) {
      console.log("Незаполнено обязательное поле");
    }
  }

  form.addEventListener("submit", validateForm);
});
