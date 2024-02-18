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
            <h2 class="pets-title-tb">Заявки на усыновление</h2>
            <div class="table-one">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Собака</th>
                        <th>Пользователь</th>
                        <th>Описание</th>
                        <th>Статус заявки</th>
                    </tr>
                    <?php
                    $adoption = mysqli_query($connect, query: "SELECT adoption.ID_adoption, dogs.name, users.Surname, adoption.description, status.name FROM adoption join dogs ON adoption.ID_dog = dogs.ID_dogs JOIN users ON users.ID_users = adoption.ID_user JOIN status ON status.ID_status = adoption.ID_status");
                    $adoption = mysqli_fetch_all($adoption);
                    foreach ($adoption as $adoptionn) {
                        ?>
                        <tr>
                            <td>
                                <?= $adoptionn[0] ?>
                            </td>
                            <td>
                                <?= $adoptionn[1] ?>
                            </td>
                            <td>
                                <?= $adoptionn[2] ?>
                            </td>
                            <td>
                                <?= $adoptionn[3] ?>
                            </td>
                            <td>
                                <?= $adoptionn[4] ?>
                            </td>
                            <td><a href="update_adoption_page.php?ID_adoptions=<?= $adoptionn[0] ?>"><img class="edit-img"
                                        src="../image/edit.png"></a>
                            </td>
                            <td><a href="delete_adoption.php?ID_adoptions=<?= $adoptionn[0] ?>"><img class="delete-img"
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
                <form class="update-form" action="create_adoption.php" method="post">
                    <select name="dogs_name" class="user-inp">

                        <?php $query = 'SELECT ID_dogs, name FROM `dogs`';
                        $result = mysqli_query($connect, $query);
                        $dogs = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        foreach ($dogs as $dog) {
                            echo '<option value="' . $dog['ID_dogs'] . '">' . $dog['name'] . '</option>';
                        }
                        ?>
                    </select> <br>
                    <input type="text" name="dog_description" class="user-inp" placeholder="Описание"><br>
                    <input type="text" name="dog_image" class="user-inp" placeholder="Картинка"><br>
                    <button class="add-but" type="submit">Добавить</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>