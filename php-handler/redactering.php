<?php
session_start();
include("../php-connect/connect.php");

$user_id = $_SESSION['user_id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$phone_number = $_POST['phone_number'];
$email = $_POST['email'];

$query = "UPDATE `users` SET users.Surname='$surname', users.Name='$name', users.Patronymic='$patronymic',users.Phone_number='$phone_number', users.Email='$email' WHERE users.ID_users = '$user_id'";
$result = mysqli_query($connect, $query);


// Проверяем, была ли успешной вставка
if ($result) {
  $_SESSION['message'] = "Данные изменены";
  header("Location: ../profile.php");
} else {
  $_SESSION['message'] = "Ошибка!!!";
  header("Location: ../profile.php");;
}

// Закрываем соединение с базой данных
mysqli_close($connect);
?>