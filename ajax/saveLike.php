<?php

require_once('../bootstrap.php');
    
    if(!empty($_POST)){ 
        
        $postId= $_POST['postId'];

        // try{
            $like= new Like();
            $like->setPostId($postId); 
            $like->setUserId(2); 
            $like->save(); 

            $response = [
                'status'=> 'success', 
                'message' => 'Like was successful'
            ];
        
        header('Content-Type: application/json');
        echo json_encode($response);
        // ons "fetch" javascript kent geen php arrays, maar die kent wel jason. het antwoord gaan parsen in jason formaat we geven jason als resultaat 
    
    }