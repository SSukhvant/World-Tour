  <?php include('include/header.php'); ?>
  <?php 
    $sql = "SELECT * FROM socialmedia ORDER BY id DESC";
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
                        <h2>Social Media Page</h2>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                          <table class="table table-hover table-striped">
                            <thead>
                              <tr>
                                <th scope="col">Facebook</th>
                                <th scope="col">Twitter</th>
                                <th scope="col">Instagram</th>
                                <th scope="col">Linkedin</th>
                                <th scope="col">Action</th>
                            </thead>
                            <tbody>
                              <tr>
                                <td><?php echo substr($row['facebook'],0,20);?>....</td>
                                <td><?php echo substr($row['twitter'],0,20);?>....</td>
                                <td><?php echo substr($row['instagram'],0,20);?>....</td>
                                <td><?php echo substr($row['linkedin'],0,20);?>....</td>      
                                <td>
                                  <a href="socialmedia-update?id=<?php echo $row['id'];?>"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp;&nbsp;
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

  