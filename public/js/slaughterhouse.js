function ageClassify() {
    var typeOfAnimal = document.getElementById("typeOfAnimal").value;
    var ageClassifyDiv = document.getElementById("ageClassifyDiv");
    var inputAgeClassify = document.getElementById("putAgeClassify");

    if (typeOfAnimal === "swine") {
        ageClassifyDiv.style.display = "block";
        inputAgeClassify.required = true;
    } else {
        ageClassifyDiv.style.display = "none";
        inputAgeClassify.required = false;
    }
}

// Add an event listener to call ageClassify when the dropdown changes
var typeOfAnimalDropdown = document.getElementById("typeOfAnimal");
typeOfAnimalDropdown.addEventListener("change", ageClassify);

function rejectRemark(){
    var remark = document.getElementById("remarks-pop-up");
    var openRemark = document.getElementById("show-remarks");
    var closeRemark = document.getElementById("close-remarks");

openRemark.addEventListener("click", ()=> {
    remark.style.display = "block";
});
closeRemark.addEventListener("click", ()=> {
    remark.style.display = "none";
});

}

function approvePopUp(){
    var approveNav = document.getElementById("approve-pop-up");
    var openRemark = document.getElementById("show-approve-nav");
    var closeRemark = document.getElementById("close-approve");
    
openRemark.addEventListener("click", ()=> {
    approveNav.style.display = "block";
});
closeRemark.addEventListener("click", ()=> {
    approveNav.style.display = "none";
});

}



// for marking animals
document.addEventListener("DOMContentLoaded", function() {
    // Get the canvas
    var canvas = document.getElementById('canvas');

    // Set canvas dimensions to match the image
    canvas.width = 800; // Set your preferred width
    canvas.height = 500; // Set your preferred height

    // Get the 2D context of the canvas
    var ctx = canvas.getContext('2d');

    // Create an Image object for the original image
    var originalImage = new Image();

    // Function to clear the canvas
    function clearCanvas() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
    }

    // Function to draw the image on the canvas
    function drawImageOnCanvas() {
        ctx.drawImage(originalImage, 0, 0, canvas.width, canvas.height);
    }

    // Function to draw a checkmark at the specified coordinates
    function drawCheckmark(x, y) {
        // Customize the checkmark drawing style
        ctx.strokeStyle = 'green';
        ctx.lineWidth = 2; // Make the line thinner

        // Draw a checkmark
        ctx.beginPath();
        ctx.moveTo(x - 5, y);
        ctx.lineTo(x, y + 10);
        ctx.lineTo(x + 15, y - 10);
        ctx.stroke();
    }

    // Set the initial source of the image based on the default value in the select element
    var defaultAnimal = document.getElementById('typeOfAnimal').value;
    originalImage.src = imageUrls[defaultAnimal];

    // When the image is loaded, draw it on the canvas
    originalImage.onload = function() {
        clearCanvas();
        drawImageOnCanvas();
    };

    // Event listener for mouse clicks on the canvas
    canvas.addEventListener('click', function(e) {
        // Get the mouse coordinates relative to the canvas
        var rect = canvas.getBoundingClientRect();
        var x = e.clientX - rect.left;
        var y = e.clientY - rect.top;

        // Call the drawCheckmark function with the mouse coordinates
        drawCheckmark(x, y);
    });

    // Event listener for changes in the select element
    document.getElementById('typeOfAnimal').addEventListener('change', function() {
        // Get the selected value
        var selectedAnimal = this.value;

        // Clear the canvas immediately when the animal selection changes
        clearCanvas();

        // Set the source of the image based on the selected animal
        originalImage.src = imageUrls[selectedAnimal];

        // When the new image is loaded, draw it on the canvas
        originalImage.onload = function() {
            drawImageOnCanvas();
        };
    });


      // Event listener for form submission
      document.querySelector('form').addEventListener('submit', function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Get the drawing data from the canvas
        var drawingData = canvas.toDataURL();

        // Set the drawing data as the value of the hidden input
        document.getElementById('drawingData').value = drawingData;

        // Submit the form
        this.submit();
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const dropdownTriggers = document.querySelectorAll('.group button');
    const dropdownContents = document.querySelectorAll('.group > .transition-all');
  
    dropdownTriggers.forEach((trigger, index) => {
      trigger.addEventListener('click', function () {
        dropdownContents[index].classList.toggle('max-h-40'); // Adjust the max height based on your content
        dropdownContents[index].classList.toggle('opacity-100');
        dropdownContents[index].classList.toggle('opacity-0');
      });
    });
});



