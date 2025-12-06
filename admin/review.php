<?php include('include/header.php'); ?>

<div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="modal" data-target="#addreview" href="" class="btn btn-info btn-sm">Add review</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Content</th>
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

                                    $review_sql = "SELECT * FROM review ORDER BY id DESC LIMIT $start,$show";
                                    $review_result = mysqli_query($con,$review_sql);
                                ?>
                            <?php while($review = mysqli_fetch_assoc($review_result)){ ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo substr($review['name'],0,20);?></td>
                                        <td><?php echo substr($review['content'],0,20);?></td>
                                        <td><img width="80" src="image/<?php echo $review['image'];?>"></td>
                                        <td class="text-center">
                                            <a href="review-update?id=<?php echo $review['id'];?>"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp; &nbsp;&nbsp;
                                            <a onclick="return confirm('Are you sure')" href="sql/review?delete_review_id=<?php echo $review['id'];?>">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php }?>


                            

                            </table>
                            <center>
                              <?php
                                $par_page_query = "SELECT * FROM review";
                                $per_page_reg = mysqli_query($con,$par_page_query);
                                $total_record = mysqli_num_rows($per_page_reg);
                                $total_page = ceil($total_record/$show);


                                if($page>1){
                                    echo "<a style='padding:5px 5px;' href='review?page=".($page-1)."'>Previous</a>";
                                  }


                                  for($i=1; $i<$total_page; $i++){
                                    echo "<a href='review?page=".$i."' style=padding:5px 5px;'>$i</a>";
                                  }

                                  if($i>$page){
                                    echo "<a style='padding:5px 5px;' href='review?page=".($page+1)."'>Next</a>";
                                  }

                                ?>
                          </center>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->

             <!-- team Modal  Add -->
            <div class="modal fade" id="addreview" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="sql/review.php" enctype="multipart/form-data">
                      <div class="form-group">
                        <label for="title">Name</label>
                        <input required type="text" name="name" class="form-control" placeholder="Name">
                      </div>

                      <div class="form-group">
                        <label for="title">Email</label>
                        <input required type="email" name="email" class="form-control" placeholder="Email">
                      </div>

                      <div class="form-group">
                        <label class="bmd-label-floating" >Designation</label>
                          <select required class="form-control" name="star">
                            <option value="">Select Star</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                          </select>
                      </div>

                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                        <textarea required class="form-control" name="content"></textarea>
                      </div><br>

                      <div class="form-group">
                        <label for="counter">Image</label>
                        <input type="file" name="image">
                      </div>
                    
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="review_add" class="btn btn-primary">Add Now</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
    <!-- Model End -->
                </div>
                <!-- /.panel -->



            </div>
            </div>
        </div>
    </div>
  <?php include('include/footer.php'); ?>