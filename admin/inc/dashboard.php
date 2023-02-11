<?php
session_start();
if(!isset($_SESSION['user_connected'])){
    header("Location: ../index.php?m='you are not connected'");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | Dashboard</title>
    <link id="faveicon" rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <!-- jQuery JS 3.1.0 -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
</head>

<body>
    <header>
        <div class="search">
            <div class="icon">
                <i class="material-icons">
                    search
                </i>
            </div>
            <input type="search" placeholder="Search Labels..">
        </div>
        <form action="logout.php" method="post">
            <button type="submit">Deconnecter</button>
        </form>
    </header>
    <aside class="nav">
        <div class="logo">
            <img src="../img/Notorietyl-ogo.png" alt="">
        </div>
        <nav>

            <a href="#" class="active" onclick="$('#main_content').load('../sections/dashboard.php')">
                <span>
                    <i class="material-icons">
                        dashboard
                    </i>
                </span>
                <p>dashboard</p>
            </a>

            <a href="#" onclick="$('#main_content').load('../sections/data.php')">
                <span>
                    <i class="material-icons">
                        supervisor_account
                    </i>
                </span>
                <p>data</p>
            </a>

            <a href="#" onclick="$('#main_content').load('../sections/setting.php')">
                <span>
                    <i class="material-icons">
                        settings_applications
                    </i>
                </span>
                <p>parametre</p>
            </a>

        </nav>
    </aside>
    <section class="container" id="main_content">

    </section>
    <aside class="profile">
        <div class="profile-img">
            <i class="material-icons">
                account_circle
            </i>
        </div>
        <p>@admin</p>
        <div class="notify">
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
            <div class="item"></div>
        </div>
    </aside>
    <script src="../js/main.js"></script>
    <script>
        //change faveicon animation
        var i = 0;

        function changeFavicon(src) {
            $('link[rel="shortcut icon"]').attr('href', src)
        }
        window.setInterval(function () {
            i++;
            if (i % 2 == 0) {
                src = '../img/favicon.ico';
            } else {
                src = '../favicon.ico';
            }
            changeFavicon(src)
        }, 100);
    </script>
</body>

</html>