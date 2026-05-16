<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['usuario'])) {
    header('Location: login.php');
    exit;
}

require 'routes/web.php';