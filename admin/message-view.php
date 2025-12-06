  <?php 
      include("include/header.php");

      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM message WHERE id='$id'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
      }
  ?>

    <div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            
            <!-- /.col-lg-6 -->
            <div class="col">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <a href="message" class="btn btn-info btn-sm">back</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                       
                       <form">

                         <div class="row">
                            <div class="col-md-12">

                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Name</label>
                                <input type="text" value="<?= $row['name'];?>" name="title" value="" class="form-control" disabled>
                              </div><br>

                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Email</label>
                                <input type="text" value="<?= $row['email'];?>" class="form-control" disabled>
                              </div><br>

                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Number</label>
                                <input type="text" value="<?= $row['subject'];?>" class="form-control" disabled>
                              </div><br>

                              <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Query</label>
                                <textarea name="content" class="form-control"><?php echo $row['message'];?></textarea>
                              </div><br>

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