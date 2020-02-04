$(document).ready(function() {

  // Get the modal
const modalPhotos = document.getElementById("modalPhotos");

// Get the button that opens the modal
const btnPhotos = document.getElementById("photos");

// Get the <span> element that closes the modal
const spanPhotos = document.getElementById("span-photos");

// When the user clicks on the button, open the modal
btnPhotos.onclick = function() {
  modalPhotos.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
spanPhotos.onclick = function() {
  modalPhotos.style.display = "none";
}


// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modalPhotos) {
    modalPhotos.style.display = "none";
  }
}

// // Get the modal
// const modalVideos = document.getElementById("modalVideos");

// // Get the button that opens the modal
// const btnVideos = document.getElementById("videos");

// // Get the <span> element that closes the modal
// const spanVideos = document.getElementById("span-videos");

// // When the user clicks on the button, open the modal
// btnVideos.onclick = function() {
//   modalVideos.style.display = "block";
// }

// // When the user clicks on <span> (x), close the modal
// spanVideos.onclick = function() {
//   modalVideos.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modalVideos) {
//       modalVideos.style.display = "none";
//     }
//   }

// // Get the modal
// const modalNotes = document.getElementById("modalNotes");

// // Get the button that opens the modal
// const btnNotes = document.getElementById("notes");

// // Get the <span> element that closes the modal
// const spanNotes = document.getElementById("span-notes");

// // When the user clicks on the button, open the modal
// btnNotes.onclick = function() {
//   modalNotes.style.display = "block";
// }

// // When the user clicks on <span> (x), close the modal
// spanNotes.onclick = function() {
//   modalNotes.style.display = "none";
// }

// // When the user clicks anywhere outside of the modal, close it
// window.onclick = function(event) {
//     if (event.target == modalNotes) {
//       modalNotes.style.display = "none";
//     }
//   }

}); //end jquery

