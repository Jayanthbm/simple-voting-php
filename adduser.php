<?php
include "head.php";
?>

<body>
  <div class="container">
    <?php include "navbar.php"; ?>
    <!-- Start Content For Admin -->
    <?php if ($_SESSION) {
      if ($_SESSION['rank'] == 'admin') {
    ?>
        <ul class="list-group">
          <center>
            <li class="list-group-item list-group-item-info">
              <h2>Add User</h2>
            </li>
          </center>
        </ul>
        <br />
        <div id="results"></div>
        <form action="reg_action.php" method="post" id="adduser">
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
            <input type="number" class="form-control" placeholder="Enter Age" id="age" name="age" required>
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
            <label for="rank">Rank:</label>
            <select class="form-control" id="rank" name="rank" required>
              <option value="voter">Voter</option>
              <option value="admin">Admin</option>
            </select>
          </div>
          <input type="submit" name="submit" class="btn btn-primary" value="Add User" />
        </form>
    <?php }
    } ?>
  </div>
  <!---Start Footer -->

  <?php include "footer.php"; ?>

  <!---End Footer -->
  <script type="text/javascript">
    $('#adduser').submit(function(e) {
      $('#results').html('');// Remove Elements to DOM
      e.preventDefault();
      var form = $(this);
      var url = form.attr('action');
      $.ajax({
        type: "POST",
        url: url,
        data: form.serialize(),
        success: function(data) {
          if (data === 'Successfully Registered') {
            data = `<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>User Added Successfully</div>"`
          }
          $('#results').html(data);
          $('#regform')[0].reset(); // Adding Elements to DOM
        }
      });
    })
  </script>
</body>