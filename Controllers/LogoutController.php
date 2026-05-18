<?php
session_start();

session_unset(); 
session_destroy(); 

header('Location: /NoLeak/index.php?page=home');
exit();