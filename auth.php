<?php
session_start();

function login($username, $password) {
    $default_username = 'admin';
    $default_password = 'password';

    if ($username == $default_username && $password == $default_password) {
        $_SESSION['logged_in'] = true;
        return true;
    } else {
        return false;
    }
}

function is_logged_in() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true;
}

function logout() {
    session_destroy();
}
?>
