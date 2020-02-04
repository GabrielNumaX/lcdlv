$(document).ready(function() {


// Get the modal
    const modalVideos = document.getElementById("modalVideos");

// Get the button that opens the modal
    const btnVideos = document.getElementById("videos");

// Get the <span> element that closes the modal
    const spanVideos = document.getElementById("span-videos");

// When the user clicks on the button, open the modal
    btnVideos.onclick = function() {
    modalVideos.style.display = "block";
    }

// When the user clicks on <span> (x), close the modal
    spanVideos.onclick = function() {
    modalVideos.style.display = "none";
    }

// When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modalVideos) {
        modalVideos.style.display = "none";
        }
    }

}); //end jquery