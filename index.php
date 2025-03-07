<?php

$mpg = 'Dashboard';
$spg = 'dsh';
$tit = 'Dashboard';

// Assuming you're using PDO to fetch data

?>

<?php include 'partials/_header.php'; ?>
<title><?php echo $tit; ?></title>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->
      <?php include 'partials/_sidebar.php'; ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->
        <?php include 'partials/_navbar.php'; ?>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper" style="overflow-x:hidden; padding: 15px;">
          <div class="row">
            <div class="col-12 text-center">
              <div class="barcode-container">
                <svg id="barcode"></svg>
              </div>
            </div>
          </div>

          <div class="row mt-3">
            <div class="col-md-8">
              <div class="card">
                <h5 class="card-header">Recent Points Earned</h5>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-hover" id="transaction_history">
                      <thead>
                        <tr>
                          <th>Transaction_ID</th>
                          <th>Points Earned</th>
                          <th>Bottle Quantity</th>
                          <th>Timestamp</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-4 text-center">
              <div class="ttl_points">
                <button class="btn-points">
                  <div class="btn-points-icon"></div>
                  <div>
                    <h1><?php echo $_SESSION['user']['points']; ?></h1>
                    <p class="btn-points-text">PTS</p>
                  </div>
                </button>
              </div>
              <div class="fw-semibold pt-3" style="font-size:24px; color:#555;">Total Points</div>
            </div>
          </div>
        </div>
        <!-- / Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <?php include 'partials/_footerjs.php'; ?>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const barcodeValue = <?php echo  $_SESSION['user']['user_id'] ?>;

      if (barcodeValue) {
        JsBarcode("#barcode", barcodeValue, {
          format: "CODE128",
          lineColor: "black",
          width: 2,
          height: 100,
          displayValue: true
        });
      } else {
        alert("No student ID found.");
      }
    });

    $(document).ready(function() {
      $('#transaction_history').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
          "url": "server/reward_table.inc.php",
          "type": "GET"
        },
        "columns": [
          { "data": "id" },
          { "data": "pts_earned" },
          { "data": "bottle_quantity" },
          { "data": "timestamp" }
        ],
        "pageLength": 3,
        "order": [[3, "desc"]],
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "drawCallback": function(settings) {
          const api = this.api();
          const rowsDisplayed = api.rows({ page: 'current' }).count();
          const rowsNeeded = api.page.len() - rowsDisplayed;

          if (rowsNeeded > 0) {
            for (let i = 0; i < rowsNeeded; i++) {
              $('#transaction_history tbody').append(
                `<tr class="placeholder-row"><td colspan="6">&nbsp;</td></tr>`
              );
            }
          }
        }
      });
    });
  </script>

  <style>
    @media (max-width: 768px) {
      .btn-points h1 {
        font-size: 24px;
      }
      .btn-points-text {
        font-size: 18px;
      }
      .table-responsive {
        overflow-x: auto;
      }
    }
  </style>

</body>
</html>
