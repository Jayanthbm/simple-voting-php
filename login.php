<?php
include "head.php";
?>

<body>
  <div class="container">
    <?php include "navbar.php"; ?>

    <?php if ($_SESSION) {
      echo "Welcome <b>" . $_SESSION['name'] . "</b>";
      echo "<br/>";
      echo "You already Logged In <a href='index.php'>Go to Home</a>";
    } else { ?>
      <ul class="list-group">
        <center>
          <li class="list-group-item list-group-item-info">
            <h2>Login for Voting</h2>
          </li>
        </center>
      </ul>
      <div id="results"></div>
      <form action="login_action.php" method="post" id="loginform">
        <div class="form-group">
          <label for="username"> Username :</label>
          <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" required>
        </div>
        <input type="submit" class="btn btn-primary" name="login" value="login">
      </form>
    <?php  } ?>
  </div>
  <!---Start Footer -->

  <?php include "footer.php"; ?>

  <!---End Footer -->
  <script type="text/javascript">
    $('#loginform').submit(function(e) {
      $('#results').html('');
      e.preventDefault();
      var form = $(this);
      var url = form.attr('action');
      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(data) {
          if (data === 'Login Successful') {
            location.href = 'index.php';
          }
          $('#results').html(data);
          $('#loginform')[0].reset();
        }
      });
    })
  </script>
</body>