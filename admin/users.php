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
    <title>Пользователи</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="table-box">
        <div class="container">
            <h2 class="pets-title-tb">Пользователи</h2>
            <div class="table-one">
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Фамилия</th>
                        <th>Имя</th>
                        <th>Отчество</th>
                        <th>Номер телефона</th>
                        <th>Почта</th>
                        <th>Админ</th>
                    </tr>
                    <?php
                    $users = mysqli_query($connect, query: "SELECT * FROM users");
                    $users = mysqli_fetch_all($users);
                    foreach ($users as $user) {
                        ?>
                        <tr>
                            <td>
                                <?= $user[0] ?>
                            </td>
                            <td>
                                <?= $user[1] ?>
                            </td>
                            <td>
                                <?= $user[2] ?>
                            </td>
                            <td>
                                <?= $user[3] ?>
                            </td>
                            <td>
                                <?= $user[4] ?>
                            </td>
                            <td>
                                <?= $user[5] ?>
                            </td>
                            <td>
                                <?= $user[7] ?>
                            </td>
                            <td><a href="update_user_page.php?ID_users=<?= $user[0] ?>"><img class="edit-img"
                                        src="../image/edit.png"></a>
                            </td>
                            <td><a href="delete_user.php?ID_Users=<?= $user[0] ?>"><img class="delete-img"
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
                <form class="update-form" action="create_user.php" method="post">
                    <input type="text" name="user_surname" class="user-inp" placeholder="Фамилия"> <br>
                    <input type="text" name="user_name" class="user-inp" placeholder="Имя"><br>
                    <input type="text" name="user_patronymic" class="user-inp" placeholder="Отчество"><br>
                    <input type="text" name="user_phone_number" class="user-inp" placeholder="Телефон"><br>
                    <input type="text" name="user_email" class="user-inp" placeholder="Почта"><br>
                    <input type="text" name="user_adm" class="user-inp" placeholder="Админ"><br>
                    <button class="add-but" type="submit">Добавить</button>
                </form>
            </div>

        </div>
    </div>
</body>

</html>