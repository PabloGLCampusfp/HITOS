<?php
session_start();

function logeado() {
    return isset($_SESSION['user_id']);
}

function redirigir($pagina) {
    header("Location: $pagina");
    exit();
}

function verificar_logueo() {
    if (!logeado()) {
        redirigir('login.php');
    }
}