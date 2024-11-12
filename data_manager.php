<?php
session_start();

// Check if the user is logged in by checking a session variable, e.g., 'user_id'
if (!isset($_SESSION['user_id'])) {
  // Redirect to login page
  header("Location: auth-login-basic.php");
  exit();
}

$mpg = 'Data Manager';
$spg = 'dm';
$tit = 'Data Manager';

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

        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Main Content Area -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Management /</span> Bin capacity</h4>
            <div class="row">
              <div class="col-6 ">
                <div class="chart-container">
                  <div id="botlcap"></div>
                </div>
              </div>
              <div class="col-6">
                <div class="chart-container">
                  <div id="main"></div>
                </div>
              </div>
            </div>
          </div>
        </div> <!-- End of Layout Page -->

      </div> <!-- End of Layout Container -->

      <!-- Overlay for Layout Menu Toggle -->
      <div class="layout-overlay layout-menu-toggle"></div>

    </div> <!-- End of Layout Wrapper -->

    <!-- Footer JS Include -->
    <?php include 'partials/_footerjs.php' ?>

    <script>
      // JavaScript for #main chart
      var chartDom = document.getElementById('main');
      var myChart = echarts.init(chartDom);
      var option;

      option = {
        series: [{
          type: 'gauge',
          startAngle: 180,
          endAngle: 0,
          min: 0,
          max: 100,
          splitNumber: 10,
          itemStyle: {
            color: '#58D9F9',
            shadowColor: 'rgba(0,138,255,0.45)',
            shadowBlur: 10,
            shadowOffsetX: 2,
            shadowOffsetY: 2
          },
          progress: {
            show: true,
            roundCap: true,
            width: 18
          },
          pointer: {
            icon: 'path://M2090.36389,615.30999 L2090.36389,615.30999 C2091.48372,615.30999 2092.40383,616.194028 2092.44859,617.312956 L2096.90698,728.755929 C2097.05155,732.369577 2094.2393,735.416212 2090.62566,735.56078 C2090.53845,735.564269 2090.45117,735.566014 2090.36389,735.566014 L2090.36389,735.566014 C2086.74736,735.566014 2083.81557,732.63423 2083.81557,729.017692 C2083.81557,728.930412 2083.81732,728.84314 2083.82081,728.755929 L2088.2792,617.312956 C2088.32396,616.194028 2089.24407,615.30999 2090.36389,615.30999 Z',
            length: '75%',
            width: 16,
            offsetCenter: [0, '5%']
          },
          axisLine: {
            roundCap: true,
            lineStyle: {
              width: 18
            }
          },
          axisTick: {
            splitNumber: 2,
            lineStyle: {
              width: 2,
              color: '#999'
            }
          },
          splitLine: {
            length: 12,
            lineStyle: {
              width: 3,
              color: '#999'
            }
          },
          axisLabel: {
            distance: 30,
            color: '#999',
            fontSize: 12
          },
          title: {
            show: false
          },
          detail: {
            backgroundColor: '#fff',
            borderColor: '#999',
            borderWidth: 2,
            width: '60%',
            lineHeight: 40,
            height: 40,
            borderRadius: 8,
            offsetCenter: [0, '35%'],
            valueAnimation: true,
            formatter: function(value) {
              return '{value|' + value.toFixed(0) + '}{unit|%}';
            },
            rich: {
              value: {
                fontSize: 12,
                fontWeight: 'bolder',
                color: '#777'
              },
              unit: {
                fontSize: 12,
                color: '#999',
                padding: [0, 0, 0, 10]
              }
            }
          },
          data: [{
            value: 100
          }]
        }]
      };

      option && myChart.setOption(option);

      // JavaScript for #botlcap chart
      var chartDom = document.getElementById('botlcap');
      var myChart = echarts.init(chartDom);
      var option;

      option = {
        xAxis: {
          data: ['Clear', 'Colored']
        },
        yAxis: {},
        dataGroupId: '',
        animationDurationUpdate: 500,
        series: {
          type: 'bar',
          id: 'sales',
          data: [{
              value: 26,
              groupId: 'clear'
            },
            {
              value: 100,
              groupId: 'colored'
            }
          ],
          universalTransition: {
            enabled: true,
            divideShape: 'clone'
          }
        }
      };

      option && myChart.setOption(option);
    </script>

</body>

</html>