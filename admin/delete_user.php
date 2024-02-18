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

    $users_id = $_GET['ID_Users'];

    mysqli_query($connect, query:"DELETE FROM `users` WHERE users.ID_users = '$users_id'");

    header("location: users.php");

?>