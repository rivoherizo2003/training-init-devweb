export function showFormErrors(response, form) {
  form.querySelectorAll(".span-error-message").forEach((el) => el.remove());
  form
    .querySelectorAll(".invalid-input")
    .forEach((el) => el.classList.remove("invalid-input"));

  for (const [inputName, errorMessage] of Object.entries(response.formErrors)) {
    const inputElement = document.querySelector(`[name="${inputName}"]`);

    if (inputElement) {
      const errorSpan = document.createElement("span");
      errorSpan.classList.add("span-error-message", "error-message");
      errorSpan.textContent = errorMessage;

      inputElement.insertAdjacentElement("afterend", errorSpan);
      inputElement.classList.add("invalid-input");
    }
  }
}

export function toast(type, message) {}
