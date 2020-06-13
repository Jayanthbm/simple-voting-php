<?php
include "head.php";
?><!-- Include head.php -->

<body>
  <div class="container">
    <?php include "navbar.php"; ?><!-- Include navbar.php -->

    <?php if ($_SESSION) { //Checking session if session show user name
      echo "Welcome <b>" . $_SESSION['name'] . "</b>"; //Dispalying UserName from session
      echo "<br/>"; //Line break
      echo "You already Logged In <a href='index.php'>Go to Home</a>"; //Link to HomePage
    } else { ?> 
    <!-- If No Session exits allow registration -->
      <ul class="list-group">
        <center>
          <li class="list-group-item list-group-item-info">
            <h2>Register</h2>
          </li>
        </center>
      </ul>
      <br />
      <div id="results"></div><!--  Used for display Server results -->
      <form action="reg_action.php" method="post" id="regform">
        <div class="form-group">
        <!--  Label for firstname -->
          <label for="firstname"> Firstname :</label>
          <!--  Input for firstname -->
          <input type="text" class="form-control" placeholder="Enter Firstname" id="firstname" name="firstname" required>
        </div>
        <div class="form-group">
        <!--  Label for lastname -->
          <label for="lastname"> Lastname :</label>
          <!--  Input for lastname -->
          <input type="text" class="form-control" placeholder="Enter Lastname" id="lastname" name="lastname" required>
        </div>
        <div class="form-group">
        <!--  Label for username -->
          <label for="username"> Username :</label>
          <!--  Input for firstname -->
          <input type="text" class="form-control" placeholder="Enter Username" id="username" name="username" required>
        </div>
        <div class="form-group">
        <!--  Label for passowrd -->
          <label for="password">Password:</label>
          <!--  Input for passowrd -->
          <input type="password" class="form-control" placeholder="Enter Password" id="password" name="password" minlength="5" required>
        </div>
        <div class="form-group">
        <!--  Label for Age -->
          <label for="age"> Age :</label>
          <!-- Dropdown to select Age -->
            <select class="form-control" id="age" name="age" required>
              <option value="18-25">18-25</option>
              <option value="25-50">25-50</option>
              <option value="Above 50">Above 50</option>
            </select>
        </div>
        <div class="form-group">
        <!--  Label for Gneder -->
          <label for="gender">Gender:</label>
          <!-- Dropdown to select Gender -->
          <select class="form-control" id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>
        <div class="form-group">
          <div class="g-recaptcha" data-sitekey="6LeD3hEUAAAAAKne6ua3iVmspK3AdilgB6dcjST0"></div>
        </div>
        <!-- Submit Button -->
        <input type="submit" name="submit" class="btn btn-primary" value="Next" />
      </form>
    <?php  } ?>
  </div>
  <!---Start Footer -->

  <?php include "footer.php"; ?> <!--  Include footer.php-->

  <!---End Footer -->
  <script type="text/javascript">
    $('#regform').submit(function(e) {//Function will trigger on form submit
      $('#results').html('');// Remove Elements to DOM
      e.preventDefault();// Prevents Default action (i.e Prevents Opening reg_action.php page)
      var form = $(this);
      var url = form.attr('action');// get the url from form
      //ajax request
      $.ajax({
        type: "POST", // type of request 
        url: url, //url where data to be posted(i.e. reg_action.php)
        data: form.serialize(),// creates a URL encoded text string by serializing form values.
        success: function(data) {
          if (data === 'Successfully Registered') {
            location.href = 'login.php';
          }
          $('#results').html(data); // Adding Elements to DOM
          $('#regform')[0].reset();// reset the form
        }
      });
    })
  </script>
</body>