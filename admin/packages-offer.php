<?php include('include/header.php'); ?>

<div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
        <div class="row">
             <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <a href="" disabled="disabled" class="btn btn-info btn-sm">Packages Offer</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <?php 
                                    $offer_sql = "SELECT * FROM offer ORDER BY id DESC";
                                    $offer_result = mysqli_query($con,$offer_sql);
                                    
                                ?>
                            <?php while($offer_row = mysqli_fetch_assoc($offer_result)){ ?>
                                <tbody>
                                    <tr>
                                        <td><?php echo $offer_row['title'];?></td>
                                        <td class="text-center">
                                            <a data-toggle="modal" data-target="#blogcategory" href="">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php } { ?>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-6 -->

            <!-- Modal -->
            <div class="modal fade" id="blogcategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Update Section</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    
                    <?php 
                        $offer_sql = "SELECT * FROM offer ORDER BY id DESC";
                        $offer_result = mysqli_query($con,$offer_sql);
                        $offer_row = mysqli_fetch_assoc($offer_result)
                    ?>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="sql/packages.php">
                      <div class="form-group">
                        <label for="icon">Section</label>
                        <input type="text" name="title" value="<?php echo $offer_row['title'];?>" class="form-control" placeholder="Update Offer">
                      </div>
                  </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="offer_submit" class="btn btn-primary">Update Offer</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
            
            <?php }?>
        </div>
    </div>
    
</div>

<?php include('include/footer.php'); ?>