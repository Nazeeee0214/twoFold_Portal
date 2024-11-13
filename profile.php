<?php

$mpg = 'Profile';
$spg = 'pfp';
$tit = 'Profile';

?>



<?php include 'partials/_header.php'
?>

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

        <!-- Footer JS Include -->
        <?php include 'partials/_footerjs.php' ?>
      </div>
    </div>
  </div>
</body>