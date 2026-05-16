<?php

session_start();

function requireLogin() {

    if (!isset($_SESSION['usuario'])) {

        header('Location: login.php');
        exit;
    }
}

function requireAdmin() {

    if ($_SESSION['rol'] != 'admin') {

        die('Acceso denegado');
    }
}