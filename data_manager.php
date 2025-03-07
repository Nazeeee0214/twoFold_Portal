<?php

$mpg = 'Data Manager';
$spg = 'dm';
$tit = 'Data Manager';

include 'partials/_header.php'; ?>

<title><?php echo $tit; ?></title>

<body>
  <!-- Layout Wrapper -->
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
          <!-- Main Content Area -->
          <div class="container-fluid p-3">
            <h4 class="fw-bold text-center">
              <span class="text-muted fw-light">Management /</span> Bin Capacity
            </h4>

            <!-- Chart Section -->
            <div class="row">
              <!-- First Chart -->
              <div class="col-lg-6 col-md-12 mb-4">
                <div class="card p-3">
                  <h5 class="text-center">Bottle Capacity</h5>
                  <div class="chart-container">
                    <div id="botlcap" style="width: 100%; height: 300px;"></div>
                  </div>
                </div>
              </div>

              <!-- Second Chart -->
              <div class="col-lg-6 col-md-12 mb-4">
                <div class="card p-3">
                  <h5 class="text-center">Storage Capacity</h5>
                  <div class="chart-container">
                    <div id="main1" style="width: 100%; height: 300px;"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End of Content Wrapper -->

        <!-- Overlay for Layout Menu Toggle -->
        <div class="layout-overlay layout-menu-toggle"></div>

      </div> <!-- End of Layout Page -->
    </div> <!-- End of Layout Container -->

    <!-- Footer JS Include -->
    <?php include 'partials/_footerjs.php'; ?>

    <script>
      // Responsive ECharts for botlcap
      var chartDomBotlcap = document.getElementById('botlcap');
      var myChartBotlcap = echarts.init(chartDomBotlcap);
      var optionBotlcap = {
        xAxis: {
          data: ['Cleared Bottle', 'Colored Bottle'],
          axisLine: { show: false },
          splitLine: { show: false }
        },
        yAxis: {
          max: 100,
          axisLine: { show: false },
          splitLine: { show: false },
          axisLabel: { show: false }
        },
        series: [{
          type: 'bar',
          data: [
            { value: 30, name: 'Cleared Bottle', itemStyle: { color: '#00FFFF' } },
            { value: 20, name: 'Colored Bottle', itemStyle: { color: 'green' } }
          ],
          label: {
            show: true,
            position: 'top',
            formatter: '{c}%',
            color: 'BLACK',
            fontSize: 12
          }
        }]
      };
      myChartBotlcap.setOption(optionBotlcap);
      window.addEventListener('resize', () => myChartBotlcap.resize());

      // Responsive ECharts for main1
      var chartDom = document.getElementById('main1');
      var myChart = echarts.init(chartDom);
      var option = {
        
        tooltip: { trigger: 'item' },
        legend: { orient: 'vertical', left: 'left' },
        series: [{
          name: 'Access From',
          type: 'pie',
          radius: '50%',
          data: [
            { value: 45, name: 'Cleared Bottle' },
            { value: 80, name: 'Colored Bottle' },
            { value: 75, name: 'Available Storage' }
          ],
          emphasis: {
            itemStyle: {
              shadowBlur: 10,
              shadowOffsetX: 0,
              shadowColor: 'rgba(0, 0, 0, 0.5)'
            }
          }
        }]
      };
      myChart.setOption(option);
      window.addEventListener('resize', () => myChart.resize());
    </script>

</body>
</html>
