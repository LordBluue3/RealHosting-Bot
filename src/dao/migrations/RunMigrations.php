<?php
$createUsers = include('CreateWarns.php');
$createWarns = include('CreateWarns.php');

/**
 * This will run the migrations 
 * to create the database
 */
$createUsers->up();
$createWarns->up();