<?php

$mpg = 'Dashboard';
$spg = 'dsh';
$tit = 'Dashboard';

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
            <input type="text" id="barcodeInput" placeholder="Enter text or number" maxlength="20" />
            <button onclick="generateBarcode()">Generate Barcode</button><br>
            <svg id="barcode"></svg>
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


</body>

</html>