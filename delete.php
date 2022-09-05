<?php
// session start
session_start();
if(!isset($_SESSION['login'])){
    header('Location:login.php');
    exit;
}

include 'functions.php';

// kembalikan user ke index.php, kalau takdak id
if(!isset($_GET['id'])){
    return header('Location:index.php');
    exit;
}

$id = $_GET['id'];
delete($id);

