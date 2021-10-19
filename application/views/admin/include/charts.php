
  
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

    Highcharts.chart('userIncomeChart', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: ''
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 150,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
        },
        xAxis: {
            categories: incomeAxis
        },
        yAxis: {
            title: {
                text: ''
            },
            labels: {
                format: '<?php echo html_escape($currency) ?>{value}'
            },
        },
        tooltip: {
            headerFormat: '<span class="fs-14">{series.name}</span><br>',
            pointFormat: '<span>{point.name}</span> <b><?php echo html_escape($currency) ?>{point.y}</b><br/>'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.2,
                dataLabels: {
                    enabled: true,
                    format: '<?php echo html_escape($currency) ?>{point.y}'
                }
            }
        },
        series: [{
            name: '<?php echo trans('income') ?>',
            data: incomeData,
            color: 'rgb(35, 199, 112)'
        }]
    });


  <?php endif; ?>

</script>
