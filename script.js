// Função para alternar a visibilidade do dropdown
function toggleDropdown(dropdownId, buttonId) {
  var dropdown = document.getElementById(dropdownId);
  if (dropdown.style.display === "none") {
    dropdown.style.display = "block";
  } else {
    dropdown.style.display = "none";
  }
}


