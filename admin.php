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
    <title>Admin panel</title>
    <link rel="stylesheet" href="style.css">
    
</head>

<body>
    <?php
    // проверка, является ли пользователь администратором
    if (!isset($_SESSION['Is_admin']) || $_SESSION['Is_admin'] !== true) {
        // Перенаправляем пользователя на главную страницу, если пользователя в сессии нет или он не является администратором
        header("Location: index.php");
        exit;
    }
    ?>
    <div class="admin-box">
        <div class="container">
            <div class="head-admin">
                <img src="image/logo.png" alt="logo" class="logo-adm">
                <form action="php-handler/logout.php" method="post">
                    <button class="admin-bt">Выйти</button>
                </form>
            </div>
            <h1 class="main-title">Панель администратора</h1>
            <div class="table-link-box">
                <a href="admin/users.php" class="table-link">
                    <p class="table-text">Пользователи</p>
                </a>
                <a href="admin/dogs.php" class="table-link">
                    <p class="table-text">Собаки</p>
                </a>
                <a href="admin/adoption.php" class="table-link">
                    <p class="table-text">Заявки на усыновление</p>
                </a>
                <a href="#" class="table-link">
                    <p class="table-text">Бронирование времени в антикафе</p>
                </a>
                <a href="#" class="table-link">
                    <p class="table-text">Заявки на волонтерство</p>
                </a>
                <a href="#" class="table-link">
                    <p class="table-text">Формы обратной связи</p>
                </a>
            </div>

        </div>
    </div>


</body>

</html>