<?php
include "head.php";
?>

<body>
  <div class="container">
    <?php include "navbar.php"; ?>
    <?php if ($_SESSION) {
      if ($_SESSION['rank'] == 'admin') {
        include "connection.php";
    ?>
        <ul class="list-group">
          <center>
            <li class="list-group-item list-group-item-info">List Of Users</li>
          </center>
        </ul>
        <?php
        $uq = "SELECT * FROM users";
        $uqr = mysqli_query($conn, $uq);
        if (mysqli_num_rows($uqr) < 1) { //Condtional Statement
          echo '<font color="red">No Users found</font>';
        } else { ?>
          <div id="results"></div>
          <table class="table table-striped table-hover">
            <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>User Name</th>
                <th>Age Range</th>
                <th>Gender</th>
                <th>Rank</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_array($uqr)) { //Loop
                $id = $row['UserId'];
                $firstname = $row['firstName'];
                $lastname = $row['lastName'];
                $username = $row['userName'];
                $age = $row['ageRange'];
                $gender = $row['gender'];
                $rank = $row['role'];
                $status = $row['status'];
              ?> <tr>
                  <td><?php echo $firstname; ?></td>
                  <td><?php echo $lastname; ?></td>
                  <td><?php echo $username; ?></td>
                  <td><?php echo $age; ?></td>
                  <td><?php echo $gender; ?></td>
                  <td><?php if($rank == 1){echo "Voter";} if($rank == 2){echo "Admin";}?></td>
                  <td><?php if ($status == 1) {
                        echo "Active";
                      } else {
                        echo "Not Active";
                      } ?></td>
                  <td><button class="btn btn-danger" onclick="deleteUser('<?php echo $id;?>')">Delete</button></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        <?php }
        ?>
    <?php }
    } else {
      echo "You don't have access";
    } ?>
  </div>
  <!---Start Footer -->

  <?php include "footer.php"; ?>

  <!---End Footer -->
  <script>
    function deleteUser(id){
      let url = `delete_action.php?id=${id}`;
      $.ajax({
        type: "GET",
        url: url,
        success: function(data) {
          if(data ==="<div class='alert alert-warning alert-dismissible'><button type='button' class='close' data-dismiss='alert'>&times;</button>You Can't delete Yourself</div>"){
            $('#results').html(data);  // Adding Elements to DOM
          }else{
            location.reload();
          }
        }
      });
    }
  </script>
</body>