<?php
session_start(); 

if (isset($_SESSION['user_id'])) {
    echo 1;
} else {
    session_unset(); 
    session_destroy(); 
    echo 0;
}
?>