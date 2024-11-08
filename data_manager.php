<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free">
<?php include 'partials/_header.php'
?>

<style>
  #botlcap {
    width: 400px;
    height: 400px;
    /* Ensure height is set for the chart */
  }

  #main {
    width: 800px;
    height: 800px;
    /* Ensure height is set for the chart */
  }
</style>


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
          <div class="container-xxl flex-grow-1 container-p-y">

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <h5 class="card-header">Container Capacity</h5>
                  <div class="chart-container">
                    <div id="botlcap"></div>
                  </div>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <h5 class="card-header">Container Capacity</h5>
                  <div class="chart-container">
                    <div id="main"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Content wrapper -->
          </div>
          <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle">

        </div>
      </div>
      <!-- / Layout wrapper -->



      <!-- Core JS -->
      <?php include 'partials/_footerjs.php'
      ?>
      <script>
        var chartDom = document.getElementById('main');
        var myChart = echarts.init(chartDom);
        var option;

        option = {
          series: [{
            type: 'gauge',
            startAngle: 180,
            endAngle: 0,
            min: 0,
            max: 240,
            splitNumber: 12,
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
              fontSize: 20
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
                return '{value|' + value.toFixed(0) + '}{unit|km/h}';
              },
              rich: {
                value: {
                  fontSize: 50,
                  fontWeight: 'bolder',
                  color: '#777'
                },
                unit: {
                  fontSize: 20,
                  color: '#999',
                  padding: [0, 0, -20, 10]
                }
              }
            },
            data: [{
              value: 100
            }]
          }]
        };

        option && myChart.setOption(option);


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