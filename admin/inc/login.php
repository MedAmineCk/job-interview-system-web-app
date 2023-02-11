<?php
$user_name = $_POST['user_name'];
$password = $_POST['password'];

if ($user_name == 'admin' && $password == '@root@') {
    session_start();
    $_SESSION['user_connected'] = true;
    $_SESSION['user_statut'] = 'admin';
    header('Location: dashboard.php');
}elseif ($user_name == 'recrutement' && $password == '@recrutement@') {
    session_start();
    $_SESSION['user_connected'] = true;
    $_SESSION['user_statut'] = 'recrutement';
    header('Location: dashboard.php');
}else{
    header('Location: ../index.php?m=some info not correct!');
}

