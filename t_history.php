<?php
$mpg = 'Transactions';
$spg = 'th';
$tit = 'Transactions';
?>

<?php include 'partials/_header.php'; ?>

<title> <?php echo $tit; ?> </title>

<style>
  /* Responsive Table Styling */
  .table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
  }

  table {
    width: 100%;
    min-width: 600px;
    font-size: 14px;
  }

  th, td {
    white-space: nowrap;
    text-align: center;
    padding: 8px;
  }

  @media (max-width: 768px) {
    .card {
      padding: 15px;
    }

    table {
      font-size: 12px;
      min-width: 100%;
    }

    th, td {
      padding: 6px;
    }
  }
</style>

<body>
  <div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
      <?php include 'partials/_sidebar.php'; ?>
      <div class="layout-page">
        <?php include 'partials/_navbar.php'; ?>
        <div class="content-wrapper">
          <div class="container-xxl flex-grow-1 container-p-y">
            <div class="card p-3">
              <h3 class="text-center">Transaction History</h3>
              <div class="table-responsive">
                <table class="table table-hover" id="transaction_history">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Item</th>
                      <th>Qty</th>
                      <th>Points</th>
                      <th>Service</th>
                      <th>Timestamp</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php include 'partials/_footerjs.php'; ?>

  <script>
    $(document).ready(function() {
      $('#transaction_history').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "server/transaction_table.inc.php",
        "pageLength": 5,
        "lengthMenu": [5, 10, 20],
        "columns": [
          { "data": "id" },
          { "data": "acq_items" },
          { "data": "item_qty" },
          { "data": "pts_deducted", "render": function(data) { return data > 0 ? `-${data}` : data; } },
          { "data": "service" },
          { "data": "timestamp" }
        ],
        "ordering": false,
        "language": {
          "info": "Showing _START_ to _END_ of _TOTAL_ entries",
          "infoEmpty": "No entries available",
          "infoFiltered": ""
        }
      });
    });
  </script>
</body>
</html>
