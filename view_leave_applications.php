<?php 
include 'includes/header.php';
?>

<h1 class="text-center text-uppercase">Leave Applications</h1>
<br>
<table class="table table_css table-bordered table-hover table-condensed table-responsive " style="font-size: 14px">
        <tr>
            <th>SN</th>
            <th>From</th>
            <th>To</th>
            <th>Reason</th>
            <th>Address</th>
            <th>Status</th>
        </tr>

        <?php
        $query1="SELECT * FROM leave_application where employee_id = $my_id ";         

                $result1= mysqli_query($mysql, $query1);
                if($result1){
                    if(mysqli_num_rows($result1)){
                        $sn=0;
                        while($row1=mysqli_fetch_array($result1)){
                            extract($row1);
                            ?>
                                <tr>
                                    <td><?php echo ++$sn; ?></td>                                                                        
                                    <td><?php echo $row1[2]; ?></td> 
                                    <td><?php echo $row1[3]; ?></td>                                      
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

<?php 
include 'includes/footer.php';
?>