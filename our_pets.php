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
    <title>Наши питомцы</title>
    <link rel="stylesheet" href="style.css"><meta name="description" content="Здесь вы можете посмотреть питомцев и подать заявку на усыновление">
    <meta name="keywords" content="собаки, приютить, заявка, питомцы">
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
    <div class="our-pets-box">
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
            <h1 class="pets-title">Наши питомцы</h1>
            <div class="our-dogs-box">
                <?php
                $sql = "SELECT * FROM `dogs`";
                $result = mysqli_query($connect, $sql);
                if ($result->num_rows > 0) {
                    // Вывести данные каждой собаки
                    $count = 0;
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="dog-box">';
                        echo '<img src="image/' . $row['image'] . '" alt="dog" class="dog-img">';
                        echo '<div class="overlay">';
                        echo '<h2 class="dog-title">' . $row['name'] . '</h2>';
                        echo '<p class="dog-text">' . $row['description'] . '</p>';
                        echo '</div></div>';

                        $count++;
                        if ($count % 3 == 0) {
                            echo '<br>'; // После каждых трех элементов добавляем новую строку
                        }

                    }

                }
                ?>
            </div>
            <h1 class="pets-title">Оставить заявку на усыновление</h1>
            <div class="shelter-box">
                <div class="shelter-left-img">
                    <img src="image/pows_left.png" alt="pows" class="shelter-img">
                </div>
                <div class="shelter-form-box">
                    <form class="shelter-form" action="php-handler/adopting.php" method="post">
                        <select name="dog_name" class="input-shelter">
                        <option value="" disabled selected class="placeholder-option">Какую собаку вы хотите забрать?</option>
                            <?php $query = 'SELECT ID_dogs, name FROM `dogs`';
                            $result = mysqli_query($connect, $query);
                            $dogs = mysqli_fetch_all($result, MYSQLI_ASSOC);
                            foreach ($dogs as $dog) {
                                echo '<option value="' . $dog['ID_dogs'] . '">' . $dog['name'] . '</option>';
                            }
                            ?>
                        </select> <br>
                        <textarea class="textarea-shelter" placeholder="Расскажите немного о себе" name="description"
                            id="" cols="30" rows="10" required></textarea>
                        <button class="shelter-bt">Отправить заявку</button>
                        <p class="shelter-text">После отправления заявки наши сотрудники свяжутся с Вами по номеру
                            телефона, указанному в Вашем личном кабинете.</p>
                    </form>
                </div>
                <div class="shelter-right-img">
                    <img src="image/pows_right.png" alt="pows" class="shelter-img">
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
    <script src="./js/modal.js"></script>
</body>

</html>