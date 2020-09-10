document.getElementById('changePasswordBtn').addEventListener('click',changePassword);

function changePassword(){
    var passwordSection = document.getElementById('passwordSection');
    passwordSection.classList.toggle("passwordSectionActive");
}
