<?php
session_start(); // Открытие сессии и обращение к файлу connect.php для соединения с БД
include("../php-connect/connect.php");

// Присвоение переменным данных, которые ввел пользователь
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

// Удаление пробелов в начале и конце строки
$email = trim($_POST['email']);
$password = trim($_POST['password']);

//запрос к бд
$query = "SELECT * FROM users WHERE Email='$email'";
$result = mysqli_query($connect, $query);

if (isset($_POST['h-captcha-response']) && !empty($_POST['h-captcha-response'])) {
    
    $data = array(
        'secret' => "ES_777ecd05352047e8895351b88404fa7a",
        'response' => $_POST['h-captcha-response']
    );
    $verify = curl_init();
    curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
    curl_setopt($verify, CURLOPT_POST, true);
    curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
    $verifyResponse = curl_exec($verify);
    $responseData = json_decode($verifyResponse);
    if ($responseData->success) {
        if (mysqli_num_rows($result) > 0) {
            // Пользователь найден
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['Password'])) {
                // Правильный пароль
                if ($user['Is_admin'] == 0) {

                    $_SESSION['Is_admin'] = false; // Добавляем информацию об обычном пользователе в сессию
                    $_SESSION['user_id'] = $user['ID_users']; // Сохранение ID пользователя в сессию
                    // Перенаправление на profile.php, если Is_admin = 0
                    header("Location: ../profile.php");
                    exit();
                } elseif ($user['Is_admin'] == 1) {
                    $_SESSION['Is_admin'] = true; // Добавляем информацию об администраторе в сессию
                    $_SESSION['user_id'] = $user['ID_users']; // Сохранение ID пользователя в сессию
                    // Перенаправление на admin.php, если Is_admin = 1
                    header("Location: ../admin.php");
                    exit();
                }
            } else {
                // Неверный пароль
                $_SESSION['message'] = "Неверный логин или пароль";
                header("Location: ../index.php");
            }
        } else {
            // Пользователь не найден
            $_SESSION['message'] = "Пользователь не найден";
            header("Location: ../index.php");
        }
    }
}

// Закрытие соединения с базой данных
mysqli_close($connect);
?>