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
                <div class="content-wrapper">
          <div class="barcode-container">
            <svg id="barcode"></svg>
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
      const barcodeValue = <?php echo  $_SESSION['user']['student_id'] ?>;

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
  </script>


</body>

</html>