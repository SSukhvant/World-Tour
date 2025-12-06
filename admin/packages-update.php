  <?php 
      include("include/header.php");

      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM packages WHERE id='$id'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
      }
  ?>

  <?php
$id = $_GET['id'];  // get package id from URL

$package_sql = "SELECT * FROM packages WHERE id = '$id'";
$package_query = mysqli_query($con, $package_sql);

$packages_row = mysqli_fetch_assoc($package_query);
?>


    <div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            
            <!-- /.col-lg-6 -->
            <div class="col">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <a href="packages" class="btn btn-info btn-sm">back</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                       
                       <form action="sql/packages?id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">

                         <div class="row">
                            <div class="col-md-12">

                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Title</label>
                                <input type="text" value="<?= $row['title'];?>" required name="title" value="" class="form-control" placeholder="title">
                              </div><br>

                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                                <textarea name="content" value="<?php echo $row['content'];?>"><?php echo $row['content'];?></textarea>
                              </div><br>

                              <div class="mb-3">
  <label class="form-label">Destination</label>
  <input type="text" required name="destination" 
         value="<?php echo $packages_row['destination']; ?>" 
         class="form-control">
</div><br>

<div class="mb-3">
  <label class="form-label">Category</label>
  <select name="category" class="form-control" required>
    <option value="Domestic" <?php if($packages_row['category']=="Domestic") echo "selected"; ?>>Domestic</option>
    <option value="International" <?php if($packages_row['category']=="International") echo "selected"; ?>>International</option>
  </select>
</div><br>

<div class="mb-3">
  <label class="form-label">Best Travel Month</label>
  <select name="travel_month" class="form-control" required>
    <?php 
      $months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
      foreach($months as $m){
        $sel = ($packages_row['travel_month'] == $m) ? "selected" : "";
        echo "<option value='$m' $sel>$m</option>";
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
                                
                                  <?php while($packages_category_row = mysqli_fetch_assoc($packages_category_query)){ ?>
                                      <?php if($packages_category_row['title'] == $row['time']){ ?>
                                    <option selected value="<?php echo $packages_category_row['title'];?>"><?php echo $packages_category_row['title'];?></option>

                                  <?php }else{?>
                                      <option value="<?php echo $packages_category_row['title'];?>"><?php echo $packages_category_row['title'];?></option>
                                  <?php }?>
                                  <?php }?>
                                </select>
                              </div><br>

                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Price</label>
                                <input type="text" value="<?= $row['price'];?>" required name="price" value="" class="form-control" placeholder="Price">
                              </div><br>

                              <div class="mb-3">
                                <img width="100" src="image/<?php echo $row['image1'];?>"><br>
                                <label for="exampleFormControlInput1" class="form-label">Image (' jpg, jpeg, png, gif ' )</label>
                                <input type="file" name="image1">
                              </div><br>


                              <!--<div class="mb-3">-->
                              <!--  <img width="100" src="image/<?php echo $row['image2'];?>"><br>-->
                              <!--  <label for="exampleFormControlInput1" class="form-label">Update Image (' jpg, jpeg, png, gif ')</label>-->
                              <!--  <input type="file" name="image2">-->
                              <!--</div><br>-->

                              <!--<div class="mb-3">-->
                              <!--  <video width="80" controls><source src="image/<?php echo $row['image3'];?>" type="video/mp4"></video><br>-->
                              <!--  <label for="exampleFormControlInput1" class="form-label">Upload Video (' mp4, avi, mov, wmv ')</label>-->
                              <!--  <input type="file" name="image3">-->
                              <!--</div><br>-->

                            <input type="submit" class="form-control btn btn-primary" value="Update Now" name="update_packages">
                        </div>
                      </div>

                      </form> 
                        
                    </div><br><br>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            
            </div>
        </div>
    </div>
    <script>
    CKEDITOR.replace('content', {
      height: 300,
    });
  </script>
  <?php include('include/footer.php'); ?>