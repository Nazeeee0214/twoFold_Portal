<?php

$mpg = 'About Us';
$spg = 'abt';
$tit = 'About Us';

?>

<!-- Header Include -->
<?php include 'partials/_header.php'; ?>

<title><?php echo $tit; ?></title>

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

        <!-- Main Content -->
        <div class="content-wrapper" style="padding: 20px;">
          

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
        </div>

        <!-- Footer -->
        <footer>
          &copy; 2024 Binnovation. All rights reserved.
        </footer>

        <!-- Footer JS Include -->
        <?php include 'partials/_footerjs.php'; ?>
      </div>
    </div>
  </div>

  <style>


  

    .container {
      max-width: 900px;
      width: 90%;
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
      padding: 15px;
      background-color: #800000;
      color: white;
      position: relative;
      bottom: 0;
      width: 100%;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .container {
        width: 95%;
        padding: 15px;
      }

      h1 {
        font-size: 22px;
      }

      p {
        font-size: 16px;
      }

      footer {
        font-size: 14px;
        padding: 10px;
      }
    }

    @media (max-width: 480px) {
      h1 {
        font-size: 20px;
      }

      p {
        font-size: 14px;
      }
    }
  </style>

</body>
</html>
