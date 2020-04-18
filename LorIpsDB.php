<?php
session_start();

if ($_SESSION['nameDB'] ?? null) {
    if ($_SESSION['loginDB'] == true) {
        echo "Jméno přihlášeného uživatele: <strong>" . $_SESSION['nameDB'] . "</strong>";
        echo "<br><br>";
        echo "lorem ipsum ... lorem ipsum ... lorem ipsum ...";
    } else {
        header("Location: logdb");
    }
}else{
    header("Location: logdb");
}