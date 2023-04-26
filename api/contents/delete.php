<?php
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    require_once '../connection.php';

    //create a response
    $response=array(
        'status'=>404,
        'message'=>'Cannot perform specified operation.'
    );

    //take the request and perform the operation 
    $request=json_decode(file_get_contents('php://input'));

    //create a query 
    $id=$request->id;
    $sql="DELETE FROM videos WHERE id=$id";
    $result=$conn->query($sql);
    if ($result===TRUE) {
        $response=array(
            'status'=>200,
            'message'=>'Operation performed successfully'
        );
        http_response_code(200);
        # code...
    } else {
        # code...
        http_response_code(404);
    }
    echo json_encode($response);
    $conn->close();
    

}

else {
    http_response_code(404);

}

?>