<?php
session_start();
if(isset($_SESSION['user_connected'])){
    header('Location: ./inc/dashboard.php?m="you are already connected');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./css/login.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <header>
        <div class="logo">
            <img src="img/notoriety-white-logo-.png" alt="">
        </div>
    </header>
    <main>
        <section class="info">
            <h1>Welcome Back!</h1>
            <p>
                To keep connectred with us please <br>
                login with your personal info
            </p>
        </section>
        <section class="login">
            <h1>Sign in to Notoriety</h1>
            <form action="./inc/login.php" method="POST">
                <div class="input">
                    <label for="user_name">
                        <i class="material-icons">
                            perm_identity
                        </i>
                    </label>
                    <input type="text" name="user_name" placeholder="User_Name">
                </div>
                <div class="input">
                    <label for="password">
                        <i class="material-icons">
                            lock
                        </i>
                    </label>
                    <input type="password" name="password" placeholder="****">
                </div>
                <button type="submit">SIGN IN</button>
            </form>
        </section>
    </main>
</body>

</html>