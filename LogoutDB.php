<?php
session_start();

if($_SESSION['loginDB'] == true){
    session_destroy();
    echo "Session was destroyed";
}else{
    header("Location: logdb");
}