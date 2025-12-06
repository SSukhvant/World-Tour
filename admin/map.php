  <?php include('include/header.php'); ?>
  <?php 
         $sql = "SELECT * FROM map";
         $result = mysqli_query($con,$sql);
         $row = mysqli_fetch_assoc($result);

    ?>

    <div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Map Page Update</h2>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                          <form action="sql/map.php?id=<?php echo $row['id'];?>" method="post">

                            <div class="row">
                              <div class="col-md-12">

                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Embed map link</label>
                                <textarea type="text" rows="6" value="" required name="map_link" class="form-control" placeholder="Map link"><?php echo $row['map_link'];?></textarea>
                                
                              </div><br>

                            <input type="submit" class="form-control btn btn-primary" value="Update Now" name="map_update">
                        </div>
                      </div>

                      </form><br><br><br>

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

  