<?php
$mpg = 'Transactions';
$spg = 'th';
$tit = 'Transactions';
?>

<?php include 'partials/_header.php'; ?>

<title> <?php echo $tit; ?> </title>

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

        <!-- Content Wrapper -->
        <div class="content-wrapper">
          <div class="container mt-4">
            <h3>Transaction History</h3>
            
            <!-- Transaction History Table -->
            <div class="table-responsive">
              <table class="table table-bordered">
                <thead class="thead-dark">
                  <tr>
                    <th>No. of Transactions</th>
                    <th>Current Rewards Points</th>
                    <th>Added Points</th>
                    <th>Redeemed Points</th>
                    <th>Claimed Item</th>
                    <th>Total Rewards Points</th>
                  </tr>
                </thead>
                <tbody id="transactionTableBody">
                  <?php
                    // Initial 10 rows for demonstration
                    for ($i = 1; $i <= 10; $i++) {
                      echo "<tr>
                              <td>{$i}</td>
                              <td>100</td>
                              <td>20</td>
                              <td>5</td>
                              <td>Gift Card</td>
                              <td>115</td>
                            </tr>";
                    }
                  ?>
                </tbody>
              </table>
            </div>

            <!-- Pagination Buttons -->
            <div class="text-center my-3">
              <button id="prevPageBtn" class="btn btn-secondary" disabled>Previous</button>
              <button id="nextPageBtn" class="btn btn-primary">Next</button>
            </div>
          </div>
        </div>
        <!-- Footer JS Include -->
        <?php include 'partials/_footerjs.php'; ?>
      </div>
    </div>
  </div>

  <script>
    let currentPage = 1;
    const rowsPerPage = 10;

    document.getElementById('nextPageBtn').addEventListener('click', function() {
      currentPage++;
      updateTable(currentPage);
    });

    document.getElementById('prevPageBtn').addEventListener('click', function() {
      if (currentPage > 1) {
        currentPage--;
        updateTable(currentPage);
      }
    });

    function updateTable(page) {
      const tableBody = document.getElementById('transactionTableBody');
      tableBody.innerHTML = ''; // Clear existing rows

      // Dummy data example for the next or previous 10 rows
      for (let i = 1; i <= rowsPerPage; i++) {
        const rowNumber = (page - 1) * rowsPerPage + i;
        const row = `<tr>
                      <td>${rowNumber}</td>
                      <td>100</td>
                      <td>20</td>
                      <td>5</td>
                      <td>Gift Card</td>
                      <td>115</td>
                    </tr>`;
        tableBody.innerHTML += row;
      }

      // Update button states
      document.getElementById('prevPageBtn').disabled = page === 1;
      document.getElementById('nextPageBtn').disabled  = false; // Adjust logic if needed based on data availability
    }
  </script>
</body>
</html>