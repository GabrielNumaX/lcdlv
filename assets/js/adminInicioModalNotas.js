$(document).ready(function() {

// Get the modal
const modalNotes = document.getElementById("modalNotes");

// Get the button that opens the modal
const btnNotes = document.getElementById("notes");

// Get the <span> element that closes the modal
const spanNotes = document.getElementById("span-notes");

// When the user clicks on the button, open the modal
btnNotes.onclick = function() {
  modalNotes.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanNotes.onclick = function() {
  modalNotes.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modalNotes) {
      modalNotes.style.display = "none";
    }
  }

}); //end jquery