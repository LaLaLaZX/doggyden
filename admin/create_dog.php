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


$name = $_POST['dog_name'];
$description = $_POST['dog_description'];
$image = $_POST['dog_image'];
mysqli_query($connect, query:"INSERT INTO `dogs`(`name`, `description`, `image`) VALUES ('$name','$description','$image')");


header("location: dogs.php");
?>