  <?php include('include/header.php');?>
  <?php 
     if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT * FROM banner WHERE id='$id'";
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
                        <h2>Banner Update Page</h2>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                              <form action="sql/banner.php?id=<?php echo $row['id'];?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                  <div class="col-md-8">
                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <input type="text" required name="title" value="<?php echo $row['title'];?>" class="form-control" placeholder="Title">
                                  </div><br>

                                  <div class="mb-3">
                                    <label for="exampleFormControlInput1" class="form-label">Title</label>
                                    <textarea type="text" required name="content" class="form-control" rows="6"><?php echo $row['content'];?></textarea>
                                  </div><br>

                                  <div class="mb-3">
                                    <img width="100" src="image/<?php echo $row['image'];?>"><br><br>
                                    <label for="exampleFormControlInput1" class="form-label">Upload image 1920 X 1080</label>
                                    <input type="file" name="image">
                                  </div><br>

                                <input type="submit" class="form-control btn btn-primary" value="Update Now" name="banner_update">
                            </div>
                          </div>
                          </form>
                          <br><br><br>
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

