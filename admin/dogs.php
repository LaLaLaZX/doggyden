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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Собаки</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="table-box">
        <div class="container">
            <h2 class="pets-title-tb">Собаки</h2>
            <div class="table-one">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Имя</th>
                        <th>Описание</th>
                        <th>Картинка</th>
                    </tr>
                    <?php
                    $dogs = mysqli_query($connect, query: "SELECT * FROM dogs");
                    $dogs = mysqli_fetch_all($dogs);
                    foreach ($dogs as $dog) {
                        ?>
                        <tr>
                            <td>
                                <?= $dog[0] ?>
                            </td>
                            <td>
                                <?= $dog[1] ?>
                            </td>
                            <td>
                                <?= $dog[2] ?>
                            </td>
                            <td>
                                <?= $dog[3] ?>
                            </td>
                            <td><a href="update_dog_page.php?ID_dogs=<?= $dog[0] ?>"><img class="edit-img"
                                        src="../image/edit.png"></a>
                            </td>
                            <td><a href="delete_dog.php?ID_dogs=<?= $dog[0] ?>"><img class="delete-img"
                                        src="../image/delete.png"></a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>

            <div class="table-box-two">
                <h1 class="table-name-two">Добавление</h1>
                <form class="update-form" action="create_dog.php" method="post">
                    <input type="text" name="dog_name" class="user-inp" placeholder="Имя"> <br>
                    <input type="text" name="dog_description" class="user-inp" placeholder="Описание"><br>
                    <input type="text" name="dog_image" class="user-inp" placeholder="Картинка"><br>
                    <button class="add-but" type="submit">Добавить</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>