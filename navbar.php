<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="home.php">Jason's Hotel</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="rooms.php">Rooms</a>
      <a class="nav-item nav-link" href="reservations.php">Reservations</a>
      <a class="nav-item nav-link" href="cart.php">Cart</a>
      <?php echo(($_SESSION['is_admin'] == 1) ? ('<a class="nav-item nav-link" href="edit.php">Edit Room</a>') : null); ?>
      <?php echo(($_SESSION['is_admin'] == 1) ? ('<a class="nav-item nav-link" href="statistics.php">Statistics</a>') : null); ?>
    </div>
  </div>
  <div class="navbar-nav navbar-right">
      <a href="logout.php"><span class="fa fa-sign-out"></span>Logout</a>
    </div>
</nav>
