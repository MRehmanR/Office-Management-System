<?php 
include 'includes/header.php';
?>

<h1 class="text-center text-uppercase">Employee Attendance Report</h1>
<br>
<table class="table table_css table-bordered table-hover table-condensed table-responsive " style="font-size: 14px">
        <tr>
            <th>SN</th>
            <th>Employee</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
        </tr>

        <?php
        $query1="SELECT * FROM attendance inner join employee on attendance.employee_id= employee.id  ";         

                $result1= mysqli_query($mysql, $query1);
                if($result1){
                    if(mysqli_num_rows($result1)){
                        $sn=0;
                        while($row1=mysqli_fetch_array($result1)){
                            extract($row1);
                            ?>
                                <tr>
                                    <td><?php echo ++$sn; ?></td>                                                                        
                                    <td><?php echo $row1['name']; ?></td> 
                                    <td><?php echo $row1['date']; ?></td>                                      
                                    <td><?php echo $row1['time']; ?></td> 
                                    <td><?php echo $row1['status']; ?></td>
                                    
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