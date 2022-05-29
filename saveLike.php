<?php
    require_once('../bootstrap.php');
    
    if(!empty($_POST)){ 
        
        $postId= $_POST['postId'];

        // try{
            $like= new Like();
            $like->setPostId($postId); 
            $like->setUserId(2); // dat moeten we best niet doorgeven via fortend want dan zouden hackers de user id kunnen veranderen want daar kan alles gemanipuleerd worden. 
            // $like->setUserId($_SESSION['user']); // dat moeten we best niet doorgeven via fortend want dan zouden hackers de user id kunnen veranderen want daar kan alles gemanipuleerd worden. 
            // hier gaan we werken met data uit ons $_SESSION object 
            $like->save(); //Active Record 

            $response = [
                'status'=> 'success', 
                'message' => 'Like was successful'
            ];
        
        header('Content-Type: application/json');
        echo json_encode($response);
        // ons "fetch" javascript kent geen php arrays, maar die kent wel jason. het antwoord gaan parsen in jason formaat we geven jason als resultaat 
        //echo jason_encode($response);

    }