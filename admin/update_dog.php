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


$dogs_id = $_POST['id_dogs'];
$name = $_POST['dog_name'];
$description = $_POST['dog_description'];
$image = $_POST['dog_image'];

mysqli_query($connect, query:"UPDATE `dogs` SET `name`='$name',`description`='$description',`image`='$image' WHERE dogs.ID_dogs = '$dogs_id'");

header("location: dogs.php");
?>