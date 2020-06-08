<?php
include "head.php";
?>

<body>
  <div class="container">
    <?php include "navbar.php"; ?>
    <!-- Start Content For Admin -->
    <?php if ($_SESSION) {
      if ($_SESSION['rank'] == 'admin') {
        include "connection.php";
        //Total Results
        $vrq = "SELECT vote_to,count(vote_to) as count FROM votings GROUP BY vote_to";
        $vrr = mysqli_query($conn, $vrq);
        //Results by country
        $vrcq = "SELECT vote_to,voter_country,count(vote_to) as count FROM votings GROUP By vote_to,voter_country";
        $vrcqr = mysqli_query($conn, $vrcq);

        //Results By age
        $vraq = "SELECT vote_to,voter_age,count(vote_to) as count FROM votings GROUP By vote_to,voter_age";
        $vraqr = mysqli_query($conn, $vraq);

        //Results by gender

        $vrgq = "SELECT vote_to,voter_gender,count(vote_to) as count FROM votings GROUP By vote_to,voter_gender";
        $vrgqr = mysqli_query($conn, $vrgq);
    ?>
        <ul class="list-group">
          <center>
            <li class="list-group-item list-group-item-info">
              <h2>Voting Results</h2>
            </li>
          </center>
        </ul>
        <br />
        <div class="row">
          <div class="col">
            <ul class="list-group">
              <center>
                <li class="list-group-item list-group-item-warning">
                  <h4>Overall Results</h4>
                </li>
              </center>
            </ul>
            <?php
            if ($vrr) {
              if (mysqli_num_rows($vrr) > 0) { ?>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Vote to</th>
                      <th>Count</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($vrr)) {
                      $vote_to = $row['vote_to'];
                      $count = $row['count'];
                    ?>
                      <tr>
                        <td><?php echo $vote_to; ?></td>
                        <td><?php echo $count; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
            <?php }
            } ?>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <ul class="list-group">
              <center>
                <li class="list-group-item list-group-item-info">
                  <h2>Voting Results By Country</h2>
                </li>
              </center>
            </ul>
            <?php
            if ($vrcqr) {
              if (mysqli_num_rows($vrcqr) > 0) { ?>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Vote to</th>
                      <th>Country</th>
                      <th>Count</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($vrcqr)) {
                      $vote_to = $row['vote_to'];
                      $voter_country = $row['voter_country'];
                      $count = $row['count'];
                    ?>
                      <tr>
                        <td><?php echo $vote_to; ?></td>
                        <td><?php echo $voter_country; ?></td>
                        <td><?php echo $count; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
            <?php }
            } ?>
          </div>
          <div class="col">
            <ul class="list-group">
              <center>
                <li class="list-group-item list-group-item-info">
                  <h2>Voting Results By Age</h2>
                </li>
              </center>
            </ul>
            <?php
            if ($vraqr) {
              if (mysqli_num_rows($vraqr) > 0) { ?>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Vote to</th>
                      <th>Age</th>
                      <th>Count</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($vraqr)) {
                      $vote_to = $row['vote_to'];
                      $voter_age = $row['voter_age'];
                      $count = $row['count'];
                    ?>
                      <tr>
                        <td><?php echo $vote_to; ?></td>
                        <td><?php echo $voter_age; ?></td>
                        <td><?php echo $count; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
            <?php }
            } ?>
          </div>
          <div class="col">
            <ul class="list-group">
              <center>
                <li class="list-group-item list-group-item-info">
                  <h2>Voting Results By Gender</h2>
                </li>
              </center>
            </ul>
            <?php
            if ($vrgqr) {
              if (mysqli_num_rows($vrgqr) > 0) { ?>
                <table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Vote to</th>
                      <th>Gender</th>
                      <th>Count</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($vrgqr)) {
                      $vote_to = $row['vote_to'];
                      $vote_gender = $row['voter_gender'];
                      $count = $row['count'];
                    ?>
                      <tr>
                        <td><?php echo $vote_to; ?></td>
                        <td><?php echo $vote_gender; ?></td>
                        <td><?php echo $count; ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
            <?php }
            } ?>
          </div>
        </div>
    <?php }
    } ?>
  </div>
  <!---Start Footer -->

  <?php include "footer.php"; ?>

  <!---End Footer -->
</body>