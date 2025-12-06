  <?php 
      include("include/header.php");

      if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM review WHERE id='$id'";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_assoc($result);
      }
  ?>

    <div id="page-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Update Page</h1>
          </div>
        </div>

      <form action="sql/review.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
          <a href="review" class="btn btn-info btn-sm">Back</a>
          <div class="row">
            <div class="col-md-12">

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Name</label>
              <input type="text" required name="name" value="<?= $row['name'];?>" class="form-control" placeholder="title">
            </div><br>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email</label>
              <input type="text" required name="email" value="<?= $row['email'];?>" class="form-control" placeholder="Email">
            </div><br>

            <?php 
              $review_category_sql = "SELECT * FROM rating";
              $review_category_query = mysqli_query($con,$review_category_sql);
            ?>

            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Star</label>
              
              <select name="star" class="form-control">
                <?php while($review_category_row = mysqli_fetch_assoc($review_category_query)){ ?>
                    <?php if($review_category_row['id'] == $row['star']){ ?>
                  <option selected value='<?php echo $review_category_row['id'];?>'><?php echo $review_category_row['id'];?></option>

                <?php }else{?>
                    <option value='<?php echo $review_category_row['id'];?>'><?php echo $review_category_row['id'];?></option>
                <?php }?>
                <?php }?>
              </select>
            </div><br>


            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Content</label>
              <textarea required rows="6" class="form-control" name="content"><?= $row['content'];?></textarea>
            </div><br>

            <div class="mb-3">
              <img width="100" src="image/<?php echo $row['image'];?>"><br>
              <label for="exampleFormControlInput1" class="form-label">Upload image</label>
              <input type="file" name="image">
            </div><br>

          <input type="submit" class="form-control btn btn-primary" value="submit" name="review_update">
      </div>
    </div>

  </form>
</div>

  <?php include('include/footer.php'); ?>