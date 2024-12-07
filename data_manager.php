<?php

$mpg = 'Data Manager';
$spg = 'dm';
$tit = 'Data Manager';



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
        <div class="content-wrapper">
          <!-- Main Content Area -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Management /</span> Bin capacity</h4>
            <div class="row">
              <div class="col-12" style="width: 97.5%;">
  <div class="chart-container">
    <div id="botlcap" style="width: 100%; height: 400px;"></div>
  </div>
</div>
              
            <div class="row">
              <div class="col-12">
                <div class="chart-container">
                  <div id="main1" style="width: 100%; height: 400px;"></div>
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


      // JavaScript for #botlcap chart with percentage labels on bars
 var chartDomBotlcap = document.getElementById('botlcap');
var myChartBotlcap = echarts.init(chartDomBotlcap);
var optionBotlcap;

optionBotlcap = {
  xAxis: {
    data: ['Cleared Bottle ', 'Colored Bottle'],
    axisLine: {
      show: false // Remove the x-axis line
    },
    splitLine: {
      show: false // Remove the x-axis grid lines
    }
  },
  yAxis: {
    max: 100, // Set max to 100 for percentage scale
    axisLine: {
      show: false // Remove the y-axis line
    },
    splitLine: {
      show: false, // Remove the y-axis grid lines
    },
    axisLabel: {
      show: false // Remove the y-axis labels (100, 80, 60, etc.)
    }
  },
  dataGroupId: '',
  animationDurationUpdate: 500,
  series: {
    type: 'bar',
    id: 'sales',
    data: [
      {
        value: 30,
        groupId: 'clear',
        name: 'Cleared Bottle',
        itemStyle: {
          color: '#00FFFF' // Green color for "Clear"
        }
      },
      {
        value: 20,
        groupId: 'colored',
        name: 'Colored Bottle',
        itemStyle: {
          color: 'green' // Green color for "Colored"
        }
      }
    ],
    label: {
      show: true,
      position: 'top',
      formatter: '{c}%', // Display value with percentage symbol
      color: 'BLACK',
      fontSize: 12
    },
    universalTransition: {
      enabled: true,
      divideShape: 'clone'
    }
  }
};

optionBotlcap && myChartBotlcap.setOption(optionBotlcap);


//ECHARTS 2


      var chartDom = document.getElementById('main1');
var myChart = echarts.init(chartDom);
var option;

option = {
  title: {
    text: 'STORAGE CAPACITY',
    subtext: '100 Capacity',
    left: 'center'
  },
  tooltip: {
    trigger: 'item'
  },
  legend: {
    orient: 'vertical',
    left: 'left'
  },
  series: [
    {
      name: 'Access From',
      type: 'pie',
      radius: '50%',
      data: [
        { value: 45, name: 'Cleared Bottle' },
        { value: 80, name: 'Colored Bottle' },
        { value: 75, name: 'Available Storage' },
      
      ],
      emphasis: {
        itemStyle: {
          shadowBlur: 10,
          shadowOffsetX: 0,
          shadowColor: 'rgba(0, 0, 0, 0.5)'
        }
      }
    }
  ]
};

option && myChart.setOption(option);

    </script>
</body>

</html>