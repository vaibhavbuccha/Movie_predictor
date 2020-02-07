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
            <a href="dashboard.php" class="text-dark"><b>Dashboard</b></a>
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