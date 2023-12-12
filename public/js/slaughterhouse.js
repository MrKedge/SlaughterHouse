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



