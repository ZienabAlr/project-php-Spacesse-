<?php

include_once("bootstrap.php");
$conn = Db::getConnection();

if(isset($_POST['submit'])){

	$post= new Post(); 
        
	$title= $post->setTitle($_POST["title"]);
	$description= $post->setDescription($_POST["explain"]);
	//upload een afbeelding/document
	
	$img_name= $_FILES['file']['name'];
	$tmp_name= $_FILES['file'][ 'tmp_name'];
	$img_size=$_FILES['file']['size'];

	if($img_size > 5000000){

		$message= "Sorry, your file is too large.";
	}else{
		$upload_dir='uploads/';
		$imgExt=strtolower(pathinfo($img_name,PATHINFO_EXTENSION));
		// echo($imgExt);

		$valid_extensions= ['jpeg', 'jpg', 'png', 'gif', 'pdf'];
		$picProfile=rand(1000,1000000).".".$imgExt;
		move_uploaded_file($tmp_name,$upload_dir.$picProfile);
		$image= $post->setImage($picProfile);
		$post->create_post();
	}


}
$posts = Post::show_post();


?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home page</title>
    <!-- <link rel="stylesheet" href="css/home.css"> -->
	<link rel="stylesheet" href="css/main.css">
	<!-- <script type="text/javascript"></script> -->

</head>
<body>

	<header>
		<?php include_once("incl/nav.inc.php"); ?>

	</header>	
	
	<div class="post-form">

		<div class="post">
			<form method="post" action="" enctype='multipart/form-data'>
				<div>
					<div class="inputContainer">
						<input type="text" class="input" name ="title" placeholder="Title..." value="">
					</div>

					<div class="inputContainer">
						<input type="text" class="input wider-input" name="explain" placeholder="Write what you think..." value="">
					</div>
				
					<div class="inputContainer">
						<input type="file" class="input" name ="file" value="" multiple="" >
						
					</div>
				
				</div>

				<div class="sbmt-btn">
				
					<input type="submit" id="submitBtn" class="font actBtn" name="submit" value="Post">

				</div>
			</form>

		</div>
	</div>
	<div class="post-form">
		<div class="post-box">
			<form method="post" action="">
				<?php foreach($posts as $onePost): ?>
					<article>
						<h2 class="white-text"><?php echo htmlspecialchars($onePost['title'] ) ?></h2>
						<p class="white-text"><?php echo htmlspecialchars($onePost['description'] ) ?></p>
						<div class="post-img">
							<img
								class="w-20"
								src="uploads/<?php echo htmlspecialchars($onePost['image'] ) ?>"
								alt=""
							/>
						</div>
						<div>
							<a href="" id="like" data-postid="<?php echo $onePost['id']?>"> ❤️like </a>
						</div>

						<div>
							<input type="text" placeholder="What's on your mind?" id="comment" name="comment" />
							<input id="btnSubmit" type="submit" value="Add comment" />
			
		
						</div>			
					</article> 
				<?php ; endforeach; ?>
			
			</form>
		</div>
	</div>			
	<script src="app.js"></script>
	
</body>
</html>