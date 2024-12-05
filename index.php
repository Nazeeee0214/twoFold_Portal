<?php

$mpg = 'Dashboard';
$spg = 'dsh';
$tit = 'Dashboard';


// Assuming you're using PDO to fetch data

?>



<?php include 'partials/_header.php'

?>
<title> <?php echo $tit; ?> </title>


<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <!-- Menu -->

      <?php include 'partials/_sidebar.php'
      ?>
      <!-- / Menu -->

      <!-- Layout container -->
      <div class="layout-page">
        <!-- Navbar -->

        <?php include 'partials/_navbar.php';
        ?>
        <!-- / Navbar -->

        <!-- Content wrapper -->
        <div class="content-wrapper" style="overflow-x:hidden;">
          <div class="row">
            <div class="col-12">
              <div class="barcode-container">
                <svg id="barcode"></svg>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <div class="row-container">
                <div class="card">
                  <div class="row row-bordered g-0">
                    <div class="col-md-8">
                      <h5 class="card-header m-0 me-2 pb-3">Recent Points Earned</h5>
                      <div class="card">
                        <div class="rewardtb-container" style="padding: 0px 12px 0px 12px ; ">
                          <div class="table-responsive text-nowrap">
                            <table class="table table-hover" id="transaction_history">
                              <thead style="border-top: none;  ">
                                <tr>
                                  <th>Transaction_ID</th>
                                  <th>Points Earned</th>
                                  <th>Bottle Quantity</th>
                                  <th>Timestamp</th>
                                </tr>
                              </thead>
                              <tbody class="table-border-bottom-0">
                              </tbody>
                            </table>

                          </div>
                        </div>

                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="ttl_points">
                        <button class="btn-points">
                          <div class="btn-points-content">
                            <div class="btn-points-icon">
                              <h1><?php echo  $_SESSION['user']['points'] ?></h1>
                            </div>
                            <p class="btn-points-text">PTS</p>
                          </div>
                        </button>
                      </div>
                      <div class="text-center fw-semibold pt-3 mb-2" style="font-size:30px; color:#555555">Total Points</div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->



  <!-- Core JS -->
  <?php include 'partials/_footerjs.php'
  ?>


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
        "columns": [{
            "data": "id"
          },
          {
            "data": "pts_earned"
          },
          {
            "data": "bottle_quantity"
          },
          {
            "data": "timestamp"
          }
        ],
        "pageLength": 3, // Set max entries per page to 3
        "order": [
          [3, "desc"]
        ], // Sort by the 4th column (timestamp) in descending order
        "lengthChange": false,
        "searching": false,
        "ordering": false,

        "drawCallback": function(settings) {
          // Ensure fixed number of rows by adding placeholder rows
          const api = this.api();
          const rowsDisplayed = api.rows({
            page: 'current'
          }).count();
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


</body>

</html>