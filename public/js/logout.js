const logoutButton = document.querySelector('.logout-button');


function logout() {
    const likes = this;

    fetch(`/logout/`);
}

logoutButton.addEventListener('click', logout);

