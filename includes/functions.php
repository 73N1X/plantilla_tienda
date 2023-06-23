<?php

define('DOWNLOADS_FOLDER', $_SERVER['DOCUMENT_ROOT'] . '/downloads/');

function debug($variable) : string {
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
    exit;
}

function isAuth()
{
    session_start();
    if (!$_SESSION['login']) {
        header('Location: /');
    }
}

function s($html) : string {
    $s = htmlspecialchars($html ?? '');
    return $s;
}

function valRed(string $url) {
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id) {
        header('Location: $(url)');
    }
    return $id;
}

function vct($type) {
    $types = ['profile', 'user', 'linker'];
    return in_array($type, $types);
}

function notify($code) {
    $message = '';
    switch ($code) {
        case 1:
            $message = 'New record created';
            break;
        case 2:
            $message = 'Record has been modified';
            break;
        case 3:
            $message = 'Record has been Deleted';
            break;
    }
    return $message;
}