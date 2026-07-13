setTimeout(function(){
    let alert=document.querySelector(".alert");

    if(alert){
        alert.style.display="none";
    }
},3000);

function confirmDelete(){
    return confirm("Are you sure you want to delete this student?");
}