<?php
session_start(); // Открытие сессии и обращение к файлу connect.php для соединения с БД
include("../php-connect/connect.php");

// Присвоение переменным данных, которые ввел пользователь

if (isset($_POST['surname'])) {
    $surname = $_POST['surname'];
    if ($surname === '') {
        unset($surname);
    }
}

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    if ($name === '') {
        unset($name);
    }
}

if (isset($_POST['patronymic'])) {
    $patronymic = $_POST['patronymic'];
    if ($patronymic === '') {
        unset($patronymic);
    }
}

if (isset($_POST['phone_number'])) {
    $phone_number = $_POST['phone_number'];
    if ($phone_number === '') {
        unset($phone_number);
    }
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    if ($email === '') {
        unset($email);
    }
}

if (isset($_POST['password'])) {
    $password = $_POST['password'];
    if ($password === '') {
        unset($password);
    }
}

if (isset($_POST['confirmpassword'])) {
    $confirmpassword = $_POST['confirmpassword'];
    if ($confirmpassword === '') {
        unset($confirmpassword);
    }
}
// Удаление пробелов в начале и конце строки
$surname = trim($_POST['surname']);
$name = trim($_POST['name']);
$patronymic = trim($_POST['patronymic']);
$phone_number = trim($_POST['phone_number']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);
$confirmpassword = trim($_POST['confirmpassword']);

// хеширование пароля
$hash = password_hash($password, PASSWORD_DEFAULT);

if ($password !== $confirmpassword) {
    $_SESSION['message'] = "Пароли не совпадают!";
    header("Location: ../registration.php");
    exit;
}

// Проверка на наличие пользователя с таким же email в БД
$query = "SELECT * FROM users WHERE Email=?";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, 's', $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (mysqli_num_rows($result) > 0) {
    // Пользователь с таким email уже существует
    $_SESSION['message'] = "Пользователь с таким email уже существует";
    header("Location: ../registration.php");
    exit;
}

// Обработка данных пользователя и сохранение в базу данных
$query = "INSERT INTO `users`(`Surname`, `Name`, `Patronymic`, `Phone_number`, `Email`, `Password`) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($connect, $query);
mysqli_stmt_bind_param($stmt, 'ssssss', $surname, $name, $patronymic, $phone_number, $email, $hash);
$result = mysqli_stmt_execute($stmt);

// Проверка результата выполнения запроса
if ($result) {
    $_SESSION['message'] = "Регистрация успешна!";
} else {
    $_SESSION['message'] = "Ошибка при регистрации.";
}

// Закрытие соединения с базой данных
mysqli_close($connect);
header("Location: ../registration.php");
exit;
?>