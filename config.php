<?php

define('DB_SERVER', '127.0.0.1:3307');
define('DB_USERNAME','root');
define('DB_PASSWORD', '');
define('DB_NAME','login');


// ----connecting to my sql database------

$link= mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
if($link===FALSE)
{
    die("Error :we Could not connet". mysqli_connect_error());
}
?>        

