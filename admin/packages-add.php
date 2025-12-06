  <?php include('include/header.php'); ?>

    <div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Packages Add Page</h2>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                              <form action="sql/packages" method="post" enctype="multipart/form-data">

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

<!-- NEW FIELD: Destination -->
<div class="mb-3">
  <label class="form-label">Destination</label>
  <input type="text" required name="destination" class="form-control" placeholder="Thailand / Vietnam / Goa / etc.">
</div><br>

<!-- NEW FIELD: Category -->
<div class="mb-3">
  <label class="form-label">Category</label>
  <select name="category" class="form-control" required>
    <option value="">Select</option>
    <option value="Domestic">Domestic</option>
    <option value="International">International</option>
  </select>
</div><br>

<!-- NEW FIELD: Travel Month -->
<div class="mb-3">
  <label class="form-label">Best Travel Month</label>
  <select name="travel_month" class="form-control" required>
    <option value="">Select Month</option>
    <?php 
      $months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
      foreach($months as $m){
          echo "<option value='$m'>$m</option>";
      }
    ?>
  </select>
</div><br>

                                      
                                    <?php 
                                      $packages_category_sql = "SELECT * FROM time";
                                      $packages_category_query = mysqli_query($con,$packages_category_sql);
                                    ?>

                                      <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Select</label>
                                        
                                        <select name="time" class="form-control">
                                        <option value="0">Select</option>
                                          <?php while($packages_category_row = mysqli_fetch_assoc($packages_category_query)){ ?>
                                              
                                            <option value="<?php echo $packages_category_row['title'];?>"><?php echo $packages_category_row['title'];?></option>

                                         
                                          <?php }?>
                                        </select>
                                      </div><br>


                                      <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Price</label>
                                        <input type="text" required name="price" value="" class="form-control" placeholder="Price">
                                      </div><br>

                                      <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Image (' jpg, jpeg, png, gif ')</label>
                                        <input required type="file" name="image1">
                                      </div><br>

                                      <!--<div class="mb-3">-->
                                      <!--  <label for="exampleFormControlInput1" class="form-label">Image (' jpg, jpeg, png, gif ')</label>-->
                                      <!--  <input required type="file" name="image2">-->
                                      <!--</div><br>-->

                                      <!--<div class="mb-3">-->
                                      <!--  <label for="exampleFormControlInput1" class="form-label">Video (' mp4, avi, mov, wmv ')</label>-->
                                      <!--  <input required type="file" name="image3">-->
                                      <!--</div><br>-->


                                    <input type="submit" class="form-control btn btn-primary" value="Add packages" name="add_packages"> <br><br>
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

  