document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("submitButton").addEventListener("click", () => {
    document.getElementById("formSection").classList.add("disappear");
    document.getElementById("afterSubmit").classList.remove("d-non");
    document.getElementById("afterSubmit").classList.add("appear");
  });
  const valueInput = document.getElementById("valueInput");
  const target = document.getElementById("valueTarget");
  valueInput.addEventListener("input", () => {
    target.innerHTML = `${valueInput.value}m²`;
  });
});
