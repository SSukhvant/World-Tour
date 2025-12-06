  <?php 
    include('include/header.php'); 
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT * FROM faqs WHERE id='$id'";
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
                        <h6 class="mb-4">Update faq</h6>
                        <a href="faqs" class="btn btn-primary btn-sm">Back</a><br><br>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                              <form action="sql/support.php?id=<?php echo $row['id'];?>" method="post">
                                <div class="form-floating mb-3">
                                    <input value="<?php echo $row['title'];?>" type="text" name="title" class="form-control" id="floatingInput"
                                        placeholder="faqs Title">
                                    <label for="floatingInput">faqs Title</label>
                                </div>

                                <div class="form-floating">
                                    <textarea id="description" value="<?php echo $row['description'];?>" name="description" class="form-control" placeholder="Leave a comment here"
                                     style="height: 300px;" cols="10" rows="10"><?php echo $row['description'];?>  </textarea>    
                                </div><br>
                                <button class="btn btn-primary w-100 m-2" name="update_faqs" type="submit">Update Now</button>
                              </form>


                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

            <script>
              CKEDITOR.replace('description', {
                height: 300,
              });
            </script>

            
       
        </div>
    </div>
</div>

  <?php include('include/footer.php'); ?>

  