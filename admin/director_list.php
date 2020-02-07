<?php

include "topnav.php";

?>
<div class="container">
    <div class="col-sm-12" align="right">
        <a href="add_director.php" class="btn btn-primary">Add New</a>
    </div>
    <p class="text-primary" style="font-size: 20px;">Directors</p>
    <hr>
    <?php
    $select = "SELECT * FROM tbl_director";
    $query = mysqli_query($con,$select);
    // $rows = mysqli_fetch_assoc($query);
    // print_r($rows);
    $i = 1;
    ?>
    <table class="table table-bordered table-hover table-striped">
        <thead class="thead-dark">
            <th>#</th>
            <th>Name</th>
            <th>No. of Hit movies</th>
            <th>No. of Flop movies</th>
        </thead>
        <tbody>
            <?php
                while($row = mysqli_fetch_assoc($query))
                {
                    ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $row['name'] ?></td>
                            <td><?= $row['hitmovies'] ?></td>
                            <td><?= $row['flopmovies'] ?></td>
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
    