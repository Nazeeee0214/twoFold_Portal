<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'smartbin_db'); // Change credentials as needed

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize rate variable
$rate = 0;

// Query to retrieve the current rate from rewards_sys table
$query = "SELECT rate FROM rewards_sys WHERE id = 1";  // Assuming you're trying to get the rate for a specific entry
$result = $conn->query($query);

// Check if the query was successful and fetch the result
if ($result) {
    $row = $result->fetch_assoc();
    $rate = $row['rate'];  // Store the rate value
} else {
    echo "Error: " . $conn->error;
}

// If the form is submitted, update the rate in the database
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_rate = $_POST['rate'];  // Get the new rate from the form
    
    // Update the rate in the rewards_sys table
    $update_query = "UPDATE rewards_sys SET rate = ? WHERE id = 1";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("d", $new_rate);  // Bind the new rate to the query

    if ($stmt->execute()) {
        // Insert rate update history into the 'rate_updated_history' table without specifying 'id' (it will auto-increment)
        $reason = "Rate updated manually";  // Customize the reason as needed
        $insert_query = "INSERT INTO rate_updated_history (updated_rate, reason) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ds", $new_rate, $reason);
        $stmt->execute();

        // Update successful, fetch the new rate
        $rate = $new_rate;
        echo "<script>alert('Rate updated successfully!');</script>";
    } else {
        echo "Error updating rate: " . $conn->error;
    }

    $stmt->close(); // Close the prepared statement
}

// Close the database connection
$conn->close();

// Variables for page
$mpg = 'Rewards';
$spg = 'rs';
$tit = 'Rewards';

include 'partials/_header.php';
?>

<title><?php echo $tit; ?></title>

<style>
  /* General Styling */
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
  }

  /* Left and Right Containers */
  .container-left, .container-right {
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    background-color: #fff;
    box-sizing: border-box;
    color: #333;
    margin-top: 20px;
    width: 100%; /* Default to full width */
    text-align: center;
  }

  /* Bottom Container Styling (Rate Update History) */
  .container-bottom {
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    margin-top: 20px;
    border: 1px solid #ddd;
    width: 90%;
    max-width: 900px;
    margin-left: auto;
    margin-right: auto;
    overflow-x: auto; /* Enable scrolling for small screens */
  }

  /* Table Styling */
  table {
    width: 100%;
    border-collapse: collapse;
  }

  th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #f4f4f4;
  }

  /* Form Styling */
  input[type="number"], input[type="submit"] {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ddd;
    margin-bottom: 15px;
  }

  input[type="submit"] {
    background-color: #800000;
    color: white;
    cursor: pointer;
  }

  input[type="submit"]:hover {
    background-color: rgb(54, 14, 14);
  }

  /* Responsive Layout */
  .row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 10px;
  }

  /* Desktop: Side by Side */
  @media (min-width: 768px) {
    .container-left, .container-right {
      width: 40%;
    }
  }
</style>


<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Sidebar Include -->
      <?php include 'partials/_sidebar.php'; ?>

      <!-- Layout Page -->
      <div class="layout-page">
        <!-- Navbar Include -->
        <?php include 'partials/_navbar.php'; ?>

        <!-- Row to hold the containers side by side -->
        <div class="row">
          <!-- Left Container (Current Rate) -->
          <div class="container-left">
            <h3>Current Rate</h3>
            <h4>The current rate is ₱<?php echo number_format($rate, 2); ?> per 1Kg:</h4>
            <h2>₱<?php echo number_format($rate, 2); ?></h2> <!-- Display the current rate from the database -->
          </div>

          <!-- Right Container (Update Rate Form) -->
          <div class="container-right">
            <h3>Update Rate</h3>
            <form method="post" action="">
              <h4><label for="rate">Enter Rate (in pesos) to Update:</label></h4>
              <input type="number" id="rate" name="rate" min="0.01" step="0.01" placeholder="Enter rate per bottle" value="<?php echo $rate; ?>" required><br>
              <input type="submit" value="Update Rate">
            </form>
          </div>
        </div> <!-- End of Row -->

        <!-- Bottom Container: Rate Update History -->
        <div class="container-bottom">
          <h3>Rate Update History</h3>
          <table>
            <thead>
              <tr>
                <th>Date</th>
                <th>Updated Rate (₱)</th>
                <th>Reason</th>
              </tr>
            </thead>
            <tbody>
              <?php
              // Fetch the update history from rate_updated_history
              $conn = new mysqli('localhost', 'root', '', 'smartbin_db');
              $history_query = "SELECT * FROM rate_updated_history ORDER BY update_date DESC";
              $history_result = $conn->query($history_query);

              if ($history_result->num_rows > 0) {
                while ($history_row = $history_result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $history_row['update_date'] . "</td>";
                  echo "<td>₱" . number_format($history_row['updated_rate'], 2) . "</td>";
                  echo "<td>" . $history_row['reason'] . "</td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='3'>No update history found.</td></tr>";
              }

              $conn->close();
              ?>
            </tbody>
          </table>
        </div>

      </div> <!-- End of Layout Page -->

      <!-- Overlay for Layout Menu Toggle -->
      <div class="layout-overlay layout-menu-toggle"></div>

    </div> <!-- End of Layout Container -->

  </div> <!-- End of Layout Wrapper -->

  <!-- Footer JS Include -->
  <?php include 'partials/_footerjs.php'; ?>

</body>

</html>
