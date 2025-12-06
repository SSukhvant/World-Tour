<?php include('include/header.php'); ?>
<?php 
    $item_sql = "SELECT * FROM item ORDER BY id DESC";
    $item_result = mysqli_query($con,$item_sql);
    
?>
<div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <a data-toggle="modal" data-target="#additem" href="" class="btn btn-info btn-sm">Add item</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                
                            <?php while($item_row = mysqli_fetch_assoc($item_result)){ ?>
                                <tbody>
                                    <tr>
                                        <td><img width="80" src="image/<?php echo $item_row['image'];?>"></td>
                                        <td class="text-center">
                                            <a href="item-update.php?id=<?php echo $item_row['id'];?>"><i class="fa fa-edit" aria-hidden="true"></i></a>&nbsp; &nbsp;&nbsp;
                                            <a onclick="return confirm('Are you sure')" href="sql/item.php?delete_item_id=<?php echo $item_row['id'];?>">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            <?php }?>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>

            <!-- item Modal  Add -->
            <div class="modal fade" id="additem" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Add item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form method="post" action="sql/item.php" enctype="multipart/form-data">

                      <div class="form-group">
                        <label for="counter">Image</label>
                        <input required type="file" name="image">
                      </div>
                    
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="item_add" class="btn btn-primary">Add Now</button>
                      </div>
                  </form>
                </div>
              </div>
            </div>
</div>
    </div>
  <?php include('include/footer.php'); ?>