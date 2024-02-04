<?php
$createUsers = include(__DIR__.'/migrations/CreateUsers.php');
$createWarns = include(__DIR__.'/migrations/CreateWarns.php');

/**
 * This will run the migrations 
 * to create the database
 */
$createUsers->up();
$createWarns->up();