  <?php include('include/header.php'); ?>
  <?php 
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT * FROM socialmedia WHERE id='$id'";
      $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_assoc($result);
    }
  ?>

    <div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Social Media Update Page</h2>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                              <form action="sql/socialmedia.php?id=<?php echo $row['id'];?>" method="post">

                                <div class="row">
                                  <div class="col-md-8">
                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Facebook</label>
                                    <input type="text" required name="facebook" value="<?php echo $row['facebook'];?>" class="form-control" placeholder="Facebook">
                                  </div><br>

                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Twitter</label>
                                    <input type="text" required name="twitter" value="<?php echo $row['twitter'];?>" class="form-control" placeholder="Twitter">
                                  </div><br>

                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Instagram</label>
                                    <input type="text" required name="instagram" value="<?php echo $row['instagram'];?>" class="form-control" placeholder="Instagram">
                                  </div><br>

                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Linkedin</label>
                                    <input type="text" required name="linkedin" value="<?php echo $row['linkedin'];?>" class="form-control" placeholder="linkedin">
                                  </div><br>

                                <input type="submit" class="form-control btn btn-primary" value="Update Now" name="socialmedia_update"><br><br><br><br>
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

            

            
       
        </div>
    </div>
</div>

  <?php include('include/footer.php'); ?>

  