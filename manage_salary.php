<?php 
include 'includes/header.php';
?>

<h1 class="text-center text-uppercase">Employee Salary</h1>
<br>
<table class="table table_css table-bordered table-hover table-condensed table-responsive " style="font-size: 14px">
        <tr>
            <th>SN</th>
            <th>Employee Name</th>
            <th>Salary Amount (PKR)</th>
            <th>Add/Update Salary</th>
            <th>Remove Data</th>
        </tr>

        <?php
        $query1="SELECT * FROM employee LEFT outer JOIN salary on salary.employee_id=employee.id ";         
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
                                    <td><?php echo $row1['salary_amount']; ?></td> 
                                    <td>
                                         <a class="btn btn-primary" href="update_salery.php?employee_id=<?php 
                                         echo $row1[0].'&salary_amount='.$row1['salary_amount'];
                                         ?>">Proceed</a>
                                    </td>
                                    <td>
                                         <a class="btn btn-danger" href="delete.php?id=<?php echo $row1['id'];?>&table=salary">Remove</a>
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