<?php
include "head.php";
?>

<body>
  <div class="container">
    <?php include "navbar.php"; ?>
    <?php if ($_SESSION) {
      if ($_SESSION['rank'] == 'voter') {
        include "connection.php";
        $name = $_SESSION['name'];
        $uq = "SELECT * from users WHERE username = '$name'";
        $uqr = mysqli_query($conn, $uq);
        if (mysqli_num_rows($uqr) > 0) {
          while ($row = mysqli_fetch_array($uqr)) {
            $firstname = $row['firstName'];
            $lastname = $row['lastName'];
            $age = $row['ageRange'];
            $gender = $row['gender'];
          }
        }
    ?>
        <ul class="list-group">
          <center>
            <li class="list-group-item list-group-item-info">
              <h2> <?php echo $name; ?>'s Profile</h2>
            </li>
          </center>
        </ul>
        <br />
        <?php
        $vq = "SELECT voteTo from votings WHERE voterName = '$name'";
        $vqr = mysqli_query($conn, $vq);
        if (mysqli_num_rows($vqr) == 1) {
          $row = mysqli_fetch_assoc($vqr); ?>
          <li class="list-group-item list-group-item-success">
            <h5>You have voted for: <b><?php echo $row['voteTo']; ?></b></h5>
          </li>
        <?php } else { ?>
          <li class="list-group-item list-group-item-danger">
            <h5>You have not voted yet. Please submit your vote!</h5>
          </li>
        <?php }
        ?>
        <br />
        <li class="list-group-item list-group-item-primary">
          <h3>Edit Profile</h3>
        </li>
        <br />
        <div id="results"></div>
        <form action="update_action.php" method="post" id="updateuser">
          <div class="form-group">
            <label for="firstname"> Firstname :</label>
            <input type="text" class="form-control" placeholder="Enter firstname" id="firstname" name="firstname" value="<?php echo $firstname; ?>" required>
          </div>
          <div class="form-group">
            <label for="lastname"> Lastname :</label>
            <input type="text" class="form-control" placeholder="Enter lastname" id="lastname" name="lastname" value="<?php echo $lastname; ?>" required>
          </div>
          <div class=" form-group">
            <label for="age"> Age :</label>
            <select class="form-control" id="age" name="age" required>
              <option value="18-25" <?php if ($age == '18-25') {
                                      echo "selected";
                                    } ?>>18-25</option>
              <option value="25-50" <?php if ($age == '25-50') {
                                      echo "selected";
                                    } ?>>25-50</option>
              <option value="Above 50" <?php if ($age == 'Above 50') {
                                      echo "selected";
                                  } ?>>Above 50</option>
            </select>
          </div>
          <div class=" form-group">
            <label for="gender">Gender:</label>
            <select class="form-control" id="gender" name="gender" required>
              <option value="male" <?php if ($gender == 'male') {
                                      echo "selected";
                                    } ?>>Male</option>
              <option value="male" <?php if ($gender == 'female') {
                                      echo "selected";
                                    } ?>>Female</option>
            </select>
          </div>
          <input type="submit" class="btn btn-success" name="update" value="Update">
        </form>
    <?php }
    } else {
      echo "You don't have Access";
    } ?>
    <!---Start Footer -->

    <?php include "footer.php"; ?>

    <!---End Footer -->
    <script type="text/javascript">
      $('#updateuser').submit(function(e) {
        $('#results').html('');// Remove Elements to DOM
        e.preventDefault();
        var form = $(this);
        var url = form.attr('action');
        $.ajax({
          type: "POST",
          url: url,
          data: form.serialize(),
          success: function(data) {
            $('#results').html(data);// Adding Elements to DOM
          }
        });
      })
    </script>
</body>