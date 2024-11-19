<?php


$mpg = 'About Us';
$spg = 'abt';
$tit = 'About Us';

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
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Binnovation</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fdf5f5;
            color: #333;
        }
        header {
        
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #800000;
        }
        p {
            line-height: 1.8;
            color: #555;
        }
        footer {
            text-align: center;
            padding: 15px 0;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>About Binnovation</h1>
    </header>
    <div class="container">
        <h1>Welcome to Our Website</h1>
        <p>
            We are a dedicated team passionate about delivering exceptional services and creating impactful experiences for our users.
            Our mission is to provide innovative solutions tailored to meet your needs.
        </p>
        <p>
            With a commitment to excellence and a focus on quality, we aim to inspire, innovate, and deliver results that exceed expectations.
            Thank you for choosing us to be a part of your journey.
        </p>
    </div>
    <footer>
        &copy; 2024 Binnovation. All rights reserved.
    </footer>
</body>
</html>
