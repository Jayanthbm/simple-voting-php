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
                <th>Age</th>
                <th>Rank</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php
              while ($row = mysqli_fetch_array($uqr)) { //Loop
                $id = $row['id'];
                $firstname = $row['firstname'];
                $lastname = $row['lastname'];
                $username = $row['username'];
                $age = $row['age'];
                $rank = $row['role'];
                $status = $row['status'];
              ?> <tr>
                  <td><?php echo $firstname; ?></td>
                  <td><?php echo $lastname; ?></td>
                  <td><?php echo $username; ?></td>
                  <td><?php echo $age; ?></td>
                  <td><?php echo $rank; ?></td>
                  <td><?php if ($status == 1) {
                        echo "Active";
                      } else {
                        echo "Not Actibe";
                      } ?></td>
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
</body>