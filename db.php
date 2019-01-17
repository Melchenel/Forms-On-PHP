<?php

require "Libs/rb.php";
R::setup( 'mysql:host=localhost;dbname=Autorization',
        'root' ); //for both mysql or mariaDB
		session_start();
?>