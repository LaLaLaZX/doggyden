var btn = document.querySelector('.profile');
var blockHidden = document.querySelector('.auth-box');
var btnClose = document.querySelector('.close');

function showBlock() {
    blockHidden.classList.add('up');
}

function hideBlock() {
    blockHidden.classList.remove('up');
}

function showProfile() {
    // Проверяем, есть ли пользователь в сессии
    if (checkSession()) {
        // Открываем профиль
        window.location = '../profile.php';
    } else {
        // Открываем модальное окно для авторизации
        showBlock();
    }
}

function checkSession() {
    fetch('php-handler/check_session.php')
        .then(response => response.text())
        .then(data => {
            if (data === 'true') {
                // пользователь в сессии
                return true;
            } else {
                // пользователь не в сессии
                return false;
            }
        })
        .catch(error => {
            // обработка ошибок
        });
}

btn.addEventListener('click', showProfile);
btn.addEventListener('click', showBlock)
btnClose.addEventListener('click', hideBlock);