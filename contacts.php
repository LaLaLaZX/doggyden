<?php
session_start();
include("./php-connect/connect.php");
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];

    // Очистка сессионной переменной
    unset($_SESSION['message']);

    // Вывод сообщения только после регистрации
    echo '<div class="message">' . $message . '</div>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакты</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <meta name="description" content="Здесь вы можете узнать контакты нашего заведения и отправить форму обратной связи.">
    <meta name="keywords" content="адрес, номер телефона, карта, местоположение">
</head>

<body>
    <div class="auth-box">
        <div class="auth-container">
            <div class="close-box">
                <img src="image/close.png" alt="close" class="close">
            </div>
            <h1 class="auth-title">Авторизация</h1>
            <form action="./php-handler/auth.php" method="post" class="auth-form" id="auth-form">
                <input type="email" name="email" class="auth-input" placeholder="Адрес эл. почты" required>
                <input type="password" name="password" class="auth-input" placeholder="Пароль" required>
                <div class="h-captcha" data-sitekey="b7392d62-6790-49e4-bded-b3cf12e33bc4"></div>
                <button class="auth-bt">Войти</button>
                <a href="registration.php" class="to-reg">Нет аккаунта? Зарегистрироваться</a>
            </form>
        </div>
    </div>
    <div class="contacts-box">
        <div class="container">
            <nav>
                <ul class="navigation-ind">
                    <li class="nav-list"><a href="index.php"><img src="image/logo.png" alt="logo" class="logo"></a></li>
                    <li class="nav-list">
                        <a href="about.php">
                            <p class="nav-text">О компании</p>
                        </a>
                    </li>
                    <li class="nav-list">
                        <a href="our_pets.php">
                            <p class="nav-text">Наши питомцы</p>
                        </a>
                    </li>
                    <li class="nav-list">
                        <a href="contacts.php">
                            <p class="nav-text">Контакты</p>
                        </a>
                    </li>
                    <li class="nav-list"><a><img src="image/user.png" alt="profile" class="profile"></a></li>
                </ul>
            </nav>
            <h1 class="pets-title">Контакты</h1>
            <div class="contacts-info-box">
                <div class="contacts-left-box">
                    <h2 class="contacts-subtitle">Форма обратной связи</h2>
                    <form action="php-handler/feedback.php" method="post">
                        <input type="text" class="input-shelter" placeholder="Тема вашего вопроса"
                            name="theme">
                            <textarea class="textarea-contacts" placeholder="Сообщение" name="question"
                            id="" cols="30" rows="10" required></textarea>
                        <button class="book-bt">Отправить</button>
                        <p class="cont-text">После бронирования наши сотрудники свяжутся с Вами по номеру телефона,
                            указанному в Вашем личном кабинете.</p>
                    </form>
                </div>
                <div class="contacts-right-box">
                <div style="position:relative;overflow:hidden;"><a href="https://yandex.ru/maps/213/moscow/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Москва</a><a href="https://yandex.ru/maps/213/moscow/house/kutuzovskiy_prospekt_12s3/Z04YcwJmSk0PQFtvfXt0cX9mZg==/?ll=37.558995%2C55.750353&utm_medium=mapframe&utm_source=maps&z=16.66" style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс Карты</a><iframe src="https://yandex.ru/map-widget/v1/?ll=37.558995%2C55.750353&mode=whatshere&whatshere%5Bpoint%5D=37.556866%2C55.750300&whatshere%5Bzoom%5D=17&z=16.66" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
                <p class="contact-text">Адрес: Кутузовский просп., 12, стр. 3</p>
                <p class="contact-text">Номер телефона: +7 (906) 774-90-64</p>
                <p class="contact-text">Режим работы: ежедневно 10:00 - 23:00</p>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="foot-box">
                <div class="foot-text-left">
                    <p class="foot-text"><a href="#" class="foot-link">О компании</a></p>
                    <p class="foot-text"><a href="#" class="foot-link">Наши питомцы</a></p>
                    <p class="foot-text"><a href="#" class="foot-link">Контакты</a></p>
                </div>
                <div class="foot-logo-box">
                    <img src="image/logo.png" alt="logo" class="foot-img">
                </div>
                <div class="foot-text-right">
                    <p class="foot-text"><a href="#" class="foot-link">Помощь</a></p>
                    <p class="foot-text"><a href="#" class="foot-link">Политика конфиденциальности</a></p>
                </div>
            </div>
        </div>
    </footer>
    <script src="./js/modal.js"></script>
</body>

</html>