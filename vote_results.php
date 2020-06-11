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
        $vrq = "SELECT voteTo,count(voteTo) as count FROM votings GROUP BY voteTo";
        $vrr = mysqli_query($conn, $vrq);
      
        //Results By age
        $vraq = "SELECT voteTo,voterAgeRange,count(voteTo) as count FROM votings GROUP By voteTo,voterAgeRange";
        $vraqr = mysqli_query($conn, $vraq);

        //Results by gender

        $vrgq = "SELECT voteTo,voterGender,count(voteTo) as count FROM votings GROUP By voteTo,voterGender";
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
                      $vote_to = $row['voteTo'];
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
                      <th>Age Range</th>
                      <th>Count</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($vraqr)) {
                      $vote_to = $row['voteTo'];
                      $voter_age = $row['voterAgeRange'];
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
                      $vote_to = $row['voteTo'];
                      $vote_gender = $row['voterGender'];
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