<?php
require_once "init.php";
if (isset($_SESSION['logon'])) {
    Routing::go("index.php");
} else {
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body id="login">
    <form id="form-login" action="action-login.php" method="POST">
        <div class="form-header">
            <div class="logo">
                <a>
                    <h1>Emlak<span>hub</span> | Admin Giriş</h1>
                </a>
            </div>
        </div>
        <br>
        <hr>
        <div class="form-body">
            <label for="username">Kullanıcı Adı:</label>
            <input type="text" name="username" id="username" required>
            <label for="password">Şifre:</label>
            <input type="password" name="password" id="password" required>
            <button name="form-login" class="btn-login">Giriş</button>
        </div>
        <br>

    </form>
    <script>
        let body = document.querySelector("body#login");
        body.style.height = window.innerHeight + "px";
        window.addEventListener("resize", (e) => {
            body.style.height = window.innerHeight + "px";
        })
    </script>
</body>

</html>