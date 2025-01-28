<?php

$mpg = 'Rewards';
$spg = 'rs';
$tit = 'Rewards';

include 'partials/_header.php' ?>

<title> <?php echo $tit; ?> </title>

<style>
  /* Optional: Style the containers */
  .container-left, .container-right {
    padding: 60px;
    border: 1px solid #ddd;
    border-radius: 8px;
    box-sizing: border-box;
    color: white;
    margin-top:20px;
    margin-left:70px;
  }

  /* Layout for Bottom Container */
  .container-bottom {
    width: 100%;
    padding: 10px;
    border-radius: 8px;
      margin-left:70px;
  }

  /* Change Color of All H2 Tags */
  h2 {
    color: rgb(0, 0, 0); /* This is the color you want for your h2 text */
    font-size: 1.5rem;
  }

  h4 {
    color: rgb(0, 0, 0); /* This is the color you want for your h4 text */
    font-size: .9rem;
  }
</style>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Sidebar Include -->
      <?php include 'partials/_sidebar.php' ?>

      <!-- Layout Page -->
      <div class="layout-page">
        <!-- Navbar Include -->
        <?php include 'partials/_navbar.php' ?>

        <!-- Row to hold the containers side by side -->
        <div class="row">
          <!-- Left Container (Current Rate) -->
          <div class="col-12 col-md-5 container-left">
            <h3>Current Rate</h3>
            <h4><p>The current rate is Per 1Kg:</p><h4>
            <h2>₱7.8</h2> <!-- Display current rate in PHP -->
          </div>

          <!-- Right Container (Update Rate Form) -->
          <div class="col-12 col-md-5 container-right">
            <h3>Update Rate</h3>
            <form method="post" action="update_rate.php">
              <h4><label for="rate">Enter Rate (in pesos) to Update:</label><br><h4>
              <input type="number" id="rate" name="rate" min="0.01" step="0.01" placeholder="Enter rate per bottle" required><br><br>
              <input type="submit" value="Update Rate" style="padding: 8px 16px; background-color: #2563eb; color: white; border: none; border-radius: 5px;">
            </form>
          </div>
        </div> <!-- End of Row -->

        <!-- Bottom Container: Rate Update History -->
        <div class="container-bottom">
          <h3>Rate Update History</h3>
          <table style="width: 100%; border-collapse: collapse;">
            <thead>
              <tr>
                <th>Date</th>
                <th>Updated Rate (₱)</th>
                <th>Reason</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>2025-01-25</td>
                <td>₱7.8</td>
                <td>Updated due to new policy</td>
              </tr>
              <tr>
                <td>2025-01-24</td>
                <td>₱7.5</td>
                <td>Bonus for high volume</td>
              </tr>
              <tr>
                <td>2025-01-23</td>
                <td>₱7.2</td>
                <td>Initial rate set</td>
              </tr>
            </tbody>
          </table>
        </div>

      </div> <!-- End of Layout Page -->

      <!-- Overlay for Layout Menu Toggle -->
      <div class="layout-overlay layout-menu-toggle"></div>

    </div> <!-- End of Layout Container -->

  </div> <!-- End of Layout Wrapper -->

  <!-- Footer JS Include -->
  <?php include 'partials/_footerjs.php' ?>

</body>

</html>
