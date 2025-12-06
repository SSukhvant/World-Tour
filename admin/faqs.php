  <?php include('include/header.php'); ?>
    <?php
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
        }

        $per_page = 9;
        $start_page = ($page-1)*9; 
        $faqs_sql = "SELECT * FROM faqs ORDER BY id DESC LIMIT $start_page,$per_page";
        $faqs_result = mysqli_query($con,$faqs_sql);
        
    ?>

    <div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="mb-0">All FAQ</h6>
                        <a href="faqs-add" class="btn btn-primary btn-sm">Add FAQ</a>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                          <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Title</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php while($faqs_row = mysqli_fetch_assoc($faqs_result)) {?>
                                    <tr>
                                        <td><?php echo substr($faqs_row['title'],0,20);?></td>
                                        <td>

                                            <a href="faqs-update.php?id=<?php echo $faqs_row['id'];?>">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>

                                            &nbsp;&nbsp;
                                            <a onclick="return confirm('Are you sure delete category')" href="sql/support.php?faqs_delete_id=<?php echo $faqs_row['id'];?>">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                            </table>
                            <br>
                             <center>
                                
                            
                                <?php
                                  $per_page_query = "SELECT * FROM faqs";
                                  $per_page_result = mysqli_query($con,$per_page_query);
                                  $total_record = mysqli_num_rows($per_page_result);
                                  $total_page = ceil($total_record/$per_page);


                                  if($page>1){
                                    echo "<a href='faqs.php?page=".($page-1)."'>Previous</a>";
                                  }

                                  for($i=1; $i<$total_page; $i++){
                                    echo "<a href='faqs.php?page=".$i."' style='color:red; padding:10px 5px;'>$i</a>";
                                  }
                                  if($i>$page){
                                    echo "<a href='faqs.php?page=".($page+1)."'>Next</a>";
                                  }
                                ?>
                          </center>
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
