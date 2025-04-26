<?php 
include 'includes/header.php';
?>

<h1 class="text-center text-uppercase"> My Tasks </h1>
<table class="table table_css table-bordered table-hover table-condensed  ">
        <tr>
            <th>SN</th>
            <th>Task Name</th>
            <th>Detail</th>
            <th>Start Date</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Progress</th>
        </tr>

        <?php
            $query1="SELECT * from task where employee_id = $my_id ";            

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
                                    <td><?php echo $row1[7]; ?></td>     

  
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

<?php 
include 'includes/footer.php';
?>