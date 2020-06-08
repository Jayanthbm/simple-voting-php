<?php
include "head.php";
?>

<body>
  <div class="container">
    <?php include "navbar.php"; ?>

    <!-- Start Content For Non Logged Users -->
    <?php if (!$_SESSION) { ?>
      <div class="jumbotron">
        <h1 class="display-3">Vote for your favorite POLITICAL PARTY</h1>
        <p class="lead">In order to make a vote you have to register first and then login.</p>
        <p><a class="btn btn-lg btn-success" href="login.php" role="button">Login Now</a></p>
      </div>
    <?php } ?>
    <!-- End Content For Non Logged Users -->

    <!-- Start Content For Logged Users With role Voter -->
    <?php if ($_SESSION) {
      if ($_SESSION['rank'] == 'voter') {
    ?>
        <ul class="list-group">
          <center>
            <li class="list-group-item list-group-item-info">
              <h3>Make a Vote </h3>
            </li>
          </center>
          <br />
          <li class="list-group-item list-group-item-success">
            <h4>What is your favorite political party? </h4>
          </li>
        </ul>
        <br />
        <div id="vresults"></div>
        <form action="submit_vote.php" name="vote" method="post" id="voteform">
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="radio1" name="lan" value="vis" checked>B
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="radio2" name="lan" value="C">C
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="radio3" name="lan" value="A" checked>A
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="radio4" name="lan" value="NOTA">NOTA
            </label>
          </div>
          <div class="form-check">
            <label class="form-check-label">
              <input type="radio" class="form-check-input" id="radio5" name="lan" value="INDEPENDENT">INDEPENDENT
            </label>
          </div>
          <br />
          <input type="submit" value="Submit Vote" class="btn btn-primary" name="submit" />
        </form>
    <?php }
    } ?>
    <!-- End Content For Logged Users With role Voter -->

    <!-- Start Content For Admin -->
    <?php if ($_SESSION) {
      if ($_SESSION['rank'] == 'admin') {
    ?>
        <ul class="list-group">
          <center>
            <li class="list-group-item list-group-item-info">
              <h2>Admin Panel</h2>
            </li>
          </center>
        </ul>
        <br />

        <ul class="list-group">
          <center>
            <li class="list-group-item list-group-item-warning">User Section</li>
          </center>
        </ul>
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Add Users</h6>
                <p class="card-text">Used to add Users</p>
                <a href="adduser.php" class="card-link">Add User</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">List Users</h6>
                <p class="card-text">Used to List Users</p>
                <a href="users.php" class="card-link">List Users</a>
              </div>
            </div>
          </div>
        </div>
        <ul class="list-group">
          <center>
            <li class="list-group-item list-group-item-warning">Voting Section</li>
          </center>
        </ul>
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <h6 class="card-subtitle mb-2 text-muted">Vote Results</h6>
                <p class="card-text">Used to See Vote Results</p>
                <a href="vote_results.php" class="card-link">Vote results</a>
              </div>
            </div>
          </div>
        </div>
    <?php }
    } ?>

    <!-- End Content For Admin -->

    <!---Start Footer -->

    <?php include "footer.php"; ?>

    <!---End Footer -->

  </div>
  <script>
    $('#voteform').submit(function(e) {
      $('#results').html('');
      e.preventDefault();
      var form = $(this);
      var url = form.attr('action');
      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(data) {
          $('#vresults').html(data);
        }
      });
    })
  </script>
</body>