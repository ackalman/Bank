<?php
require 'core.php';
session_destroy();
$http_referer = 'index.php';
header('Location: '.$http_referer);
 
 
?>