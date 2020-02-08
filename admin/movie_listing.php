<?php

include "topnav.php";

?>
<div class="container">
    <div class="col-sm-12" align="right">
        <a href="add_movie.php" class="btn btn-primary">Add New</a>
    </div>
    <p class="text-primary" style="font-size: 20px;">Movies</p>
    <hr>
    <?php
    $select = "SELECT * FROM tbl_movies";
    $query = mysqli_query($con,$select);
    // $rows = mysqli_fetch_assoc($query);
    // print_r($rows);
    $i = 1;
    ?>
    <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <th>#</th>
            <th>Name</th>
            <th>Celebrities Name</th>
            <th>Director Name</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
                while($row = mysqli_fetch_assoc($query))
                {
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?php # $row['celeb_id'] 

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
                            <td><?php  #$row['director_id']

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
                            <td><a href="view_movie.php?id=<?php echo $row['id']; ?>"><i  class="btn btn-info fa fa-eye"></i></a></td>
                        </tr>
                    <?php
                    $i++;
                }
            
            ?>
        </tbody>
    </table>
</div>



<?php

include "includes/footer.php";

?>
    