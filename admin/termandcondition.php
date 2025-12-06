  <?php include('include/header.php'); ?>
    <?php
        if(isset($_GET['page'])){
          $page = $_GET['page'];
        }else{
          $page = 1;
        }

        $per_page = 9;
        $start_page = ($page-1)*9; 
        $termandcondition_sql = "SELECT * FROM termandcondition ORDER BY id DESC LIMIT $start_page,$per_page";
        $termandcondition_result = mysqli_query($con,$termandcondition_sql);
        
    ?>

    <div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="mb-0">Term And Condition</h6>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                          <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Term And Condition</th>
                                    <th scope="col">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php while($termandcondition_row = mysqli_fetch_assoc($termandcondition_result)) {?>
                                    <tr>
                                        <td><?php echo substr($termandcondition_row['description'],0,20);?></td>
                                        <td>

                                            <a href="termandcondition-update.php?id=<?php echo $termandcondition_row['id'];?>">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>

                                            &nbsp;&nbsp;
                                            
                                        </td>
                                    </tr>
                                <?php }?>
                            </tbody>
                            </table>
                            <br>
                             <center>
                                
                            
                                <?php
                                  $per_page_query = "SELECT * FROM termandcondition";
                                  $per_page_result = mysqli_query($con,$per_page_query);
                                  $total_record = mysqli_num_rows($per_page_result);
                                  $total_page = ceil($total_record/$per_page);


                                  if($page>1){
                                    echo "<a href='termandcondition.php?page=".($page-1)."'>Previous</a>";
                                  }

                                  for($i=1; $i<$total_page; $i++){
                                    echo "<a href='termandcondition.php?page=".$i."' style='color:red; padding:10px 5px;'>$i</a>";
                                  }
                                  if($i>$page){
                                    echo "<a href='termandcondition.php?page=".($page+1)."'>Next</a>";
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
