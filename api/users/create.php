<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
require_once '../connection.php';

// create a response
$response = array(
    'status' => 404,
    'content' => 'Can not create a user.'
);

// take the request and get the username and password
$request = json_decode(file_get_contents("php://input"));


// create a  query
$uname = $request->username;
$passw = md5($request->password);
$sql = "INSERT INTO users (id,username,password) VALUES(null, '$uname','$passw')";

// execute query
$result = $conn->query($sql);

// result contains BOOLEAN
if($result === TRUE) {
    $response = array(
        'status' => 200,
        'content' => 'User created successfully.'
    );
    http_response_code(200);
}
else {
    http_response_code(404);
} 

echo json_encode($response);

$conn->close();

} else {
    http_response_code(404);
}