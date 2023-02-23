const role = document.querySelector('.roles');
const form = document.querySelector("form");
const pesel = form.querySelector('input[name="pesel"]');
const name = form.querySelector('input[name="name"]');
const surname = form.querySelector('input[name="surname"]');

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

function isPeselCorrect(pesel){

    peselNumerical = pesel['value'];
    if(!(/^\d+$/.test(peselNumerical)) || peselNumerical.length !== 11)
        return false;
    weights = [1,3,7,9,1,3,7,9,1,3]

    control_number = 0;
    for (let i = 0; i < 10; i++) {
        control_number += (weights[i] * parseInt(peselNumerical[i])) % 10;
    }
    control_number = 10 - control_number % 10;

    return (control_number === parseInt(peselNumerical[10]));

}

function isNameCorrect(str) {

    str = str['value'];

    if (/^[a-zA-Z]+$/.test(str)) // "Wadowski"
        return true;

    if (/[a-zA-Z] - [a-zA-Z]+$/.test(str)) // "Wadowski - Wadowski"
        return true;

    if (/[a-zA-Z]-[a-zA-Z]+$/.test(str)) // "Wadowski-Wadowski"
        return true;

    return false;
}

function markValidation(element, condition){
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}

function validateName() {
    setTimeout(
        function(){markValidation(name, isNameCorrect(name))},
        1000
    )
}

function validateSurname() {
    setTimeout(
        function(){markValidation(surname, isNameCorrect(surname))},
        1000
    )
}

function validatePesel() {
    setTimeout(
        function(){markValidation(pesel, isPeselCorrect(pesel))},
        1000
    )
}

role.addEventListener('change', showSchools)
role.addEventListener('change', showClasses)
name.addEventListener('keyup', validateName);
surname.addEventListener('keyup', validateSurname);
pesel.addEventListener('keyup', validatePesel);
