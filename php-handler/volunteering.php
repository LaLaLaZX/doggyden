<?php
session_start(); // Открытие сессии и обращение к файлу connect.php для соединения с БД
include("../php-connect/connect.php");

// Получаем данные из формы

$user_id = $_SESSION['user_id']; 
$why = $_POST['why'];
$experience = $_POST['experience'];
$often = $_POST['often'];

// Добавляем данные в базу данных
$query = "INSERT INTO volunteering (ID_users, why, experience, often) VALUES ('$user_id', '$why', '$experience', '$often')";
$result = mysqli_query($connect, $query);

// Проверяем, была ли успешной вставка
if ($result) {
  $_SESSION['message'] = "Заявка отправлена";
  header("Location: ../book.php");
} else {
  $_SESSION['message'] = "Ошибка!!!";
  header("Location: ../volunteer.php");;
}

// Закрываем соединение с базой данных
mysqli_close($connect);
?>