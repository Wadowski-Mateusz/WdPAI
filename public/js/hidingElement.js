const role = document.querySelector('.roles');
// '2' is director role id

function showElement(elementId, roleId) {
    document.getElementById(elementId).style.display = (role.value === roleId) ? 'flex' : 'none';
}

function showClasses() {
    // document.getElementById("classes").style.display = (role.value === '4') ? 'flex' : 'none';
    showElement("classes", "4");
}

function showSchools() {
    showElement("schools", "2");
}

role.addEventListener('change', showSchools)
role.addEventListener('change', showClasses)


