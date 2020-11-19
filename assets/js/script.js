document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("submitButton").addEventListener("click", () => {
    document.getElementById("formSection").classList.add("disappear");
    document.getElementById("afterSubmit").classList.add("appear");
  });
});
