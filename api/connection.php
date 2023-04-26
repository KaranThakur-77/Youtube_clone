<?php

// all api must return JSON object
header("Content-Type: application/json");


// configurations parameters
$servername = 'localhost';
$username = 'root';
$password  = '';
$database = 'youtube';

// create a connection to database
$conn = new mysqli($servername, $username,$password, $database);


// exit if fails
if(!$conn) {
    http_response_code(404);
    die();
}