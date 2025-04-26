<?php 
include 'includes/header.php';
?>

<h1 class="text-center text-uppercase"> Employee Report </h1>

<table class="table table_css table-bordered table-hover table-condensed  " style="font-size: 14px">
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Email</th>
            <th>Location</th>
            <th>Contact</th>
            <th>Gender</th>
        </tr>

        <?php

             $query1="SELECT * FROM employee ";

                $result1= mysqli_query($mysql, $query1);
                if($result1){
                    if(mysqli_num_rows($result1)){
                        $sn=0;
                        while($row1=mysqli_fetch_array($result1)){
                            ?>
                                <tr>
                                    <td><?php echo ++$sn; ?></td>
                                    <td><?php echo $row1[1]; ?></td>
                                    <td><?php echo $row1[2]; ?></td>
                                    <td><?php echo $row1[4]; ?></td>
                                    <td><?php echo $row1[5]; ?></td>                
                                    <td><?php echo $row1[6]; ?></td>                                      
                                </tr>
                            <?php
                        }
                    }else{
                        echo '<tr><td colspan="21" class="text-center"><strong>No Data Found</strongx></td></tr>';
                    }
                        
                }else{
                    alert(mysqli_error($mysql));
                }
        ?>           
    </table>             
<button class="btn btn-primary hidden-print" onclick="print()"><span class="glyphicon glyphicon-print"></span></button>
<?php 
include 'includes/footer.php';
?>