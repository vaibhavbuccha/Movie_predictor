<?php

include "topnav.php";

if(isset($_POST['add_celeb']))
{
    // print_r($_POST);
    $name = $_POST['name'];
    $hit = $_POST['hit'];
    $flop = $_POST['flop'];
    $insert = "INSERT INTO tbl_celeb ( `name`, `hitmovies`, `flopmovies`) Values ('$name','$hit','$flop')";
    // print_r($insert);
    mysqli_query($con, $insert);
    header("Location: list_celeb.php");
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <p class="text-primary" style="font-size: 20px;" >Add Celebrities</p>
            <hr>
            <div class="container">
            <form action="" method="post">
                <input type="text" class="form-control" name="name" placeholder="Celebritie name" required >
                <br>
                <div class="row">
                    <div class="col-sm-6"><input type="number" class="form-control" name="hit" required placeholder="No of hit movies"></div>
                    <div class="col-sm-6"><input type="number" class="form-control" name="flop" required placeholder="No of flop movies"></div>
                    <br>
                    <div class="col-sm-12" align="right">
                    <br>
                    <input type="submit" name="add_celeb" class="btn btn-primary" value="Add">
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
    