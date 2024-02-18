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
    <title>Бронирование времени</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <meta name="description" content="Здесь вы можете забронировать время в антикафе для большой компании">
    <meta name="keywords" content="бронирование, заявка, антикафе">
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
    <div class="book-box">
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
            <h1 class="pets-title">Бронирование времени в антикафе</h1>
            <p class="book-text">Если вы хотите посетить DoggyDen компанией до пяти человек, предварительное
                бронирование времени не нужно.</p>
            <div class="book-info-box">
                <div class="book-left">
                    <form action="php-handler/booking.php" method="post">
                        <input type="text" class="input-shelter" placeholder="Мероприятие, на которое бронируется время"
                            name="event">
                        <input type="text" class="input-shelter" placeholder="Планируемая дата" name="date">
                        <input type="text" class="input-shelter" placeholder="Количество человек"
                            name="count_of_people">
                        <button class="book-bt">Забронировать время</button>
                        <p class="shelter-text">После бронирования наши сотрудники свяжутся с Вами по номеру телефона,
                            указанному в Вашем личном кабинете.</p>
                    </form>
                </div>
                <div class="book-right">
                    <img src="image/book_dog.png" alt="dog" class="book-dog">
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
        </div>
    </div>