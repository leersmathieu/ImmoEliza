document.addEventListener("DOMContentLoaded", () => {
  const valueInput = document.getElementById("valueInput");
  const target = document.getElementById("valueTarget");
  valueInput.addEventListener("input", () => {
    target.innerHTML = `${valueInput.value}m²`;
  });

  $("form").submit(function () {
    if ($("input#fake").val().length != 0) {
      return false;
    }
  });
});
