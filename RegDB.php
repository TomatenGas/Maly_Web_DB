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

<th><b>Registrace</b></th>
<br><br>

<table border=5> <tr><th>Jméno</th><th>Heslo</th><th>Registr</th>
    <tr>
        <form action="regdb" method="post">
            <td><input type="text" name="nameDB" required></td>
            <td><input type="password" name="password" required></td>
            <td><button type="submit" name="submit"> Register</button></td>
        </form>
    </tr>
</table>

</body>
</html>

<?php

$link = mysqli_connect("127.0.0.1", "root", "", "registerdb");
if($link === false) {
    echo "<strong> Je to blbý";
    die();
}

if ($_SESSION['loginDB'] ?? null) {
    header("Location: loripsdb");
}else{
    if (isset($_POST['submit'])) {
        if(($_POST['nameDB'] != "") && ($_POST['password'] != "")){
            $name = $_POST['nameDB'];
            $passw = $_POST['password'];
            $passwHash = password_hash($passw, PASSWORD_BCRYPT);

            $addToDB = "INSERT INTO regdb (ussername, password) 
            VALUES(
                  (?),
                  (?)
                  )
            ";
            $addDB = $link->prepare($addToDB);
            $addDB->bind_param('ss', $name, $passwHash);
            $addDB->execute();
            header("Location: logdb");
        }
    }
}
