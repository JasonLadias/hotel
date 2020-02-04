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
      <?php echo(($_SESSION['is_admin'] == 1) ? ('<a class="nav-item nav-link" href="edit.php">Edit Room</a>') : null); ?>
      <?php echo(($_SESSION['is_admin'] == 1) ? ('<a class="nav-item nav-link" href="statistics.php">Statistics</a>') : null); ?>
    </div>
  </div>
  <div class="navbar-nav navbar-right">
      <a href="logout.php"><span class="fa fa-sign-out"></span>Logout</a>
    </div>
</nav>



<!--<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="home.php">Jason's Hotel</a>
    </div>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li><a href="home.php">Home</a></li>
      <li><a href="rooms.php">Rooms</a></li>
      <li><a href="#">Reservations</a></li>
      <?php //echo(($_SESSION['is_admin'] == 1) ? ('<li><a href="#">Edit Room</a></li>') : null); ?>
      <?php //echo(($_SESSION['is_admin'] == 1) ? ('<li><a href="#">Statistics</a></li>') : null); ?>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
    </ul>
    >/
  </div>
</nav>-->