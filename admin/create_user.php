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


$surname = $_POST['user_surname'];
$name = $_POST['user_name'];
$patronymic = $_POST['user_patronymic'];
$phone = $_POST['user_phone_number'];
$email = $_POST['user_email'];
$adm = $_POST['user_adm'];
mysqli_query($connect, query:"INSERT INTO `users`(`Surname`, `Name`, `Patronymic`, `Phone_number`, `Email`, `Is_admin`) VALUES ('$surname','$name','$patronymic','$phone', '$email','$adm')");


header("location: users.php");
?>