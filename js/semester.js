//user registration form validation.
function validate(){
 	var description = document.forms["Form"]["semester_description"];

    if (description.value=="")                                  
    { 
        window.alert("Description is require"); 
        description.focus(); 
        return false; 
    }
}