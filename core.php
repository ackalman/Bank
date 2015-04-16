<?php
ob_start();
session_start();
$current_file = $_SERVER['SCRIPT_NAME'];

function loggedin(){
    if (isset($_SESSION['actnum'])&&!empty($_SESSION['actnum']))
        return true;
    else
        return false;
}
 
?>
