<?php
require_once("init.php");
session_destroy();
routing::go("login.php");
