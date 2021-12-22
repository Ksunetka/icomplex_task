<?php

    if(isset($_POST['button'])) {
        function userShow()
        {
            $lastName = ($_POST['lastName']);
            $name = ($_POST['name']);
            $fatherName = ($_POST['fatherName']);
            $gender = ($_POST['gender']);
            $age = ($_POST['age']);



            if ($gender == "woman" && $age > 50) {
                echo 'Уважаемая '.$name.' '.$fatherName.', Ваши данные отправлены успешно.';
            } else if ($gender == "woman" && $age < 50) {
                echo 'Дорогая '.$lastName.' '.$name.', ваши данные отправлены успешно.';
            }

            if ($gender == "man" && $age > 50) {
                echo 'Уважаемый '.$name.' '.$fatherName.', Ваши данные отправлены успешно.';
            } else if ($gender == "man" && $age < 50) {
                echo $lastName.' '.$name.', ваши данные отправлены успешно.';
            }


        }

        return userShow();

    }

?>

<style>

    .body_form input {
        margin-bottom: 7px;
    }

    .body_form select {
        margin-bottom: 7px;
    }


</style>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="body_form">
        <form action="form.php" method="post">
            <p>Заполните поля Вашими данными:</p>
            <input id="lastName" type="text" name="lastName" required="required" placeholder="Ваша Фамилия"><br>
            <input id="name" type="text" name="name" required="required" placeholder="Ваше Имя"><br>
            <input id="fatherName" type="text" name="fatherName" required="required" placeholder="Ваше Отчество"><br>
            <select id="gender" name="gender" size="1" required>
                    <option style="display:none;" value="" disabled selected></option>
                    <option value="woman">женский</option>
                    <option value="man">мужской</option>
            </select><br>
            <input id="age" type="text" name="age" required="required" placeholder="Ваш Возраст"><br>
            <input type="submit" name="button" value="Отправить">
        </form>
    </div>
</body>
</html>