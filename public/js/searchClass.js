const search = document.querySelector('input[placeholder="search class"]');
const classContainer = document.querySelector('.classes');

search.addEventListener("keyup", function (event) {

        event.preventDefault();

        const data = {search: this.value};

        fetch("/searchClass", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (classes) {
            classContainer.innerHTML = "";
            loadClasses(classes)
        });

});

function loadClasses(classes) {
    classes.forEach(classObj => {
        createClass(classObj);
    });
}

function createClass(classObj) {
    const template = document.querySelector("#class-template");

    const clone = template.content.cloneNode(true);
    // TODO co z tym?
    const div = clone.querySelector("div");
    div.id = classObj.id;

    const name = clone.querySelector("my-tag");
    name.innerHTML = classObj.name;

    classContainer.appendChild(clone);
}
