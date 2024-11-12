<?php
session_start();

// Check if the user is logged in by checking a session variable, e.g., 'user_id'
if (!isset($_SESSION['user_id'])) {
  // Redirect to login page
  header("Location: auth-login-basic.php");
  exit();
}

$mpg = 'Profile';
$spg = 'dp';
$tit = 'Profile';

?>


<!-- Header Include -->
<?php include 'partials/_header.php' ?>


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