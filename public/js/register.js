
let first_name = document.getElementById('first_name');
let last_name = document.getElementById('last_name');
let email = document.getElementById('email');
let password1 = document.getElementById('password1');
let password2 = document.getElementById('password2');
var allInputs = $( ":input" ); //document.querySelectorAll('input');
const form = document.getElementById('form');



 $("input").on("keypress", function(e) {
    var startPos = e.currentTarget.selectionStart;
    if (e.which === 32 && startPos==0)
        e.preventDefault();
});


form.addEventListener('submit', (e) => {
    e.preventDefault();
   checkInputs()
});

function checkInputs() {
    let returnVal = true;
   const first_nameValue = first_name.value.trim();
   const last_nameValue = last_name.value.trim();
   const emailValue = email.value.trim();
   const passwordOneValue = password1.value.trim();
   const passwordTwoValue = password2.value.trim();
    if(first_nameValue == "" || first_nameValue==null){
        setError(first_name,'First name is require');
        returnVal = false;
    }else{
        setSuccess(first_name);
    }
    if(last_nameValue == "" || last_nameValue==null){
        setError(last_name,'Last name is require');
        returnVal = false;
    }else{
        setSuccess(last_name);
    }

    if(emailValue=="" || emailValue==null){
        setError(email,'Email is required');
        returnVal = false;
    }else{
        if(isEmail){
            setError(email,'Invalid email');
            returnVal = false;
        }else{
            setSuccess(email);
        }
       
    }

    if(passwordOneValue=="" || passwordOneValue==null){
        setError(password1,'Password field is required')
        returnVal = false;
    }else{
        setSuccess(password1)
    }
    if(passwordTwoValue==""|| passwordTwoValue==null){
        setError(password2,'Password field is required')
        returnVal = false;
    }else{
        setSuccess(password2)
    }

    if(passwordTwoValue!=passwordOneValue){
        setError(password1,'Password does not match');
        returnVal = false;
    }
    else{
        setSuccess(password1)
    }
    return returnVal;
}

function setError(tag,msg){
let formcontrol = tag.parentElement;
let error =  formcontrol.querySelector('span')
tag.classList.add('error')
error.innerText = msg;

}

function setSuccess(tag){
let formcontrol = tag.parentElement;
let error =  formcontrol.querySelector('span')
tag.classList.remove('error')
error.innerText = '';
}

function isEmail(email) {
    return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}




function AvoidSpace(event) {
    var k = event ? event.which : window.event.keyCode;
    if (k == 32) return false;
}