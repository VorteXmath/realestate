<?php
require_once "init.php";
if (isset($_POST['form-login'])) {
    $username = isset($_REQUEST['username']) ? security::secure($_REQUEST['username']) : null;
    $password = isset($_REQUEST['password']) ? security::secure($_REQUEST['password']) : null;

    $check = $connect->read("SELECT * FROM tbladmin WHERE username=? AND password=?", array($username, $password));
    $admin = $check->fetch();
    if ($admin) { //correct username & password
        $_SESSION['username'] = $admin['username'];
        $_SESSION['full_name'] = $admin['full_name'];
        $_SESSION['phone'] = $admin['phone'];
        $_SESSION['logon'] = true;
        Routing::go("index.php");
    } else {
        echo "incorrect username or password";
        echo $username;
        echo $password;
        Routing::comeBack(1);
    }
} else {
    die("forbidden");
}
