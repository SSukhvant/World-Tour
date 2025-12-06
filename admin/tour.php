<?php include('include/header.php'); ?>

<div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-8">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a href="tour-add" class="btn btn-info btn-sm">Add tour</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Category</th>
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

                                    $tour_sql = "SELECT * FROM tour ORDER BY id DESC LIMIT $start,$show";
                                    $tour_result = mysqli_query($con,$tour_sql);
                                ?>
                            <?php while($tour = mysqli_fetch_assoc($tour_result)){ ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo substr($tour['title'],0,20);?></td>
                                        <td><?php echo substr($tour['content'],0,20);?></td>
                                        <td><?php echo substr($tour['category'],0,20);?></td>
                                        <td><img width="80" src="image/<?php echo $tour['image'];?>"></td>
                                        <td class="text-center">
                                            <a href="tour-update?id=<?php echo $tour['id'];?>"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp; &nbsp;&nbsp;
                                            <a onclick="return confirm('Are you sure')" href="sql/tour?delete_tour_id=<?php echo $tour['id'];?>">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php }?>


                            

                            </table>
                            <center>
                              <?php
                                $par_page_query = "SELECT * FROM tour";
                                $per_page_reg = mysqli_query($con,$par_page_query);
                                $total_record = mysqli_num_rows($per_page_reg);
                                $total_page = ceil($total_record/$show);


                                if($page>1){
                                    echo "<a style='padding:5px 5px;' href='tour?page=".($page-1)."'>Previous</a>";
                                  }


                                  for($i=1; $i<$total_page; $i++){
                                    echo "<a href='tour?page=".$i."' style=padding:5px 5px;'>$i</a>";
                                  }

                                  if($i>$page){
                                    echo "<a style='padding:5px 5px;' href='tour?page=".($page+1)."'>Next</a>";
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
                       <a data-toggle="modal" data-target="#blogcategory" href="" class="btn btn-info btn-sm">Add tour Category</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <?php 
                                    $category_sql = "SELECT * FROM tour_category ORDER BY id DESC";
                                    $category_result = mysqli_query($con,$category_sql);
                                    
                                ?>
                            <?php while($category_row = mysqli_fetch_assoc($category_result)){ ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $category_row['title'];?></td>
                                        <td class="text-center">
                                            <a onclick="return confirm('Are you sure')" href="sql/tour.php?delete_category_id=<?php echo $category_row['id'];?>">
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Add Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="sql/tour.php">
                      <div class="form-group">
                        <label for="icon">Category</label>
                        <input type="text" name="category" class="form-control" placeholder="Add Category">
                      </div>
                  </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="category_submit" class="btn btn-primary">Add Category</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
            </div>
        </div>
    </div>
  <?php include('include/footer.php'); ?>