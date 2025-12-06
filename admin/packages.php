<?php include('include/header.php'); ?>

<div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="packages-add" class="btn btn-info btn-sm">Add packages</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        
                                        <th>Price</th>
                                        <th>Time</th>
                                        <th>Content</th>
                                        <!--<th>Thumbnail Image</th>-->
                                        <th>Status ( Max 3)</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                    if(isset($_GET['page'])){
                                        $page = $_GET['page'];
                                      }else{
                                        $page = 1;
                                      }
                                    $show = 12;
                                    $start = ($page-1)*12;

                                    $packages_sql = "SELECT * FROM packages ORDER BY id DESC LIMIT $start,$show";
                                    $packages_result = mysqli_query($con,$packages_sql);
                                ?>
                            <?php while($packages = mysqli_fetch_assoc($packages_result)){ ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo substr($packages['title'],0,20);?></td>
                                        <td><?php echo substr($packages['price'],0,20);?></td>
                                        <td><?php echo substr($packages['time'],0,20);?></td>
                                        <td><?php echo substr($packages['content'],0,20);?></td>
                                        <td>
                                            <?php $packages_id = $packages['id']; ?>
                                            <?php 
                                                if(isset($_POST['status_submit'])){
                                                  $status = $_POST['status'];
                                                  $status_id = $_GET['status_id'];
                                                  
                
                                                  $status_sql = "UPDATE packages SET status ='$status' WHERE id='$status_id'";
                                                  $status_query = mysqli_query($con,$status_sql);
                                                  if($status_query){
                                                    echo "
                                                      <script>window.location.href='packages.php'</script>
                                                    ";
                                                  }
                                                }
                                              ?>
                
                                              <?php 
                                                  $status_sql = "SELECT * FROM status";
                                                  $status_query = mysqli_query($con,$status_sql);
                                                ?>

                                              <form action="<?php echo $_SERVER['PHP_SELF'];?>?status_id=<?php echo $packages_id;?>" method="post">
                                                <select class="" name="status">
                                                  <?php while($status_row = mysqli_fetch_assoc($status_query)) { ?>
                 
                                                    <?php if($status_row['title'] == $packages['status']){ ?>

                                                      <option selected value="<?php echo $status_row['title'];?>"><?php echo $status_row['title'];?></option>

                                                    <?php }else{ ?>

                                                      <option value="<?php echo $status_row['title'];?>"><?php echo $status_row['title'];?></option>

                                                    <?php }?>

                                                    
                                                  <?php }?>
                                                </select>
                                                <button type="submit" name="status_submit"><i class="fa fa-save"></i></button>
                                              </form>  

                                        </td>
                                        <td><img width="80" src="image/<?php echo $packages['image1'];?>"></td>
                                        <!--<td><img width="80" src="image/<?php echo $packages['image2'];?>"></td>-->
                                        <!--<td><video width="80" controls><source src="image/<?php echo $packages['image3'];?>" type="video/mp4"></video></td>-->
                                        <td class="text-center">
                                            <a href="packages-update?id=<?php echo $packages['id'];?>"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp; &nbsp;&nbsp;
                                            <a onclick="return confirm('Are you sure')" href="sql/packages?delete_packages_id=<?php echo $packages['id'];?>">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php }?>


                            

                            </table>
                            <center>
                              <?php
                                $par_page_query = "SELECT * FROM packages";
                                $per_page_reg = mysqli_query($con,$par_page_query);
                                $total_record = mysqli_num_rows($per_page_reg);
                                $total_page = ceil($total_record/$show);


                                if($page>1){
                                    echo "<a style='padding:5px 5px;' href='packages?page=".($page-1)."'>Previous</a>";
                                  }


                                  for($i=1; $i<$total_page; $i++){
                                    echo "<a href='packages?page=".$i."' style=padding:5px 5px;'>$i</a>";
                                  }

                                  if($i>$page){
                                    echo "<a style='padding:5px 5px;' href='packages?page=".($page+1)."'>Next</a>";
                                  }

                                ?>
                          </center>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

            <!-- /.col-lg-6 -->
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <a data-toggle="modal" data-target="#blogcategory" href="" class="btn btn-info btn-sm">Add Section</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <?php 
                                    $time_sql = "SELECT * FROM time ORDER BY id DESC";
                                    $time_result = mysqli_query($con,$time_sql);
                                    
                                ?>
                            <?php while($time_row = mysqli_fetch_assoc($time_result)){ ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $time_row['title'];?></td>
                                        <td class="text-center">
                                            <a onclick="return confirm('Are you sure')" href="sql/packages.php?delete_time_id=<?php echo $time_row['id'];?>">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php }?>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->

            <!-- Modal -->
            <div class="modal fade" id="blogcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="sql/packages.php">
                      <div class="form-group">
                        <label for="icon">Section</label>
                        <input type="text" name="title" class="form-control" placeholder="Add Section">
                      </div>
                  </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="time_submit" class="btn btn-primary">Add Section</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
    </div>
  <?php include('include/footer.php'); ?>