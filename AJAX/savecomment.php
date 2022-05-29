<?php

include_once(__DIR__."/../classes/Comment.php");

if(!empty($_POST)){

    // new comment
$c = new Comment();
$c->setPostId($_POST['postId']);
$c->setText($_POST['text']);
$c->setUserId(1);
    // save()

    $c->save();

    // success teruggeven
$response = [
    'status' => 'success',
    'body' => htmlspecialchars($c->getText()),
    'message' => 'Comment saved'
];
  header('Content-Type: application/json');
  echo json_encode($response); 
}

?>