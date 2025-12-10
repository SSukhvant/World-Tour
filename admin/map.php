<?php include('include/header.php'); ?>
<?php 
    $sql = "SELECT * FROM map";
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
                    <h2>Map Page Update</h2>
                </div>

                <div class="panel-body">
                    <div class="table-responsive">

                        <form action="sql/map.php?id=<?php echo $row['id']; ?>" method="post">
                            
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Embed Map Link</label>

                                        <textarea 
                                            type="text" 
                                            rows="6" 
                                            required 
                                            name="map_link" 
                                            class="form-control" 
                                            placeholder="Paste Google Map Embed Code Here"><?php echo $row['map_link']; ?></textarea>

                                        <!-- NOTE BLOCK -->
                                        <small class="text-muted d-block mt-2" style="font-size:13px;">
                                            <strong>Note:</strong> Please ensure your Google Map embed code includes 
                                            <code>width="100%"</code> and a proper height such as 
                                            <code>height="400"</code> for a fully responsive map display on the website.
                                            <br>
                                            Example:
                                            <code>&lt;iframe width="100%" height="400" ... &gt;&lt;/iframe&gt;</code>
                                        </small>
                                    </div>
                                    <br>

                                    <input type="submit" class="form-control btn btn-primary" value="Update Now" name="map_update">

                                </div>
                            </div>

                        </form>
                        <br><br><br>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<?php include('include/footer.php'); ?>
