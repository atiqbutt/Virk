<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $total_trips; ?></h3>

              <p>Total Trips</p>
            </div>
            <div class="icon">
              <i class="fa fa-bus" aria-hidden="true"></i>
            </div>
            <a href="<?php echo base_url()?>Trip/index" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $active_trips; ?></h3>

              <p>Active Trips</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $total_contractors; ?></h3>

              <p>Total Contractor</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url()?>Defination/contractorpage" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $total_vehicles; ?></h3>

              <p>Total Vehicles</p>
            </div>
            <div class="icon">
              <i class="fa fa-truck" aria-hidden="true"></i></i>
            </div>
            <a href="<?php echo base_url()?>Vehicle/show_vehicle" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
                 <!-- BAR CHART -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Trip Wise Shortage</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body chart-responsive">
              <div class="chart" id="bar-chart" style="height: 300px;"></div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </section>
        <!-- /.Left col -->

        <section class="col-lg-5 connectedSortable">
          <!-- DONUT CHART -->
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Total Expenses</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div id="container" style="min-width: 310px; height: 320px; max-width: 600px; margin: 0 auto"></div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	<style> .highcharts-credits{ display:none !important;} </style>
         </section>
   <!-- /col-lg-5 -->
    </section>
   <!-- /content -->


<script>

  $(function () {
//BAR CHART
    var bar_data = {
      data: [["LEX 2015", 10], ["LAX 2014", 8], ["LBE 2013", 4], ["LEM 2011", 13], ["AMB 2014", 17], ["RSM 2014", 9], ["RTM 2014", 9], ["NSM 2014", 9], ["RJM 2014", 9], ["RLM 2014", 9]],
      color: "#3c8dbc"
    };
    $.plot("#bar-chart", [bar_data], {
      grid: {
        borderWidth: 1,
        borderColor: "#f3f3f3",
        tickColor: "#f3f3f3"
      },
      series: {
        bars: {
          show: true,
          barWidth: 0.5,
          align: "center"
        }
      },
  tooltip: {
         show: true,
  
      },
      xaxis: {
        mode: "categories",
        tickLength: 0
      }
    });
 

// Pie Chart
    Highcharts.chart('container', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
      title: {
            text: '20,000'
        },
    
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: false,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Expense',
            colorByPoint: true,
            data: [{
                name: 'RIA 2009',
                y: 56.33
            }, {
                name: 'LEX 2012',
                y: 24.03,
                sliced: true,
                selected: true
            }, {
                name: 'AMB 2011',
                y: 10.38
            }, {
                name: 'LGK 2015',
                y: 4.77
            }]
        }]
    });
  });
</script>