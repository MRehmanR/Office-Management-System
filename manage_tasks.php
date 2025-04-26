<?php 
include 'includes/header.php';
?>

<h1 class="text-center text-uppercase"> Manage Employees </h1>
<a class="btn btn-info" href="manage_tasks.php">All</a>
<a class="btn btn-warning" href="?input=Pending">Pending</a>
<a class="btn btn-primary" href="?input=Running">Running</a>
<a class="btn btn-success" href="?input=Completed">Completed</a>
<a class="btn btn-warning" href="assign_task.php">Assign New Task </a>

<br><br>
<table class="table table_css table-bordered table-hover table-condensed  ">
        <tr>
            <th>SN</th>
            <th>Task Name</th>
            <th>Detail</th>
            <th>Employee Name</th>
            <th>Start Date</th>
            <th>Deadline</th>
            <th>Status</th>
            <th style="width: 150px" >Change Status</th>
            <th>Progress</th>
            <th>Update %</th>
            <th>Delete</th>
        </tr>

        <?php
        if(isset($_GET['input'])){
            $input=$_GET['input'];
            $query1="SELECT * from task INNER JOIN employee on "
                     . "task.employee_id=employee.id where task.status = '$input' ";
        }else{
             $query1="SELECT * from task INNER JOIN employee on "
                     . "task.employee_id=employee.id ";            
        }

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
                                    <td><?php echo $row1[9]; ?></td>
                                    <td><?php echo $row1[4]; ?></td>                
                                    <td><?php echo $row1[5]; ?></td>     
                                    <td>
                                        <?php echo $row1[6]; ?>
                                    </td>     
                                    <td>
                                        <a class="btn btn-primary" href="change_status.php?id=<?php echo $row1[0];?>&table=task&keyword=Running">Start</a>
                                        <a class="btn btn-success" href="change_status.php?id=<?php echo $row1[0];?>&table=task&keyword=Completed">Complete</a>  
                                    </td>
                                    <td><?php echo $row1[7].' %'; ?></td>     
                                    <td>
                                        <a href="update_progress.php?id=<?php echo $row1[0]; ?>&progress=<?php echo $row1['progress'] ?>">
                                            <button class="btn btn-primary">Update</button>
                                        </a>
                                    </td> 
                                   <td>
                                        <a href="delete.php?id=<?php echo $row1[0]; ?>&table=task">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
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