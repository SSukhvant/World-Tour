  <?php include('include/header.php'); ?>
  <?php 
    $sql = "SELECT * FROM about ORDER BY id DESC";
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
                        <h2>About Page</h2>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Content</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Email</th>
                                <th scope="col">Location</th>
                                <th scope="col">About Image</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?php echo substr($row['title'],0,20);?>....</td>
                                <td><?php echo substr($row['content'],0,20);?>....</td>
                                <td><?php echo $row['phone'];?></td>
                                <td><?php echo $row['email'];?></td>
                                <td><?php echo $row['location'];?></td>
                                <td><img width="80" src="image/<?php echo $row['about_image'];?>"></td>
                                <td><img width="80" src="image/<?php echo $row['logo'];?>"></td>       
                                <td>
                                  <a href="about-update?id=<?php echo $row['id'];?>"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                </td>
                              </tr>
                            </tbody>

                          </table>

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

  