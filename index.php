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
    <title>DoggyDen</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <meta name="description" content="Добро пожаловать на сайт антикафе DoggyDen! Здесь вы найдете много полезной информации об этом заведении.">
    <meta name="keywords" content="собаки, антикафе, волонтерство, помощь">
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
    <div class="main-box">
        <div class="container">
            <nav>
                <ul class="navigation-ind">
                    <li class="nav-list"><a href="#"><img src="image/logo.png" alt="logo" class="logo"></a></li>
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
            <h1 class="main-title">Добро пожаловать в DoggyDen!</h1>
            <div class="main-text-box">
                <p class="main-text">В нашем пёсокафе вы можете провести время с собаками, которые проживают у нас, а
                    также подружиться с кем-то из наших питомцев и взять его к себе домой.</p>
                <div class="main-bt-box">
                    <button class="main-bt"><a href="book.php" class="main-bt-link">Забронировать время</a></button>
                    <button class="main-bt"><a href="our_pets.php" class="main-bt-link">Посмотреть собачек</a></button>
                </div>
            </div>

        </div>
    </div>
    <div class="second-main-box">
        <div class="container">
            <h1 class="main-title-second">Как вы можете помочь бездомным животным?</h1>
            <div class="help-box">
                <div class="help-text-box">
                    <h2 class="help-title">Пожертвовать средства на содержание питомцев</h2>
                    <p class="help-text">Каждому питомцу мы предоставляем чистые помещения, качественное питание,
                        медицинскую помощь и ежедневные прогулки. На содержание собак необходимо выделять средства. Мы
                        будем благодарны каждому, кто внесет свой вклад в это благородное дело.</p>
                    <button class="main-bt"><a href="#" class="main-bt-link">Пожертвовать</a></button>
                </div>
                <div class="help-img-box">
                    <img src="image/help1.png" alt="dogs" class="help-img">
                </div>
            </div>
            <div class="help-box">
                <div class="help-img-box">
                    <img src="image/help2.png" alt="dogs" class="help-img">
                </div>
                <div class="help-text-box">
                    <h2 class="help-title"><span class="span-title">Стать волонтером в нашем антикафе</span></h2>
                    <p class="help-text"><span class="span-text">Если вы любите собак и хотите помогать им
                            самостоятельно, мы будем рады
                            каждому
                            новому человеку, который вступит к нам в команду, для помощи в нашем нелегком деле. Ваше
                            участие
                            может быть очень ценным для наших питомцев!</span></p>
                    <button class="main-bt-two"><a href="volunteer.php" class="main-bt-link">Вступить в команду</a></button>
                </div>

            </div>
            <div class="help-box">
                <div class="help-text-box">
                    <h2 class="help-title">Забрать собаку к себе домой</h2>
                    <p class="help-text">Каждому существу нужен любящий человек рядом. Собаки верные, ласковые и
                        безгранично преданные компаньоны, которые приносят радость и безусловную любовь в нашу жизнь. Вы
                        можете забрать собаку к себе домой и у вас появится лучший друг.</p>
                    <button class="main-bt"><a href="our_pets.php" class="main-bt-link">Приютить собаку</a></button>
                </div>
                <div class="help-img-box">
                    <img src="image/help3.png" alt="dogs" class="help-img">
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