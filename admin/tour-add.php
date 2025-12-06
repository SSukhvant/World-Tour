  <?php include('include/header.php'); ?>

    <div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Tour Add Page</h2>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                              <form action="sql/tour" method="post" enctype="multipart/form-data">

                                 <div class="row">
                                    <div class="col-md-12">

                                      <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Title</label>
                                        <input type="text" required name="title" value="" class="form-control" placeholder="title">
                                      </div><br>

                                      <div class="mb-3">
                                        <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                                        <textarea name="content"></textarea>
                                      </div><br>

                                      
                                    <?php
                                      $tour_category_sql = "SELECT * FROM tour_category";
                                      $tour_category_query = mysqli_query($con,$tour_category_sql);
                                    ?>

                                      <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">tourCategory</label>
                                        
                                        <select name="category" class="form-control">
                                        <option value="0">tour Category</option>
                                          <?php while($tour_category_row = mysqli_fetch_assoc($tour_category_query)){ ?>
                                              
                                            <option value="<?php echo $tour_category_row['title'];?>"><?php echo $tour_category_row['title'];?></option>
                                         
                                          <?php }?>
                                        </select>
                                      </div><br>

                                      <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Thumbnail Image 1024 X 768</label>
                                        <input required type="file" name="image">
                                      </div><br>

                                      <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Video 1920 X 1080</label>
                                        <input required type="file" name="video">
                                      </div><br>

                                    <input type="submit" class="form-control btn btn-primary" value="Add tour" name="add_tour"> <br><br>
                                </div>
                              </div>

                              </form>


                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

            <script>
              CKEDITOR.replace('content', {
                height: 300,
              });
            </script>

            
       
        </div>
    </div>
</div>

  <?php include('include/footer.php'); ?>

  