// =========================
// Campus Secure Portal JS
// =========================

// Show / Hide Password

function togglePassword(){

let pass=document.getElementById("loginPassword");

if(pass.type==="password")
{
    pass.type="text";
}
else
{
    pass.type="password";
}

}

// Email Validation

function validateLogin(){

let email=document.querySelector("[name='email']").value.trim();

let password=document.querySelector("[name='password']").value.trim();

if(email==="" || password==="")
{

alert("Please fill all fields.");

return false;

}

return true;

}

// Auto Hide Alerts

window.onload=function(){

let alerts=document.querySelectorAll(".alert");

alerts.forEach(function(alert){

setTimeout(function(){

alert.style.transition="0.5s";

alert.style.opacity="0";

setTimeout(function(){

alert.remove();

},500);

},3000);

});

};

// Student Search

function searchStudent(){

let input=document.getElementById("searchBox");

let filter=input.value.toUpperCase();

let table=document.getElementById("studentTable");

let rows=table.getElementsByTagName("tr");

for(let i=1;i<rows.length;i++)
{

let rowText=rows[i].textContent || rows[i].innerText;

if(rowText.toUpperCase().indexOf(filter)>-1)
{

rows[i].style.display="";

}
else
{

rows[i].style.display="none";

}

}

}

// Confirm Logout

function confirmLogout(){

return confirm("Are you sure you want to logout?");

}

// Smooth Scroll

function scrollTopButton(){

window.scrollTo({

top:0,

behavior:"smooth"

});

}

// Welcome Toast

function welcomeMessage(name){

console.log("Welcome "+name);

}