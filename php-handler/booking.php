<?php
session_start(); // Открытие сессии и обращение к файлу connect.php для соединения с БД
include("../php-connect/connect.php");

// Получаем данные из формы
$event = $_POST['event'];
$user_id = $_SESSION['user_id']; 
$date = $_POST['date'];
$count_of_people = $_POST['count_of_people'];

// Добавляем данные в базу данных
$query = "INSERT INTO book_time (ID_users, event, date, count_of_people) VALUES ('$user_id', '$event', '$date', '$count_of_people')";
$result = mysqli_query($connect, $query);

// Проверяем, была ли успешной вставка
if ($result) {
  $_SESSION['message'] = "Время забронировано";
  header("Location: ../book.php");
} else {
  $_SESSION['message'] = "Ошибка!!!";
  header("Location: ../book.php");;
}

// Закрываем соединение с базой данных
mysqli_close($connect);
?>