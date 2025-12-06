    <?php include("include/header.php");?>

      <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-comments fa-5x"></i>
                  </div>
                  <?php 
                      $message_total_sql = "SELECT COUNT(id) FROM message";
                      $message_query = mysqli_query($con,$message_total_sql);
                      $message_row = mysqli_fetch_assoc($message_query);
                  ?>

                  <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo $message_row['COUNT(id)'];?></div>
                    <div>Total Message</div>
                  </div>
                </div>
              </div>
              <a href="message">
                <div class="panel-footer">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>

                  <?php 
                      $review_total_sql = "SELECT COUNT(id) FROM review";
                      $review_query = mysqli_query($con,$review_total_sql);
                      $review_row = mysqli_fetch_assoc($review_query);
                  ?>
                  <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo $review_row['COUNT(id)']?></div>
                    <div>Total review</div>
                  </div>
                </div>
              </div>
              <a href="review">
                <div class="panel-footer">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <?php 
                      $packages_total_sql = "SELECT COUNT(id) FROM packages";
                      $packages_query = mysqli_query($con,$packages_total_sql);
                      $packages_row = mysqli_fetch_assoc($packages_query);
                  ?>
                  <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo $packages_row['COUNT(id)'];?></div>
                    <div>All packages</div>
                  </div>
                </div>
              </div>
              <a href="packages">
                <div class="panel-footer">
                  <span class="pull-left">View Details</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-3">
                    <i class="fa fa-eye fa-5x"></i>
                  </div>

                  <?php 
                      $visitor_total_sql = "SELECT COUNT(brows_date) FROM visitor";
                      $visitor_query = mysqli_query($con,$visitor_total_sql);
                      $visitor_row = mysqli_fetch_assoc($visitor_query);
                  ?>

                  <div class="col-xs-9 text-right">
                    <div class="huge"><?php echo $visitor_row['COUNT(brows_date)'];?></div>
                    <div>Total Visitor</div>
                  </div>
                </div>
              </div>
              <a href="dashboard">
                <div class="panel-footer">
                  <span class="pull-left">Refresh</span>
                  <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                  <div class="clearfix"></div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <!-- /.row -->
        <div class="row">
                      <div class="col-lg-8">
            <!-- /.panel -->
            <div class="panel panel-default">
              <div class="panel-heading">
                <i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
                <div class="pull-right">
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                      Actions
                      <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                      <li><a href="#">Action</a>
                      </li>
                      <li><a href="dashboard">Refresh</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- /.panel-heading -->

              <!-- /.panel-body -->
                <canvas id="myChart" style="height: 370px; width: 100%;"></canvas>  
              <!-- /.panel-body -->
            </div>


          <?php 
            $visitor_date_sql = "SELECT DISTINCT brows_date FROM visitor ORDER BY id DESC LIMIT 9";
            $visitor_date_query = mysqli_query($con,$visitor_date_sql);

            foreach($visitor_date_query as $data){
              $date[] = $data['brows_date'];
            }

            $sql = "SELECT brows_date, COUNT(brows_date) AS  cout FROM visitor GROUP BY brows_date ORDER BY COUNT(brows_date) DESC";
            $query = mysqli_query($con,$sql);
            

            while($row = mysqli_fetch_array($query)){
              $count[] = $row['cout'];
            }

            
            
          ?>

            <script>
              const ctx = document.getElementById('myChart');

              new Chart(ctx, {
                type: 'bar',
                data: {
                  labels: <?php echo json_encode($date); ?>,
                  datasets: [{
                    label: 'Visitor Chart',
                    data:<?php echo json_encode($count);?>,
                    borderWidth: 1
                  }]
                },
                options: {
                  scales: {
                    y: {
                      beginAtZero: true
                    }
                  }
                }
              });
            </script>



            <!-- /.panel -->
          </div>
          <!-- /.col-lg-8 -->
          <div class="col-lg-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <i class="fa fa-bell fa-fw"></i> Notifications Panel
              </div>
              <!-- /.panel-heading -->
              <div class="panel-body">
                
                <div class="list-group">

                  <a href="message" class="list-group-item">
                    <i class="fa fa-envelope fa-fw"></i> <?php echo $message_row['COUNT(id)'];?> Message 
                    <span class="pull-right text-muted small"><em>Total Message</em>
                    </span>
                  </a>

                  <a href="review" class="list-group-item">
                    <i class="fa fa-tasks fa-fw"></i> <?php echo $review_row['COUNT(id)'];?> review
                    <span class="pull-right text-muted small"><em>All review</em>
                    </span>
                  </a>

                  <a href="packages" class="list-group-item">
                    <i class="fa fa-user fa-fw"></i> <?php echo $packages_row['COUNT(id)'];?> packages
                    <span class="pull-right text-muted small"><em>All packages</em>
                    </span>
                  </a>

                  <a href="dashboard" class="list-group-item">
                    <i class="fa fa-eye fa-fw"></i> <?php echo $visitor_row['COUNT(brows_date)'];?> Visitor
                    <span class="pull-right text-muted small"><em>All Visitor</em>
                    </span>
                  </a>

                  <a href="dashboard" class="list-group-item">
                    <i class="fa fa-tasks fa-fw"></i> Dashboard page
                    <span class="pull-right text-muted small"><em>Yesterday</em>
                    </span>
                  </a>
                </div>
                <!-- /.list-group -->
                <a class="btn btn-default btn-block">View All Alerts</a>
              </div>
              <!-- /.panel-body -->
            </div>
          </div>
        </div>
      </div>


    <?php include("include/footer.php");?>