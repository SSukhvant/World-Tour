  <?php include('include/header.php'); ?>
  <?php 
    $sql = "SELECT * FROM banner ORDER BY id DESC";
    $result = mysqli_query($con,$sql);
  ?>

    <div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Banner Page</h2>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>Title</th>
                                  <th>Content</th>
                                  <th>Background Image</th>
                                  <th>Action</th>
                                </thead>
                                <tbody>
                                  <?php while($row = mysqli_fetch_assoc($result)) {?>
                                    <tr>
                                      <td><?php echo substr($row['title'],0,20);?></td>
                                      <td><?php echo substr($row['content'],0,20);?></td>
                                      <td><img src="image/<?php echo $row['image'];?>" style="width:150px;"></td>
                                      <td>
                                        <a href="banner-update.php?id=<?php echo $row['id'];?>" class=""><i class="fa fa-edit" aria-hidden="true"></i></a>
                                      </td>
                                    </tr>
                                  <?php }?>
                                </tbody>
                                
                              </table>
                              
                            </div>
                          </div>

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

  