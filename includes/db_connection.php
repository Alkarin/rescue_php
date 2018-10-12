<?php
/**
 * Created by PhpStorm.
 * User: alexander
 * Date: 10/11/18
 * Time: 8:37 PM
 */

define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASS", "password");
define("DB_NAME", "rescue_pokemon");
define("MYSQL_ERROR", 410);

$connection = new mysqli(DB_SERVER,DB_USER,DB_PASS,DB_NAME) or die(MYSQL_ERROR);

// Test if connection occured.
if(mysqli_connect_errno()){
    die("Database connection failed: " . mysqli_connect_error() . " (" . mysqli_connect_errno() . ")");
}
