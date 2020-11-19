document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("submitButton").addEventListener("click", () => {
    document.getElementById("formSection").classList.add("disappear");
    document.getElementById("afterSubmit").classList.remove("d-non");
    document.getElementById("afterSubmit").classList.add("appear");
  });
});
