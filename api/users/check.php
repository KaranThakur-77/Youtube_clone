<?php

require_once "../connection.php";

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    // take the request and get the username and password
    $request = json_decode(file_get_contents("php://input"));


    // create a  query
    $uname = $request->username;
    $passw = md5($request->password);

    $sql = "SELECT * FROM users WHERE username = '$uname' AND password = '$passw'";

    // execute the query
    $result = $conn->query($sql);

    if($result->num_rows > 0) {
        http_response_code(200);
        echo json_encode(array(
            'status' => 'successful',
            'content' => 'User found'
        ));
    }
    else {
        http_response_code(404);
        echo json_encode(array(
            'status' => 'not successful',
            'content' => 'User not found'
        ));
    }
}
else {
    http_response_code(404);
}