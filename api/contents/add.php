<?php
if ($_SERVER['REQUEST_METHOD']=='GET') {
    require_once '../connection.php';

    //creating a response
    $response=array(
        'status'=>404,
        'message'=>'cannot add content.'
    );

    //take the request and get the id,title,thumbnail,author and created_date.
    $request=json_decode(file_get_contents('php://input'));
    
    //creating a query.
    $title=$request->title;
    $thumbnail=$request->thumbnail;
    $author=$request->author;
    // $created_date=$request->created_date;

    // $title=$request->title;
    $sql="INSERT INTO videos (id,title,thumbnail,author) VALUES (null,'$title','$thumbnail','$author')";
    $result=$conn->query($sql);
    if ($result===TRUE) {
        $response=array(
            'status'=>200,
            'message'=>'content added successfully .'
        );
        http_response_code(200);
        # code...
    }
    else{
        http_response_code(404);
    }
    echo json_encode($response);
    $conn->close();
} else {
    # code...
    http_response_code(404);
}



?>