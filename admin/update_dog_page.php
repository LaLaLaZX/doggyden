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
$dog = mysqli_query($connect, query: "SELECT * FROM dogs WHERE `ID_dogs` = '$dogs_id'");
$dog = mysqli_fetch_assoc($dog);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="table-box-two">
    <h1 class="table-name-two">Изменение</h1>
    <form class="update-form" action="update_dog.php" method="post">
        <input type="hidden" name="id_dogs" value="<?= $dog['ID_dogs'] ?>"> 
        <input type="text" name="dog_name" class="user-inp" placeholder="Имя" value="<?= $dog['name'] ?>"> <br>
        <input type="text" name="dog_description" class="user-inp" placeholder="Описание" value="<?= $dog['description'] ?>"> <br>
        <input type="text" name="dog_image" class="user-inp" placeholder="Картинка" value="<?= $dog['image'] ?>"> <br>
        <button class="add-but" type="submit">Изменить</button>
    </form>
    </div>
</body>
</html>