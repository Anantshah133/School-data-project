document.addEventListener("DOMContentLoaded", function(){
    const studentForm = document.getElementById("studentForm");
    studentForm.addEventListener("submit", function(event){
        const isValid = studentForm.checkValidity();
        if(isValid){
            localStorage.setItem("nextPageFlag", 'true');
        } else {
            event.preventDefault();
        }
    })
})