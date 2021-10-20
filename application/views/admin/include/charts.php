
  
<!-- high charts js-->
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
  <?php if(is_admin()): ?>
    var incomeData = <?= $income_data; ?>;
    var incomeAxis = <?= $income_axis; ?>;


    var options = {
          series: [{
            name: '<?= trans('income') ?>',
            data: incomeData,
        }],
          chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: incomeAxis
        },
        yaxis: {
            title: {
                text: ''
            },
            labels: {
                format: '<?php echo html_escape($currency) ?>{value}'
            },
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#adminIncomeChart"), options);
        chart.render();

        // pie-radialbar chart
        var options = {
          series: [
              
                
                    <?php 
                      foreach ($upackages as $upackage) {
                        echo $upackage->total;
                      }
                    ?>
                
              
          ],
          chart: {
          height: 350,
          type: 'radialBar',
        },
        plotOptions: {
          radialBar: {
            hollow: {
              size: '70%',
            }
          },
        },
        labels: ['Packages'],
        };
        var chart = new ApexCharts(document.querySelector("#packagePie"), options);
        chart.render();


  <?php endif; ?>



  <?php if(is_user()): ?>
    var incomeData = <?= $income_data; ?>;
    var incomeAxis = <?= $income_axis; ?>;
    var options = {
          series: [{
            name: '<?= trans('income') ?>',
            data: incomeData,
        }],
          chart: {
          height: 350,
          type: 'area'
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'smooth'
        },
        xaxis: {
          type: 'datetime',
          categories: incomeAxis
        },
        yaxis: {
            title: {
                text: ''
            },
            labels: {
                format: '<?php echo html_escape($currency) ?>{value}'
            },
        },
        tooltip: {
          x: {
            format: 'dd/MM/yy HH:mm'
          },
        },
        };

        var chart = new ApexCharts(document.querySelector("#userIncomeChart"), options);
        chart.render();

    

  <?php endif; ?>

</script>
