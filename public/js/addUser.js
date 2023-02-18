const role = document.querySelector('.roles');



// '2' is director role id
function showSchools() {
    document.getElementById("schools").style.display = (role.value === '2') ? 'flex' : 'none';
}

role.addEventListener('change', showSchools)


