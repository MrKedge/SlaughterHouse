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


function dropDownDiv() {
    var openTriangle = document.getElementById("open-div");
    var closeTriangle = document.getElementById("close-div");
    var navSettings = document.getElementById("toggle-settings");

    openTriangle.addEventListener("click", ()=> {
        navSettings.style.display = "block";
        closeTriangle.style.display = "block";
        openTriangle.style.display = "none";
    });
    closeTriangle.addEventListener("click", ()=> {
        navSettings.style.display = "none";
        openTriangle.style.display = "block";
        closeTriangle.style.display = "none";
    });
}


//logout pop up
function logoutUser() {
    var showLogout = document.getElementById("show-log-out");
    var hideLogout = document.getElementById("hide-log-out");
    var logoutPopUp = document.getElementById("pop-up");

    showLogout.addEventListener("click", function() {
        logoutPopUp.style.display = "block";
    });
    hideLogout.addEventListener("click", function() {
        logoutPopUp.style.display = "none";
    });
}


function sidePanel(){
    var panel = document.getElementById("side-panel");//side panel--------------------------------------------------------------------
    var openBtn = document.getElementById("open-icon");
    var closeBtn = document.getElementById("close-icon");
    var panelTextElements = document.querySelectorAll(".panel-text");
    

    openBtn.addEventListener("click", ()=> {
        panel.style.transition = "width 0.3s ease";
        for (var i = 0; i < panelTextElements.length; i++) {
            panelTextElements[i].style.transition = "opacity 0.3s ease " + (i * 200) + "ms";
            panelTextElements[i].style.display = "block";
            
        }
        panel.style.width = "240px";
        openBtn.style.display = "none";
        closeBtn.style.display = "block";
        
    });

    closeBtn.addEventListener("click", () => {
        panel.style.transition = "width 0.3s ease";
    
        for (var i = 0; i < panelTextElements.length; i++) {
            panelTextElements[i].style.transition = "opacity 0.3s ease " + (i * 200) + "ms";
            panelTextElements[i].style.display = "none";
    
        }

        panel.style.width = "55px";
        openBtn.style.display = "block";
        closeBtn.style.display = "none";
    });
}

function dropDown(){
    var dropdownBtns = document.querySelectorAll(".dropdown-btn");
    

dropdownBtns.forEach(function(btn) {
    btn.addEventListener("click", function() {
        this.classList.toggle("active");
        var dropdownContent = this.nextElementSibling;
        if (dropdownContent.style.display === "block") {
            dropdownContent.style.display = "none";
            
        } else {
            dropdownContent.style.display = "block";
        }
    });
});
}

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