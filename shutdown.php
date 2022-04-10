<?php
register_shutdown_function("shutdown_handler");

function shutdown_handler(){
    require_once dirname(__FILE__) . 'new_regis.php'; // use ABSOLUTE path
    die();
}