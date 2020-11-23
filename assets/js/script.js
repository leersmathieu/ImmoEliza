document.addEventListener("DOMContentLoaded", () => {
  const valueInput = document.getElementById("valueInput");
  const target = document.getElementById("valueTarget");
  valueInput.addEventListener("input", () => {
    target.innerHTML = `${valueInput.value}m²`;
  });
});
