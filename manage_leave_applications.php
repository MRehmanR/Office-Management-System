<?php 
include 'includes/header.php';
?>

<h1 class="text-center text-uppercase">Leave Applications</h1>
<br>
<table class="table table_css table-bordered table-hover table-condensed table-responsive " style="font-size: 14px">
        <tr>
            <th>SN</th>
            <th>Employee Name</th>
            <th>From</th>
            <th>To</th>
            <th>Reason</th>
            <th>Address</th>
            <th>Status</th>
            <th style="width: 200px">Change Status</th>
        </tr>

        <?php
        $query1="SELECT * FROM leave_application inner join employee on leave_application.employee_id= employee.id ";         

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
                                    <td><?php echo $row1['date_from']; ?></td> 
                                    <td><?php echo $row1['date_to']; ?></td>                                      
                                    <td><?php echo $row1['reason']; ?></td> 
                                    <td><?php echo $row1['address']; ?></td>
                                    <td><?php echo $row1['status']; ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="change_status.php?id=<?php echo $row1[0];?>&table=leave_application&keyword=Approved">Approve</a>
                                        <a class="btn btn-danger" href="change_status.php?id=<?php echo $row1[0];?>&table=leave_application&keyword=Not Approved">Not Approve</a>
                                    </td>
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