<?php
session_start();

// Очищаем сессионные данные
$_SESSION = array();

// Уничтожаем сессию
session_destroy();

// Перенаправляем на страницу входа или другую страницу при выходе
header("Location: ../index.php");
exit();
?>