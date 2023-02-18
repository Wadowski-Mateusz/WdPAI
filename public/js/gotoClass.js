const selectedClass = document.querySelectorAll(".class");
const url = 'http://localhost:8080/'
function goto() {
    const id = this.children.item(0).id;
    window.location.replace(url+'addGrade/'+id);

}

selectedClass.forEach(button => button.addEventListener('click', goto))