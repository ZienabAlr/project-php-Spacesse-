<?php
include_once("bootstrap.php");
include_once(__DIR__ . "/classes/Comment.php");
$allComments = Comment::getAll(3);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
</head>

<body>

    <div class="post">
        <P class="post__title">Crying me eyes out! PHP can be so creul boo-hooo ;(</P>
        <img src="https://via.placeholder.com/300/200/5821E0/fff" alt="">
        <p class="likes">
        <a href="#">Like</a>
        <span id="likes__counter">2</span> People like this
        </p>

        <div class="post__comments">
            <div class="post__comments__form">
                <input type="text" placeholder="What's on your mind" id="commentText">
                <a href="#" class="bbttnn" id="btnAddComment" data-postid="3">Add comment</a>
            </div>
            <ul class="post__comments__list">
                <?php foreach($allComments as $c): ?>
                    <li><?php echo $c["text"] ?></li>
                    <?php endforeach; ?>
            </ul>
        </div>
    </div>



    <script src="app.js"></script>

</body>

</html>