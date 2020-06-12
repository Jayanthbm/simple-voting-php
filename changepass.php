<?php
include "head.php"; // include head.php
?>

<body>
  <div class="container">
    <?php include "navbar.php"; ?> <!-- Include navbar.php -->
    <?php if ($_SESSION) {  ?><!-- check user logged in or not -->
      <ul class="list-group">
        <center>
          <li class="list-group-item list-group-item-info">
            <h2>Change Password</h2>
          </li>
        </center>
      </ul>
      <br />
      <div id="results"></div>
      <form action="change_pass_action.php" method="post" id="updatepassword">
        <div class="form-group">
          <label for="cpassword">Current Password :</label>
          <input type="password" class="form-control" placeholder="Enter Current Password" id="cpassword" name="cpassword" required minlength="5">
        </div>
        <div class="form-group">
          <label for="npassword"> New Password:</label>
          <input type="password" class="form-control" placeholder="Enter New Password" id="npassword" name="npassword" required minlength="5">
        </div>
        <div class="form-group">
          <label for="cnpassword"> Confirm New Password:</label>
          <input type="password" class="form-control" placeholder="Confirm New Password" id="cnpassword" name="cnpassword" required minlength="5">
        </div>
        <input type="submit" name="cpass" class="btn btn-primary" value="UPDATE">
      </form>
    <?php
    } else {
      echo "You don't have Access";
    } ?>
    <!---Start Footer -->

    <?php include "footer.php"; ?><!-- Include foooter .php -->

    <!---End Footer -->
    <script type="text/javascript">
      $('#updatepassword').submit(function(e) { //Function will trigger on form submit
        $('#results').html('');// Remove Elements from  DOM
        e.preventDefault();  // Prevents Default action (i.e Prevents Opening reg_action.php page)
        var form = $(this);
        var url = form.attr('action'); // get the url from form
      //ajax request
        $.ajax({
          type: "POST",// type of request 
          url: url,
          data: form.serialize(), // creates a URL encoded text string by serializing form values.
          success: function(data) {
            if (data === 'Successfully Registered') {
              location.href = 'login.php'; // redirect user to login.php
            }
            $('#results').html(data); // Adding Elements to DOM
            $('#updatepassword')[0].reset(); // reset the form
          }
        });
      })
    </script>
</body>