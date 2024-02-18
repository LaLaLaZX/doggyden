<?php
session_start();
include("../php-connect/connect.php");
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];

    // Очистка сессионной переменной
    unset($_SESSION['message']);

    // Вывод сообщения только после регистрации
    echo '<div class="message">' . $message . '</div>';
}

$users_id = $_GET['ID_users'];
$user = mysqli_query($connect, query: "SELECT * FROM users WHERE `ID_users` = '$users_id'");
$user = mysqli_fetch_assoc($user);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="table-box-two">
    <h1 class="table-name-two">Изменение</h1>
    <form class="update-form" action="update_user.php" method="post">
        <input type="hidden" name="id_users" value="<?= $user['ID_users'] ?>"> 
        <input type="text" name="user_surname" class="user-inp" placeholder="Фамилия" value="<?= $user['Surname'] ?>"> <br>
        <input type="text" name="user_name" class="user-inp" placeholder="Имя" value="<?= $user['Name'] ?>"> <br>
        <input type="text" name="user_patronymic" class="user-inp" placeholder="Отчество" value="<?= $user['Patronymic'] ?>"> <br>
        <input type="text" name="user_phone_number" class="user-inp" placeholder="Телефон" value="<?= $user['Phone_number'] ?>"> <br>
        <input type="text" name="user_email" class="user-inp" placeholder="Почта" value="<?= $user['Email'] ?>"> <br>
        <input type="text" name="user_adm" class="user-inp" placeholder="Админ" value="<?= $user['Is_admin'] ?>"> <br>
        <button class="add-but" type="submit">Изменить</button>
    </form>
    </div>
</body>
</html>