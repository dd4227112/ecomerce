<?php include('admin_header.php');?>
<!-- content -->
<div class="main-panel">
    <div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
        </span> Dashboard
        </h3>
        <nav aria-label="breadcrumb">
        <ul class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">
            <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
            </li>
        </ul>
        </nav>
    </div>
    <div class="row">
        <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-danger card-img-holder text-white">
            <div class="card-body">
            <img src="<?=base_url('admin_files/assets/images/dashboard/circle.svg')?>" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Weekly Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-2">TZS <?=number_format($weekly_sales->sum)?></h2>
            <h4 class="font-weight-normal mb-3">Last Week Sales <i class="mdi mdi-chart-line mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-2">TZS <?=number_format($weekly_sales_lastweek->sum)?></h2>
            </div>
        </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-info card-img-holder text-white">
            <div class="card-body">
            <img src="<?=base_url('admin_files/assets/images/dashboard/circle.svg')?>" class="card-img-absolute" alt="circle-image" />
            <h4 class="font-weight-normal mb-3">Weekly Orders <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-2"> <?=number_format($weekly_orders->orders)?></h2>
            <h4 class="font-weight-normal mb-3">Last Week Orders <i class="mdi mdi-bookmark-outline  mdi-24px float-right"></i>
            </h4>
            <h2 class="mb-2"><?=number_format($weekly_orders_lastweek->orders)?></h2>
            </div>
        </div>
        </div>
        <div class="col-md-4 stretch-card grid-margin">
        <div class="card bg-gradient-success card-img-holder text-white">
            <div class="card-body">
            <img src="<?=base_url('admin_files/assets/images/dashboard/circle.svg')?>" class="card-img-absolute" alt="circle-image" />
            <h2 class="font-weight-normal mb-3"> Summary <i class=" mdi mdi-bookmark-plus float-right"></i>
            </h2>
            <h4 class="font-weight-normal mb-3"> Orders: <?=$order->orders?> <i class=" float-right"></i>
            </h4>
            <h4 class="font-weight-normal mb-3"> Products: <?=$product->products?> <i class=" float-right"></i>
            </h4>
            <h4 class="font-weight-normal mb-3"> Payments: <?=number_format($payment->payments)?> <i class=" float-right"></i>
            </h4>
            <h4 class="font-weight-normal mb-3"> Customers: <?=$customer->customers?> <i class=" float-right"></i>
            </h4>

            </div>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <div class="clearfix">
                <h4 class="card-title float-left">Orders and Payments Statistics</h4>
                <div id="visit-sale-chart-legend" class="rounded-legend legend-horizontal legend-top-right float-right"></div>
            </div>
            <canvas id="visit-sale-chart" class="mt-4"></canvas>
            </div>
        </div>
        </div>
        <div class="col-md-5 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Top 5 Sold Products</h4>
                        <table class="table table-hover" width="100%">
                        <thead>
                            <tr class="bg-gradient-info">
                            <th> # </th>
                            <th>Image </th>
                            <th>Name </th>
                            <th>Category</th>
                            <th>Price </th>
                            <th>Count </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no =1;
                             if (!empty($products)) {
                                foreach ($products as $key => $product) {
                                    $category =$this->db->get_where('categories', ['id'=>$product->category_id])->row()->name;?>
                              <tr>
                              <td> <?=$no?> </td>
                              <td class="py-3">
                                  <img src="<?=base_url('web_files/img/'.$product->image)?>" alt="image" />
                              </td>
                              <td> <?=$product->name?> </td>
                              <td> <?=$category?> </td>
                              <td> <?=$product->price?> </td>
                              <td> <?=$product->count?> </td>
                            </tr>
                            <?php 
                            $no++;
                                }
                            }
                            else {
                                echo "<tr><td  colspan ='7' class='text-center'>No data found</td></tr>";}

                            ?>
                        </tbody>
                        </table>
                    </div>
        </div>
        </div>
    </div>
    <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Recent Orders</h4>
                        <table class="table table-hover">
                        <thead>
                            <tr class="bg-gradient-danger">
                            <th> # </th>
                            <th>Date </th>
                            <th>Customer </th>
                            <th>Location </th>
                            <th>Contact </th>
                            <th>Amount </th>
                            <th>Payment Method </th>
                            <th> Status </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no =1;
                             if (!empty($orders)) {
                                foreach ($orders as $key => $order) {?>
                            <tr>
                            <td> <?=$no?> </td>
                            <td> <?=$order->date?> </td>
                            <td> <?=$order->name?> </td>
                            <td> <?=$order->city." - ".$order->country?> </td>
                            <td> <?=$order->mobile?> </td>
                            <td> <?=number_format($order->amount,1)?> </td>
                            <td> <?=$order->payment_method?> </td>
                            <td> <?=$order->status?> </td>
                            </tr>
                            <?php 
                            $no++;
                                }
                            }
                            else {
                                echo "<tr><td  colspan ='7' class='text-center'>No data found</td></tr>";}

                            ?>
                        </tbody>
                        </table>
                    </div>
                    </div>
              </div>
        </div>

    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <h4 class="card-title">Top 5 Customers</h4>
            <div class="table-responsive">
                <table class="table table-hover">
                <thead class="bg-gradient-success">
                    <tr>
                    <th> # </th>
                    <th> Name </th>
                    <th> Email</th>
                    <th> Address </th>
                    <th> Mobile </th>
                    <th> City </th>
                    <th> Country </th>
                    <th> No. Orders </th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($customers)) {
                        $no=1;
                        foreach ($customers as $key => $customer) {?>


                    <tr>
                    <td> <?=$no?> </td>
                    <td> <?=$customer->name?> </td>
                    <td> <?=$customer->email?> </td>
                    <td> <?=$customer->address?> </td>
                    <td> <?=$customer->mobile?> </td>
                    <td> <?=$customer->city?> </td>
                    <td> <?=$customer->country?> </td>
                    <td> <?=$customer->count?> </td>
                    </tr>
               <?php 
               $no++; }
                    } else {
                        echo "<tr><td  colspan ='5' class='text-center'>No data found</td></tr>";}

                    ?>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<!-- content -->
<?php include('admin_footer.php');?>
<script>
    (function($) {
  'use strict';
  $(function() {

    Chart.defaults.global.legend.labels.usePointStyle = true;
    
    if ($("#serviceSaleProgress").length) {
      var bar = new ProgressBar.Circle(serviceSaleProgress, {
        color: 'url(#gradient)',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 8,
        trailWidth: 8,
        easing: 'easeInOut',
        duration: 1400,
        text: {
          autoStyleContainer: false
        },
        from: { color: '#aaa', width: 6 },
        to: { color: '#57c7d4', width: 6 }
      });

      bar.animate(.65);  // Number from 0.0 to 1.0
      bar.path.style.strokeLinecap = 'round';
      let linearGradient = '<defs><linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%" gradientUnits="userSpaceOnUse"><stop offset="20%" stop-color="#da8cff"/><stop offset="50%" stop-color="#9a55ff"/></linearGradient></defs>';
      bar.svg.insertAdjacentHTML('afterBegin', linearGradient);
    }
    if ($("#productSaleProgress").length) {
      var bar = new ProgressBar.Circle(productSaleProgress, {
        color: 'url(#productGradient)',
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 8,
        trailWidth: 8,
        easing: 'easeInOut',
        duration: 1400,
        text: {
          autoStyleContainer: false
        },
        from: { color: '#aaa', width: 6 },
        to: { color: '#57c7d4', width: 6 }
      });

      bar.animate(.6);  // Number from 0.0 to 1.0
      bar.path.style.strokeLinecap = 'round';
      let linearGradient = '<defs><linearGradient id="productGradient" x1="0%" y1="0%" x2="100%" y2="0%" gradientUnits="userSpaceOnUse"><stop offset="40%" stop-color="#36d7e8"/><stop offset="70%" stop-color="#b194fa"/></linearGradient></defs>';
      bar.svg.insertAdjacentHTML('afterBegin', linearGradient);
    }
    if ($("#points-chart").length) {
      var ctx = document.getElementById('points-chart').getContext("2d");

      var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
      gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');

      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: [1, 2, 3, 4, 5, 6, 7, 8],
              datasets: [
                {
                  label: "North Zone",
                  borderColor: gradientStrokeViolet,
                  backgroundColor: gradientStrokeViolet,
                  hoverBackgroundColor: gradientStrokeViolet,
                  pointRadius: 0,
                  fill: false,
                  borderWidth: 1,
                  fill: 'origin',
                  data: [20, 40, 15, 35, 25, 50, 30, 20]
                },
                {
                  label: "South Zone",
                  borderColor: '#e9eaee',
                  backgroundColor: '#e9eaee',
                  hoverBackgroundColor: '#e9eaee',
                  pointRadius: 0,
                  fill: false,
                  borderWidth: 1,
                  fill: 'origin',
                  data: [40, 30, 20, 10, 50, 15, 35, 20]
                }
            ]
          },
          options: {
              legend: {
                  display: false
              },
              scales: {
                  yAxes: [{
                      ticks: {
                          display: false,
                          min: 0,
                          stepSize: 10
                      },
                      gridLines: {
                        drawBorder: false,
                        display: false
                      }
                  }],
                  xAxes: [{
                      gridLines: {
                        display:false,
                        drawBorder: false,
                        color: 'rgba(0,0,0,1)',
                        zeroLineColor: '#eeeeee'
                      },
                      ticks: {
                          padding: 20,
                          fontColor: "#9c9fa6",
                          autoSkip: true,
                      },
                      barPercentage: 0.7
                  }]
                }
              },
              elements: {
                point: {
                  radius: 0
                }
              }
            })
    }
    if ($("#events-chart").length) {
      var ctx = document.getElementById('events-chart').getContext("2d");

      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');

      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
              labels: [1, 2, 3, 4, 5, 6, 7, 8],
              datasets: [
                {
                  label: "Domestic",
                  borderColor: gradientStrokeBlue,
                  backgroundColor: gradientStrokeBlue,
                  hoverBackgroundColor: gradientStrokeBlue,
                  pointRadius: 0,
                  fill: false,
                  borderWidth: 1,
                  fill: 'origin',
                  data: [20, 40, 15, 35, 25, 50, 30, 20]
                },
                {
                  label: "International",
                  borderColor: '#e9eaee',
                  backgroundColor: '#e9eaee',
                  hoverBackgroundColor: '#e9eaee',
                  pointRadius: 0,
                  fill: false,
                  borderWidth: 1,
                  fill: 'origin',
                  data: [40, 30, 20, 10, 50, 15, 35, 20]
                }
            ]
          },
          options: {
              legend: {
                  display: false
              },
              scales: {
                  yAxes: [{
                      ticks: {
                          display: false,
                          min: 0,
                          stepSize: 10
                      },
                      gridLines: {
                        drawBorder: false,
                        display: false
                      }
                  }],
                  xAxes: [{
                      gridLines: {
                        display:false,
                        drawBorder: false,
                        color: 'rgba(0,0,0,1)',
                        zeroLineColor: '#eeeeee'
                      },
                      ticks: {
                          padding: 20,
                          fontColor: "#9c9fa6",
                          autoSkip: true,
                      },
                      barPercentage: 0.7
                  }]
                }
              },
              elements: {
                point: {
                  radius: 0
                }
              }
            })
    }
    if ($("#visit-sale-chart").length) {
      Chart.defaults.global.legend.labels.usePointStyle = true;
      var ctx = document.getElementById('visit-sale-chart').getContext("2d");

      var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
      gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
      var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';
      
      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 360);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
      var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

      var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
      gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
      var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [
              {
                label: "ORDERS",
                borderColor: gradientStrokeViolet,
                backgroundColor: gradientStrokeViolet,
                hoverBackgroundColor: gradientStrokeViolet,
                legendColor: gradientLegendViolet,
                pointRadius: 0,
                fill: false,
                borderWidth: 1,
                fill: 'origin',
                data: [<?=$jan?>, <?=$feb?>, <?=$mar?>, <?=$apr?>, <?=$may?>, <?=$jun?>, <?=$jul?>, <?=$aug?>, <?=$sep?>, <?=$oct?>, <?=$nov?>, <?=$dec?>]
              },
              {
                label: "PAYMENT",
                borderColor: gradientStrokeRed,
                backgroundColor: gradientStrokeRed,
                hoverBackgroundColor: gradientStrokeRed,
                legendColor: gradientLegendRed,
                pointRadius: 0,
                fill: false,
                borderWidth: 1,
                fill: 'origin',
                data: [<?=$jan_pay?>, <?=$feb_pay?>, <?=$mar_pay?>, <?=$apr_pay?>, <?=$may_pay?>, <?=$jun_pay?>, <?=$jul_pay?>, <?=$aug_pay?>, <?=$sep?>, <?=$oct_pay?>, <?=$nov_pay?>, <?=$dec_pay?>]
              },
    
          ]
        },
        options: {
          responsive: true,
          legend: false,
          legendCallback: function(chart) {
            var text = []; 
            text.push('<ul>'); 
            for (var i = 0; i < chart.data.datasets.length; i++) { 
                text.push('<li><span class="legend-dots" style="background:' + 
                           chart.data.datasets[i].legendColor + 
                           '"></span>'); 
                if (chart.data.datasets[i].label) { 
                    text.push(chart.data.datasets[i].label); 
                } 
                text.push('</li>'); 
            } 
            text.push('</ul>'); 
            return text.join('');
          },
          scales: {
              yAxes: [{
                  ticks: {
                      display: false,
                      min: 0,
                      stepSize: 20,
                      max: 80
                  },
                  gridLines: {
                    drawBorder: false,
                    color: 'rgba(235,237,242,1)',
                    zeroLineColor: 'rgba(235,237,242,1)'
                  }
              }],
              xAxes: [{
                  gridLines: {
                    display:false,
                    drawBorder: false,
                    color: 'rgba(0,0,0,1)',
                    zeroLineColor: 'rgba(235,237,242,1)'
                  },
                  ticks: {
                      padding: 20,
                      fontColor: "#9c9fa6",
                      autoSkip: true,
                  },
                  categoryPercentage: 0.5,
                  barPercentage: 0.5
              }]
            }
          },
          elements: {
            point: {
              radius: 0
            }
          }
      })
      $("#visit-sale-chart-legend").html(myChart.generateLegend());
    }
    if ($("#visit-sale-chart-dark").length) {
      Chart.defaults.global.legend.labels.usePointStyle = true;
      var ctx = document.getElementById('visit-sale-chart-dark').getContext("2d");

      var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeViolet.addColorStop(0, 'rgba(218, 140, 255, 1)');
      gradientStrokeViolet.addColorStop(1, 'rgba(154, 85, 255, 1)');
      var gradientLegendViolet = 'linear-gradient(to right, rgba(218, 140, 255, 1), rgba(154, 85, 255, 1))';
      
      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 360);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
      var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

      var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
      gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
      var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG'],
            datasets: [
              {
                label: "CHN",
                borderColor: gradientStrokeViolet,
                backgroundColor: gradientStrokeViolet,
                hoverBackgroundColor: gradientStrokeViolet,
                legendColor: gradientLegendViolet,
                pointRadius: 0,
                fill: false,
                borderWidth: 1,
                fill: 'origin',
                data: [20, 40, 15, 35, 25, 50, 30, 20]
              },
              {
                label: "USA",
                borderColor: gradientStrokeRed,
                backgroundColor: gradientStrokeRed,
                hoverBackgroundColor: gradientStrokeRed,
                legendColor: gradientLegendRed,
                pointRadius: 0,
                fill: false,
                borderWidth: 1,
                fill: 'origin',
                data: [40, 30, 20, 10, 50, 15, 35, 40]
              },
              {
                label: "UK",
                borderColor: gradientStrokeBlue,
                backgroundColor: gradientStrokeBlue,
                hoverBackgroundColor: gradientStrokeBlue,
                legendColor: gradientLegendBlue,
                pointRadius: 0,
                fill: false,
                borderWidth: 1,
                fill: 'origin',
                data: [70, 10, 30, 40, 25, 50, 15, 30]
              }
          ]
        },
        options: {
          responsive: true,
          legend: false,
          legendCallback: function(chart) {
            var text = []; 
            text.push('<ul>'); 
            for (var i = 0; i < chart.data.datasets.length; i++) { 
                text.push('<li><span class="legend-dots" style="background:' + 
                           chart.data.datasets[i].legendColor + 
                           '"></span>'); 
                if (chart.data.datasets[i].label) { 
                    text.push(chart.data.datasets[i].label); 
                } 
                text.push('</li>'); 
            } 
            text.push('</ul>'); 
            return text.join('');
          },
          scales: {
              yAxes: [{
                  ticks: {
                      display: false,
                      min: 0,
                      stepSize: 20,
                      max: 80
                  },
                  gridLines: {
                    drawBorder: false,
                    color: '#322f2f',
                    zeroLineColor: '#322f2f'
                  }
              }],
              xAxes: [{
                  gridLines: {
                    display:false,
                    drawBorder: false,
                    color: 'rgba(0,0,0,1)',
                    zeroLineColor: 'rgba(235,237,242,1)'
                  },
                  ticks: {
                      padding: 20,
                      fontColor: "#9c9fa6",
                      autoSkip: true,
                  },
                  categoryPercentage: 0.5,
                  barPercentage: 0.5
              }]
            }
          },
          elements: {
            point: {
              radius: 0
            }
          }
      })
      $("#visit-sale-chart-legend-dark").html(myChart.generateLegend());
    }
    if ($("#traffic-chart").length) {
      var gradientStrokeBlue = ctx.createLinearGradient(0, 0, 0, 181);
      gradientStrokeBlue.addColorStop(0, 'rgba(54, 215, 232, 1)');
      gradientStrokeBlue.addColorStop(1, 'rgba(177, 148, 250, 1)');
      var gradientLegendBlue = 'linear-gradient(to right, rgba(54, 215, 232, 1), rgba(177, 148, 250, 1))';

      var gradientStrokeRed = ctx.createLinearGradient(0, 0, 0, 50);
      gradientStrokeRed.addColorStop(0, 'rgba(255, 191, 150, 1)');
      gradientStrokeRed.addColorStop(1, 'rgba(254, 112, 150, 1)');
      var gradientLegendRed = 'linear-gradient(to right, rgba(255, 191, 150, 1), rgba(254, 112, 150, 1))';

      var gradientStrokeGreen = ctx.createLinearGradient(0, 0, 0, 300);
      gradientStrokeGreen.addColorStop(0, 'rgba(6, 185, 157, 1)');
      gradientStrokeGreen.addColorStop(1, 'rgba(132, 217, 210, 1)');
      var gradientLegendGreen = 'linear-gradient(to right, rgba(6, 185, 157, 1), rgba(132, 217, 210, 1))';      

      var trafficChartData = {
        datasets: [{
          data: [30, 30, 40],
          backgroundColor: [
            gradientStrokeBlue,
            gradientStrokeGreen,
            gradientStrokeRed
          ],
          hoverBackgroundColor: [
            gradientStrokeBlue,
            gradientStrokeGreen,
            gradientStrokeRed
          ],
          borderColor: [
            gradientStrokeBlue,
            gradientStrokeGreen,
            gradientStrokeRed
          ],
          legendColor: [
            gradientLegendBlue,
            gradientLegendGreen,
            gradientLegendRed
          ]
        }],
    
        // These labels appear in the legend and in the tooltips when hovering different arcs
        labels: [
          'Search Engines',
          'Direct Click',
          'Bookmarks Click',
        ]
      };
      var trafficChartOptions = {
        responsive: true,
        animation: {
          animateScale: true,
          animateRotate: true
        },
        legend: false,
        legendCallback: function(chart) {
          var text = []; 
          text.push('<ul>'); 
          for (var i = 0; i < trafficChartData.datasets[0].data.length; i++) { 
              text.push('<li><span class="legend-dots" style="background:' + 
              trafficChartData.datasets[0].legendColor[i] + 
                          '"></span>'); 
              if (trafficChartData.labels[i]) { 
                  text.push(trafficChartData.labels[i]); 
              }
              text.push('<span class="float-right">'+trafficChartData.datasets[0].data[i]+"%"+'</span>')
              text.push('</li>'); 
          } 
          text.push('</ul>'); 
          return text.join('');
        }
      };
      var trafficChartCanvas = $("#traffic-chart").get(0).getContext("2d");
      var trafficChart = new Chart(trafficChartCanvas, {
        type: 'doughnut',
        data: trafficChartData,
        options: trafficChartOptions
      });
      $("#traffic-chart-legend").html(trafficChart.generateLegend());      
    }
    if ($("#inline-datepicker").length) {
      $('#inline-datepicker').datepicker({
        enableOnReadonly: true,
        todayHighlight: true,
      });
    }
  });
})(jQuery);

</script>