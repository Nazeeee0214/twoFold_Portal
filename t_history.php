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
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card ps-5 pe-5 pt-5">
              <h3>Transaction History</h3>
              <div class="table-responsive text-nowrap">
                <table class="table table-hover" id="transaction_history">
                  <thead>
                    <tr>
                      <th>Transaction_ID</th>
                      <th>Item</th>
                      <th>Quantity</th>
                      <th>Points Deducted</th>
                      <th>Service Availed</th>
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
      </div>
    </div>
  </div>
  <!-- Footer JS Include -->
  <?php include 'partials/_footerjs.php'; ?>
  <script>
    $(document).ready(function() {
      const table = $('#transaction_history').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
          "url": "server/transaction_table.inc.php",
          "type": "GET",
          "dataSrc": function(json) {
            // Filter data to exclude rows with zero/null values
            const filteredData = json.data.filter(row =>
              row.pts_deducted !== 0 && row.pts_deducted !== null &&
              row.acq_items && row.item_qty !== 0 && row.item_qty !== null &&
              row.service
            );

            // Update the recordsFiltered count to match the filtered data
            json.recordsFiltered = filteredData.length;

            // Return the filtered data to DataTables
            return filteredData;
          }
        },
        "pageLength": 5, // Default entries per page
        "lengthMenu": [5, 10, 20], // Dropdown options for number of entries
        "columns": [{
            "data": "id"
          },
          {
            "data": "acq_items"
          },
          {
            "data": "item_qty"
          },
          {
            "data": "pts_deducted",
            "render": function(data, type, row) {
              return data > 0 ? `-${data}` : data;
            }
          },
          {
            "data": "service"
          },
          {
            "data": "timestamp"
          }
        ],
        "ordering": false,
        "language": {
          "info": "Showing _START_ to _END_ of _TOTAL_ entries", // Customize info without filtered text
          "infoEmpty": "No entries available",
          "infoFiltered": "" // Remove the "filtered from X total entries"
        },
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