<?php

include "topnav.php";

if(isset($_POST['add_movie']))
{
    // print_r($_POST);
    $name = $_POST['name'];
    $celeb = $_POST['celeb'];
    $director = $_POST['director'];
    $celeb = implode(',',$celeb);
    $director = implode(',',$director);
    $url = $_POST['triler'];
    $desc = $_POST['decription'];
    // print_r($director);
   
    $insert = "INSERT INTO tbl_movies ( `name`, `celeb_id`, `director_id` , `trailer_url`, `description`) Values ('$name','$celeb','$director','$url','$desc')";
    // // print_r($insert);
    mysqli_query($con, $insert);
    header("Location: movie_listing.php");
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <p class="text-primary" style="font-size: 20px;" >Add Movies</p>
            <hr>
            <div class="container">
            <form action="" method="post">
                <input type="text" class="form-control" name="name" placeholder="Celebritie name" required >
                <br>
                <div class="row">
                    <div class="col-sm-6">
                    <select class=" form-control" name="celeb[]" multiple searchable="Search here..">
                        <option value="" disabled selected>Choose Celebritie</option>
                        <?php 
                            $select = "SELECT * FROM tbl_celeb";
                            $query = mysqli_query($con,$select);
                            while($row = mysqli_fetch_assoc($query))
                            {
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                    </div>
                    <div class="col-sm-6">
                    <select class="  form-control" multiple name="director[]" searchable="Search here..">
                        <option value="" disabled selected>Choose Director</option>
                        <?php 
                            $select = "SELECT * FROM tbl_director";
                            $query = mysqli_query($con,$select);
                            while($row = mysqli_fetch_assoc($query))
                            {
                                ?>
                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                    </div>
                    <br>
                    <div class="col-sm-12">
                    <br>
                            <textarea name="decription" id="" class="form-control" required placeholder="Movie Description" cols="30" rows="10"></textarea>
                    </div>
                    <br>
                    <div class="col-sm-12">
                    <br>
                            <input type="url" name="triler" class="form-control" required placeholder="Trailer Url" >
                    </div>
                    <div class="col-sm-12" align="right">
                    <br>
                    <input type="submit" name="add_movie" class="btn btn-primary" value="Add">
                    </div>
                </div>
            </form>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
</div>


<?php

include "includes/footer.php";

?>
    <script> 
          CKEDITOR.replace( 'decription' );
 </script>