<?php

include "topnav.php";

?>

<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
        <p class="text-primary" style="font-size: 20px;" >View Movies Detail</p>
            <hr>
            <table class="table table-bordered">
            <?php 
                // echo $_GET['id'];
                $id =$_GET['id'];
                $select = "SELECT * FROM tbl_movies where id= '$id' ";
                $query = mysqli_query($con,$select);
                while($row = mysqli_fetch_assoc($query))
                {
            ?>
                <tr>
                    <th>Name</th>
                    <td><?= $row['name'] ?></td>
                </tr>
                <tr>
                    <th>Director Name</th>
                    <td>
                    <?php  #$row['director_id']

                        $director_id = explode(',',$row['director_id']);
                        // print_r($celeb_id);
                        $dir_name = [];
                        foreach($director_id as $id)
                        {
                            $select = "SELECT * FROM tbl_director where id ='$id' ";
                            $dir = mysqli_query($con,$select);
                            while($c = mysqli_fetch_assoc($dir))
                            {
                                array_push($dir_name,$c['name']);
                            }
                        }
                        echo implode(' , ',$dir_name);


                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Celebrities Name</th>
                    <td>
                    <?php # $row['celeb_id'] 

                            $celeb_id = explode(',',$row['celeb_id']);
                            // print_r($celeb_id);
                            $celeb_name = [];
                            foreach($celeb_id as $id)
                            {
                                $select = "SELECT * FROM tbl_celeb where id ='$id' ";
                                $celeb = mysqli_query($con,$select);
                                while($c = mysqli_fetch_assoc($celeb))
                                {
                                    array_push($celeb_name,$c['name']);
                                }
                            }
                            echo implode(' , ',$celeb_name);


                            ?>


                    
                    </td>
                </tr>
                <tr>
                    <th>Descrition</th>
                    <td>
                            <?php echo $row['description'];  ?>
                    </td>
                </tr>
                <tr>
                    <th>Trailer</th>
                    <td>
                        <iframe src="<?php echo $row['trailer_url'] ?>" frameborder="0" width="400px"></iframe>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <a href="movie_listing.php" class="btn btn-dark">Back</a>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>

        <div class="col-sm-3"></div>
    </div>
</div>