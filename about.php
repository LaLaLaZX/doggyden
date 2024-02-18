<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>О компании</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
    <meta name="description" content="Здесь вы можете прочитать основную информацию о работе заведения">
    <meta name="keywords" content="информация, собаки, сотрудники">
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
    <div class="about-company-box">
        <div class="container">
            <nav>
                <ul class="navigation-ind">
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
                        <a href="contacts.php">
                            <p class="nav-text">Контакты</p>
                        </a>
                    </li>
                    <li class="nav-list"><a><img src="image/user.png" alt="profile" class="profile"></a></li>
                </ul>
            </nav>
            <h1 class="pets-title">О компании</h1>
            <div class="about-slider swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img class="image-slider" alt="картинка слайдера" src="image/about1.png">
                    </div>
                    <div class="swiper-slide">
                        <img class="image-slider" alt="картинка слайдера" src="image/about2.png">
                    </div>
                    <div class="swiper-slide">
                        <img class="image-slider" alt="картинка слайдера" src="image/about3.png">
                    </div>
                    <div class="swiper-slide">
                        <img class="image-slider" alt="картинка слайдера" src="image/about4.png">
                    </div>
                    <div class="swiper-slide">
                        <img class="image-slider" alt="картинка слайдера" src="image/about5.png">
                    </div>
                    <div class="swiper-slide">
                        <img class="image-slider" alt="картинка слайдера" src="image/about6.png">
                    </div>
                </div>
            </div>
            <div class="info-about-box">
                <div class="info-about-left">
                    <p class="about-text">В нашем антикафе мы создали безопасное и заботливое место, где мы приветствуем
                        каждую пушистую лапку. Наша миссия - помочь каждой собаке найти любящий и заботливый дом. Мы
                        обеспечиваем комфортную жизнь для наших подопечных.</p>
                    <p class="about-text">Наши опытные сотрудники и волонтеры работают с каждой собакой, помогая им
                        преодолеть прошлые травмы и привыкнуть к новой среде. Мы также организуем мероприятия для поиска
                        их новых родителей, уделяя особое внимание соответствию собаки и потенциального хозяина.
                        В DoggyDen мы создаем мосты, связывающие души, и дарим счастье собакам и их будущим хозяевам.
                    </p>
                    <p class="about-text">Каждый неравнодушный человек может оставить пожертвование на содержание собак
                        на нашем сайте.</p>
                    <button class="main-bt"><a href="#" class="main-bt-link">Пожертвовать</a></button>
                </div>
                <div class="info-bout-right">
                    <img src="image/about_dog.png" alt="dog" class="about-dog-img">
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="js/slider.js"></script>
</body>

</html>