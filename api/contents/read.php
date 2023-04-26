<?php
if ($_SERVER['REQUEST_METHOD']=='GET') {
    require_once '../connection.php';
    //creating a response 
    $response=array(
        'status'=>404,
        'message'=>'Cannot perform operation '
    );

    //take request and perform the operation
    $request=json_decode(file_get_contents('php://input'));

    //creating a query
    $sql="SELECT * FROM videos";

    $data=array();

    $result=$conn->query($sql);
    if ($result->num_rows>0) {
        while($row=$result->fetch_assoc()){
          $data[]=$row;
        }
        # code...
    } 

    $response=array(
        'status'=>200,
        'message'=>$data
    );
    echo json_encode($response);
    
} else {
    # code...
    http_response_code(404);
}

?>