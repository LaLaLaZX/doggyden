<?php
    session_start();
    include("php-connect/connect.php");

    $user_id = $_SESSION['user_id'];
    $user = mysqli_query($connect, query:"SELECT * FROM users WHERE users.ID_users = '$user_id'");
    $user = mysqli_fetch_assoc($user);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Редактирование профиля</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="redactor-box">
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
            <h1 class="pets-title">Редактирование профиля</h1>
            <form class="redac" action="php-handler/redactering.php" method="post">
                <input type="hidden" name="id_users" value="<?= $user['ID_users'] ?>"> 
                <input type="text" class="input-shelter" placeholder="Фамилия" value="<?= $user['Surname'] ?>" name="surname">
                <input type="text" class="input-shelter" placeholder="Имя" value="<?= $user['Name'] ?>" name="name">
                <input type="text" class="input-shelter" placeholder="Отчество" value="<?= $user['Patronymic'] ?>" name="patronymic">
                <input type="text" class="input-shelter" placeholder="Номер телефона" value="<?= $user['Phone_number'] ?>" name="phone_number">
                <input type="text" class="input-shelter" placeholder="Почта" value="<?= $user['Email'] ?>" name="email">
                <button class="volunteer-bt">Изменить</button>
            </form>
        </div>
    </div>
</body>

</html>