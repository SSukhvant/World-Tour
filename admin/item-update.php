  <?php 
      include("include/header.php");

      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM item WHERE id='$id'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
      }
  ?>

    <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Update Page</h1>
            <a href="item" class="btn btn-info btn-sm">Back</a><br><br>
          </div>
        </div>

      <form action="sql/item.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
          
        <div class="row">
            <div class="col-md-12">

            <div class="mb-3">
              <img width="100" src="image/<?php echo $row['image'];?>"><br>
              <label for="exampleFormControlInput1" class="form-label">Upload image</label>
              <input type="file" name="image">
            </div><br>

          <input type="submit" class="btn btn-primary" value="submit" name="item_update">
      </div>
    </div>

  </form>
</div>

  <?php include('include/footer.php'); ?>