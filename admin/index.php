<?php

include "includes/header.php";

if(isset($_POST['login']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password = md5($password);
    $select = "SELECT * FROM tbl_admin where email = '$email' AND password = '$password' ";
    $query = mysqli_query($con , $select);
    $count = $query->num_rows;
    if($count > 0)
    {
        $row = mysqli_fetch_assoc($query);
        session_start();
        $_SESSION['admin_session'] = $row;
        header("Location: dashboard.php");
    }
}


?>


    
<div class="row" style="margin: 150px auto 0;">
    <div class="col-sm-4"></div>
    <div class="col-sm-4" align="center" style="border: 1px solid gray;padding:20px;border-radius:10px;">
        <h4>Admin Login</h4>
        <hr>
        <div class="container">
            <form action="" method="post">
                <input type="email" class="form-control" placeholder="Email Address" name="email" required >
                <br>
                <input type="password" class="form-control" placeholder="Password" name="password" required >
                <br>
                <input type="submit" value="Login" class="btn btn-info" name="login">
            </form>
        </div>
    </div>
    <div class="col-sm-4"></div>
</div>

<?php

include "includes/footer.php";

?>
    
