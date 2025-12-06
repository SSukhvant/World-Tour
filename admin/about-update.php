  <?php include('include/header.php'); ?>
  <?php 
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT * FROM about WHERE id='$id'";
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
                        <h2>About Update Page</h2>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                              <form action="sql/about.php?id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">

                                <div class="row">
                                  <div class="col-md-8">
                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <input type="text" required name="title" value="<?php echo $row['title'];?>" class="form-control" placeholder="Title">
                                  </div><br>

                                  <div class="mb-3">
                                    <label for="exampleFormControlTextarea1" class="form-label">Content</label>
                                    <textarea name="content" placeholder="content" class="form-control" rows="4"><?php echo $row['content'];?></textarea>
                                  </div><br>

                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Phone</label>
                                    <input type="text" required name="phone" value="<?php echo $row['phone'];?>" class="form-control" placeholder="Phone">
                                  </div><br>

                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                                    <input type="text" required name="email" value="<?php echo $row['email'];?>" class="form-control" placeholder="Email">
                                  </div><br>

                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Location</label>
                                    <input type="text" required name="location" value="<?php echo $row['location'];?>" class="form-control" placeholder="Location">
                                  </div><br>

                                  <div class="mb-3">
                                    <img width="100" src="image/<?php echo $row['about_image'];?>"><br><br>
                                    <label for="exampleFormControlInput1" class="form-label">About Image</label>
                                    <input type="file" name="image">
                                  </div><br>

                                  <div class="mb-3">
                                    <img width="100" src="image/<?php echo $row['logo'];?>"><br><br>
                                    <label for="exampleFormControlInput1" class="form-label">Logo</label>
                                    <input type="file" name="logo">
                                  </div><br>

                                <input type="submit" class="form-control btn btn-primary" value="Update" name="about_update"><br><br><br><br>
                            </div>
                          </div>

                          <script>
                            CKEDITOR.replace('content', {
                              height: 200,
                            });
                          </script>

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

  