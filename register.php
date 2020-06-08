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
            <h2>Register</h2>
          </li>
        </center>
      </ul>
      <br />
      <div id="results"></div>
      <form action="reg_action.php" method="post" id="regform">
        <div class="form-group">
          <label for="firstname"> Firstname :</label>
          <input type="text" class="form-control" placeholder="Enter Firstname" id="firstname" name="firstname" required>
        </div>
        <div class="form-group">
          <label for="lastname"> Lastname :</label>
          <input type="text" class="form-control" placeholder="Enter Lastname" id="lastname" name="lastname" required>
        </div>
        <div class="form-group">
          <label for="username"> Username :</label>
          <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" minlength="5" required>
        </div>
        <div class="form-group">
          <label for="age">Age:</label>
          <select class="form-control" id="age" name="age" required>
            <?php
            for ($i = 18; $i < 50; $i++) {
              echo "<option value='" . $i . "'>" . $i . "</option>";
            }
            ?>
          </select>
        </div>
        <div class="form-group">
          <label for="gender">Gender:</label>
          <select class="form-control" id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div class="form-group">
          <label for="country">Country:</label>
          <input type="text" class="form-control" placeholder="Enter country" id="country" name="country" required>
        </div>
        <div class="form-group">
          <div class="g-recaptcha" data-sitekey="6LeD3hEUAAAAAKne6ua3iVmspK3AdilgB6dcjST0"></div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary" value="Next" />
      </form>
    <?php  } ?>
  </div>
  <!---Start Footer -->

  <?php include "footer.php"; ?>

  <!---End Footer -->
  <script type="text/javascript">
    $('#regform').submit(function(e) {
      $('#results').html('');
      e.preventDefault();
      var form = $(this);
      var url = form.attr('action');
      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(data) {
          if (data === 'Successfully Registered') {
            location.href = 'login.php';
          }
          $('#results').html(data);
          $('#regform')[0].reset();
        }
      });
    })
  </script>
</body>