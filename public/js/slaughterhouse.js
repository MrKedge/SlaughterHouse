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
rejectRemark()
sidePanel();
dropDown();
logoutUser();