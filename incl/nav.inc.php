<?php
  // session_start();
  session_start();
  // $_SESSION['user'];
?>
<nav class="navbar">
    <!-- <a href="index.php" class="logo">IMDflix</a> -->
    <a href="index.php">Home</a>
    <a href="mylist.php">My List</a>
    
    <form action="" method="get">
      <input type="text" name="search">
    </form>
    
    <a href="logout.php" class="navbar__logout">Hi <?php /*echo $username */?>, logout?</a>
</nav>