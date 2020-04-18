<?php
session_start();
?>
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

<th><b>Login</b></th>
<br><br>

<table border=5> <tr><th>Jméno</th><th>Heslo</th><th>Login</th>
    <tr>
        <form action="logdb" method="post">
            <td><input type="text" name="nameDB" required></td>
            <td><input type="password" name="password" required></td>
            <td><button type="submit" name="submit"> Login</button></td>
        </form>
    </tr>
</table>

</body>
</html>

<?php

$link2 = mysqli_connect("127.0.0.1", "root", "", "registerdb");
if($link2 === false) {
    echo "<strong> Je to blbý";
    die();
}

if ($_SESSION['loginDB'] ?? null) {
    if($_SESSION['loginDB'] == true) {
        header("Location: loripsdb");
    }
}else{
    if (isset($_POST['submit'])) {
        if(($_POST['nameDB'] != "") && ($_POST['password'] != "")){
            $name = $_POST['nameDB'];
            $passw = $_POST['password'];

            $checkDB = "SELECT password
                    FROM regdb
                    WHERE ussername LIKE(?)
                    GROUP BY id
                   ";
            $checkedDB = $link2->prepare($checkDB);
            $checkedDB->bind_param('s', $name);
            $checkedDB->execute();
            $checkedDB->bind_result($hash);
            $checkedDB->fetch();

            if (password_verify($passw, $hash)) {
                echo 'Password is valid!';
                $_SESSION['loginDB'] = true;
                $_SESSION['nameDB'] = $_POST['nameDB'];
                header("Location: loripsdb");
            } else {
                echo 'Invalid password.';
            }

        }
    }
}