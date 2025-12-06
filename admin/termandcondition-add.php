  <?php include('include/header.php'); ?>

    <div id="page-wrapper">
    <br><br>
    <div class="container-fluid">
         <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h6 class="mb-4">Add Term And Condition</h6>
                        <a href="termandcondition" class="btn btn-primary btn-sm">Back</a><br><br>
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="table-responsive">

                              <form action="sql/support.php" method="post">
                                <div class="form-floating mb-3">
                                  <label for="floatingInput">Term and condition Title</label>
                                    <input type="text" name="title" class="form-control" id="floatingInput"
                                        placeholder="Title">
                                </div><br>

                                <div class="form-floating">
                                    <textarea id="description" name="description" class="form-control" placeholder="Leave a description here"
                                     style="height: 300px;" cols="10" rows="10"></textarea>  
                                </div><br>
                                <button class="btn btn-primary w-100 m-2" name="termandcondition_add" type="termandcondition_add">Add Now</button>
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

  