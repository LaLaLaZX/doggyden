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
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
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
    <div class="registration-box">
        <div class="container">
            <nav>
                <ul class="navigation">
                    <li class="nav-list"><a href="index.php"><img src="image/logo.png" alt="logo" class="logo"></a></li>
                    <li class="nav-list">
                        <a>
                            <p class="nav-text">О компании</p>
                        </a>
                    </li>
                    <li class="nav-list">
                        <a href="our_pets.php">
                            <p class="nav-text">Наши питомцы</p>
                        </a>
                    </li>
                    <li class="nav-list">
                        <a>
                            <p class="nav-text">Контакты</p>
                        </a>
                    </li>
                    <li class="nav-list"><a><img src="image/user.png" alt="profile" class="profile"></a></li>
                </ul>
            </nav>
        </div>
        <div class="reg-box">
            <div class="reg-input-box">
                <h1 class="main-title">Регистрация</h1>
                <form class="reg-form" id="reg-form" action="./php-handler/reg.php" method="post">
                    <input type="text" name="surname" class="reg-input" placeholder="Фамилия" required>
                    <input type="text" name="name" class="reg-input" placeholder="Имя" required>
                    <input type="text" name="patronymic" class="reg-input" placeholder="Отчество">
                    <input type="tel" name="phone_number" class="reg-input" placeholder="Номер телефона" required>
                    <input type="email" name="email" class="reg-input" placeholder="Адрес эл. почты" required>
                    <input type="password" name="password" class="reg-input" placeholder="Пароль" required>
                    <input type="password" name="confirmpassword" class="reg-input" placeholder="Повторите пароль" required>
                    <button class="reg-bt">Зарегистрироваться</button>
                </form>
            </div>
            <div class="reg-img-box">
                <img src="image/reg-dog.png" alt="dog" class="reg-img">
            </div>
        </div>
    </div>
    <script src="./js/modal.js"></script>
</body>

</html>