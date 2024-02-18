<?php
session_start(); // Открытие сессии и обращение к файлу connect.php для соединения с БД
include("../php-connect/connect.php");

// Получаем данные из формы

$user_id = $_SESSION['user_id']; 
$theme = $_POST['theme'];
$question = $_POST['question'];

// Добавляем данные в базу данных
$query = "INSERT INTO feedback (ID_users, theme, question) VALUES ('$user_id', '$theme', '$question')";
$result = mysqli_query($connect, $query);

// Проверяем, была ли успешной вставка
if ($result) {
  $_SESSION['message'] = "Сообщение отправлено";
  header("Location: ../contacts.php");
} else {
  $_SESSION['message'] = "Ошибка!!!";
  header("Location: ../contacts.php");;
}

// Закрываем соединение с базой данных
mysqli_close($connect);
?>