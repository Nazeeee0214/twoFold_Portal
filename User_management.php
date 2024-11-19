<?php

$mpg = 'User Management';
$spg = 'em';
$tit = 'User Management';



include 'partials/_header.php' ?>


<title> <?php echo $tit; ?> </title>

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

        <!-- Content wrapper -->


      </div> <!-- End of Layout Container -->

      <!-- Overlay for Layout Menu Toggle -->
      <div class="layout-overlay layout-menu-toggle"></div>

    </div> <!-- End of Layout Wrapper -->

    <!-- Footer JS Include -->
    <?php include 'partials/_footerjs.php' ?>

    </script>
</body>

</html>