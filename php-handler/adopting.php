<?php
session_start(); // Открытие сессии и обращение к файлу connect.php для соединения с БД
include("../php-connect/connect.php");

// Получаем данные из формы
$dog_id = $_POST['dog_name'];
$user_id = $_SESSION['user_id']; // Предполагая, что у вас уже есть сессия для пользователя
$description = $_POST['description'];
$status_id = 1; // Устанавливаем значение для ID_status

// Добавляем данные в базу данных
$query = "INSERT INTO adoption (ID_dog, ID_user, description, ID_status) VALUES ('$dog_id', '$user_id', '$description', '$status_id')";
$result = mysqli_query($connect, $query);

// Проверяем, была ли успешной вставка
if ($result) {
  $_SESSION['message'] = "Ваша заявка отправлена";
  header("Location: ../our_pets.php");
} else {
  $_SESSION['message'] = "Ошибка!!!";
  header("Location: ../our_pets.php");;
}

// Закрываем соединение с базой данных
mysqli_close($connect);
?>