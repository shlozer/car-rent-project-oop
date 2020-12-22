<?php

    require_once 'conf.php';


    echo Conf::getLogin();
    echo Conf::getPassword();
    echo Conf::getHostname();
    echo Conf::getDatabase();
?>