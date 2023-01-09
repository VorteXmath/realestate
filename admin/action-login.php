<?php
require_once "init.php";
if (isset($_POST['form-login'])) {
    $username = isset($_REQUEST['username']) ? $_REQUEST['username'] : null;
    $password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;

    $check = $connect->read("SELECT * FROM tbladmin WHERE username=? AND password=?", array($username, $password));
    if ($check->fetch(PDO::FETCH_ASSOC)) {
        echo "success" . $username;
    }else{
        echo "incorrect username or password";
        Routing::comeBack();
    }
} else {
    die("forbidden");
}
