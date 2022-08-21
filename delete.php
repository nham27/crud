<?php

include 'functions.php';

// kembalikan user ke index.php, kalau takdak id
if(!isset($_GET['id'])){
    return header('Location:index.php');
    exit;
}

$id = $_GET['id'];
delete($id);

