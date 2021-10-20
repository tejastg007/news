<?php
error_reporting(0);
$domain = $_SERVER['HTTP_HOST'];
$protocol =  $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"], 0, 5)) == 'https' ? 'https' : 'http';
$filepath=$_SERVER['PHP_SELF'];
$pathinfo=pathinfo($filepath);
$homelink=$pathinfo['dirname'];
$root=$protocol."://".$domain.$pathinfo['dirname']."/";
$apikey="5f7db36c4764436aa8cbd144d2e30aa4";
?>