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
      <div id="results"></div> <!-- Results from server -->
      <form action="login_action.php" method="post" id="loginform">
        <div class="form-group">
          <label for="username"> Username :</label>
          <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username">
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password">
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
      $('#results').html('');// Remove Elements to DOM
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
          if(data === `<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>Invalid Username or Password</div>`){
            document.getElementById("loginform").reset();// Remove Elements to DOM
          }
          $('#results').html(data);// Adding Elements to DOM
        }
      });
    })
  </script>
</body>