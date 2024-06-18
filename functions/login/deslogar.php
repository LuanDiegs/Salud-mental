<?php
session_start();

if (isset($_SESSION["logado"])) {
    unset($_SESSION["logado"]);
}

if (isset($_SESSION["usuario"])) {
    unset($_SESSION["usuario"]);
}

header("location: ../../index.php");
