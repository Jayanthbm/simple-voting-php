<?php
include "head.php"; //include head.php file
?>

<body>
  <div class="container">
    <?php include "navbar.php"; ?> <!-- Include navbar.php -->
    <!-- Start Content For Admin -->
    <?php if ($_SESSION) {
      if ($_SESSION['rank'] == 'admin') { // Check wheather the user is admin or not if admin show content 
    ?>
        <ul class="list-group">
          <center>
            <li class="list-group-item list-group-item-info">
              <h2>Add User</h2>
            </li>
          </center>
        </ul>
        <br />
        <div id="results"></div> <!--  Used for display Server results -->
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
            <select class="form-control" id="age" name="age" required>
              <option value="18-25">18-25</option>
              <option value="25-50">25-50</option>
              <option value="Above 50">Above 50</option>
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
            <label for="rank">Rank:</label>
            <select class="form-control" id="rank" name="rank" required>
              <option value="1">Voter</option>
              <option value="2">Admin</option>
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
    $('#adduser').submit(function(e) { //Function will trigger on form submit
      $('#results').html('');// Remove Elements from DOM
      e.preventDefault(); // Prevents Default action (i.e Prevents Opening reg_action.php page)
      var form = $(this); 
      var url = form.attr('action'); // get the url from form
      //ajax request
      $.ajax({
        type: "POST", // type of request 
        url: url,
        data: form.serialize(),  // creates a URL encoded text string by serializing form values.
        success: function(data) { 
          if (data === 'Successfully Registered') {
            data = `<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>User Added Successfully</div>`
          }
          $('#results').html(data); // Adding Elements to DOM
          $('#adduser')[0].reset(); // reset the form
        }
      });
    })
  </script>
</body>