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
    <link rel="stylesheet" href="style.css">
    <title>Profile</title>
</head>

<body>
    <div class="profile-box">
        <!-- <div class="container"> -->

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
        <div class="profile">
            <div class="profile-text-box">
                <div class="profile-left-box">
                    <h1 class="main-title">Профиль</h1>
                    <?php
                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT * FROM `users` WHERE users.ID_users = '$user_id'";
                    $result = mysqli_query($connect, $sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<p class="profile-text">' . $row['Surname'] . '  ' . $row['Name'] . '  ' . $row['Patronymic'] . '</p>';
                            echo '<p class="profile-text">' . $row['Phone_number'] . '</p>';
                            echo '<p class="profile-text">' . $row['Email'] . '</p>';
                        }

                    }
                    ?>
                    <div class="bt-profile-box">
                        <button class="profile-bt"><a href="redactor.php"
                                class="main-bt-link">Редактировать</a></button>
                        <form action="php-handler/logout.php" method="post">
                            <button class="profile-bt"><a href="our_pets.php" class="main-bt-link">Выйти</a></button>
                        </form>
                    </div>
                </div>
                <?php
                    $user_id = $_SESSION['user_id'];
                    $sql = "SELECT dogs.image as image, dogs.name as dog, adoption.description, status.name FROM adoption JOIN dogs on dogs.ID_dogs = adoption.ID_dog JOIN status on status.ID_status = adoption.ID_status WHERE adoption.ID_user = '$user_id'";
                    $result = mysqli_query($connect, $sql);
                    if ($result->num_rows > 0) {
                        echo '<h1 class="prof-title">Заявки на усыновление собак</h1>';
                        while ($row = $result->fetch_assoc()) {
                            
                            echo '<div class="profff">';
                            echo '<img src="image/' . $row['image'] . '" alt="dog" class="dog-img-two">';
                            echo '<p class="profile-text">' . $row['dog'] . '  ' . $row['description'] . '  ' . $row['name'] . '</p>';
                            echo '</div>';
                        }

                    }
                    ?>
            </div>
            <div class="profile-img-box">
                <img src="image/profile-dog.png" alt="dog" class="profile-dog">
            </div>
        </div>
        <!-- </div> -->
    </div>
</body>

</html>