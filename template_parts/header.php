<?php
if(isset($_SESSION['user_id'])) {
  $username = getUserInfo();
}

if(!isset($username)) {
  $username = 'User';
}
?>
<nav class="navbar navbar-default">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo $base_path; ?>">Trader</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Categories <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
          <?php
          $categories = $db->query("SELECT * FROM categories");

          while($row = $categories->fetch_assoc()) {
          ?>
          <li><a href="category.php?category_id=<?php echo $row['category_id']; ?>"><?php echo $row['name']; ?></a></li>
          <?php
          }
          ?>
          </ul>
        </li>
        <?php
        if(isset($_SESSION['user_id'])) {
        ?>
        <li><a href="<?php echo $base_path; ?>/cart.php">Cart</a></li>
        <?php
        }
        ?>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo $username; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <?php
            if(!isset($_SESSION['user_id'])) {
            ?>
            <li><a href="<?php echo $base_path; ?>/login.php">Login</a></li>
            <li><a href="<?php echo $base_path; ?>/register.php">Register</a></li>
            <?php
            } else {
            ?>
            <li><a href="<?php echo $base_path; ?>/profile.php">Profile</a></li>
            <li><a href="<?php echo $base_path; ?>/my_orders.php">My orders</a></li>
            <li><a href="<?php echo $base_path; ?>/change_password.php">Change password</a></li>
            <li><a href="<?php echo $base_path; ?>/logout.php">Log out</a></li>
            <?php
            }
            ?>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>