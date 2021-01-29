//user registration form validation.
function validate(){
 	var email = document.forms["RegForm"]["email"];
 	var password = document.forms["RegForm"]["password"];    
    var phone = document.forms["RegForm"]["phone"];  
    var session =  document.forms["RegForm"]["study_session"];

    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    var sessionformat = /^[0-9]+\/+[0-9]+$/;
    var phoneformat = /^(\+?\d{1,4}[\s-])?(?!0+\s+,?$)\d{10}\s*,?$/;

    if(!email.value.match(mailformat)){
    	window.alert("Please enter a valid email");
    	email.focus();
    	return false;
    }

    if (password.value.length < 8)                                  
    { 
        window.alert("Password must be more than 8 char"); 
        password.focus(); 
        return false; 
    }

    if(!phone.value.match(phoneformat)){
    	window.alert("Please enter a valid phone number");
    	phone.focus();
    	return false;
    }

    if(!session.value.match(sessionformat)){
    	window.alert("Please enter a valid session");
    	session.focus();
    	return false;
    }  
}