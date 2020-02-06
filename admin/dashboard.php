<?php

include "includes/header.php";

session_start();

if(count($_SESSION) == 0)
{
    header("Location: index.php");
}
if(isset($_GET['logout']))
{
    session_destroy();
    header("Location: index.php");
}
?>
<div class="container-fluid" style="margin-top:10px;">
    <div class="row">
        <div class="col-sm-3">
            Dashboard
        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-3"></div>
        <div class="col-sm-3" align="right">
            <form action="" method="get">
                <input type="submit" name="logout" value="Logout" class="btn btn-dark">
            </form>
        </div>
    </div>
</div>
<hr>
<div class="container">
    <div class="jumbotron">
        <div class="row" align="center">
            <div class="col-sm-2" style="padding:50px;background: olive;border-radius: 10px; margin:10px;">
                <a href="" class="text-white">Director</a>
            </div>
            <div class="col-sm-2" style="padding:50px;background: orange;border-radius: 10px; margin:10px;">
                <a href="" class="text-white">Celebrities</a>
            </div>
            <div class="col-sm-2" style="padding:50px;background: green;border-radius: 10px; margin:10px;">
                <a href="" class="text-white">Users</a>
            </div>
            <div class="col-sm-2" style="padding:50px;background: brown;border-radius: 10px; margin:10px;">
                <a href="" class=" text-white">Movies</a>
            </div>
            <div class="col-sm-2" style="padding:50px;background: gray;border-radius: 10px; margin:10px;">
                <a href="" class=" text-white">Reviews</a>
            </div>
            <!-- <div class="col-sm-2"></div> -->
        </div>
    </div>
</div>

<?php

include "includes/footer.php";

?>
    
