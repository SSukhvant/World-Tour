  <?php include('include/header.php'); ?>
    <?php
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
        }

        $per_page = 9;
        $start_page = ($page-1)*9; 
        $message_sql = "SELECT * FROM message ORDER BY id DESC LIMIT $start_page,$per_page";
        $message_result = mysqli_query($con,$message_sql);
        
    ?>

    <div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="mb-0">All Message</h6>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                          <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Date</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php while($message_row = mysqli_fetch_assoc($message_result)) {?>
                                    <tr>
                                        <td><?php echo date('Y-m-d', strtotime($message_row['date']));;?></td>
                                        <td><?php echo substr($message_row['name'],0,20);?></td>
                                        <td><?php echo substr($message_row['email'],0,20);?></td>
                                        <td>

                                            <a href="message-view.php?id=<?php echo $message_row['id'];?>">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>

                                            &nbsp;&nbsp;
                                            <a onclick="return confirm('Are you sure delete category')" href="sql/message.php?message_delete_id=<?php echo $message_row['id'];?>">
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
                                  $per_page_query = "SELECT * FROM message";
                                  $per_page_result = mysqli_query($con,$per_page_query);
                                  $total_record = mysqli_num_rows($per_page_result);
                                  $total_page = ceil($total_record/$per_page);


                                  if($page>1){
                                    echo "<a href='message.php?page=".($page-1)."'>Previous</a>";
                                  }

                                  for($i=1; $i<$total_page; $i++){
                                    echo "<a href='message.php?page=".$i."' style='color:red; padding:10px 5px;'>$i</a>";
                                  }
                                  if($i>$page){
                                    echo "<a href='message.php?page=".($page+1)."'>Next</a>";
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
