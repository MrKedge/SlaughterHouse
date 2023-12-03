<div class="text-center hidden" id="animal-div">
    <label class="font-semibold text-[#293241] pt-2 text-2xl">Animal
        Marks</label>
    <div class="pt-3"><canvas class="border-2 border-black" id="canvas"></canvas></div>
</div>

<input type="hidden" name="drawingData" id="drawingData" value="">

<script>
    // Wait for the DOM to be fully loaded before accessing elements
    document.addEventListener("DOMContentLoaded", function() {
        var kindAnimal = document.getElementsByClassName('type-animal')[0];
        var markDiv = document.getElementById("animal-div");

        kindAnimal.addEventListener('change', function() {
            // Check the selected value
            if (kindAnimal.value === "cow" || kindAnimal.value === "horse" || kindAnimal.value ===
                "carabao") {
                markDiv.classList.add("block");
                markDiv.classList.remove("hidden");
            } else {
                markDiv.classList.add("hidden");
                markDiv.classList.remove("block");
            }
        });
    });
</script>

<script>
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
</script>
