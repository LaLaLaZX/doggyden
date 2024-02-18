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


$users_id = $_POST['id_users'];
$surname = $_POST['user_surname'];
$name = $_POST['user_name'];
$patronymic = $_POST['user_patronymic'];
$phone = $_POST['user_phone_number'];
$email = $_POST['user_email'];
$adm = $_POST['user_adm'];

mysqli_query($connect, query:"UPDATE `users` SET `Surname`='$surname',`Name`='$name',`Patronymic`='$patronymic',`Phone_number`='$phone',`Email`='$email',`IS_admin`='$adm' WHERE users.ID_users = '$users_id'");

header("location: users.php");
?>