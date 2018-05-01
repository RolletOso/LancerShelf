<?php
session_start();
print_r ($_SERVER);
echo __DIR__;
echo $_SESSION['email'];
?>