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

    $dogs_id = $_GET['ID_dogs'];

    mysqli_query($connect, query:"DELETE FROM `dogs` WHERE dogs.ID_dogs = '$dogs_id'");

    header("location: dogs.php");

?>