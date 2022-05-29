<?php
  // session_start();
  session_start();
  // $_SESSION['user'];
?>
<nav class="navbar">
    <a href="index.php" class="logo"><img src="images/Spacesse.png" alt="spacesse"></a>
    
    <div class="links">
        <a href="logout.php" class="link navbar__logout">Logout</a>
        <a href="#" class ="profile link"><img src="https://www.edarabia.com/wp-content/uploads/2015/11/7-ways-to-become-the-person-everyone-respects.jpg" alt="profile">Hi <?php /*echo $username */?> </a>
        <a href="index.php" class= "link">Home</a>
    <!-- <a href="mylist.php">My List</a> -->
    </div>
   <!-- <form action="" method="get"> 
      <input type="text" name="search">
    </form>-->
    
    <!-- <a href="logout.php" class="links navbar__logout">Hi <?php /*echo $username */?>, logout?</a> -->
</nav>