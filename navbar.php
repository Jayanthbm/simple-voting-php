<div class="header clearfix">
  <nav>
    <ul class="nav nav-pills float-right">
      <li class="nav-item">
        <a class="nav-link" href="index.php">Home</span></a>
      </li>
      <?php if (!$_SESSION) { //Condtional Statement ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="register.php">Register</a>
        </li>
      <?php } ?>
      <?php if ($_SESSION) {
        if ($_SESSION['rank'] == 'admin') { //Condtional Statement
      ?>
          <li class="nav-item">
            <a class="nav-link" href="vote_results.php">Vote Results</a>
          </li>
      <?php }
      } ?>
      <?php if ($_SESSION) {
        if ($_SESSION['rank'] == 'voter') { //Condtional Statement
      ?>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
      <?php }
      } ?>
      <?php if ($_SESSION) {
        if ($_SESSION['rank'] == 'voter') { //Condtional Statement
      ?>
          <li class="nav-item">
            <a class="nav-link" href="changepass.php">Change Password</a>
          </li>
      <?php }
      } ?>
      <?php if ($_SESSION) {  //Condtional Statement
        ?>
        <li class="nav-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      <?php } ?>
    </ul>
  </nav>
  <h3 class="text-muted">Voting System</h3>
</div>