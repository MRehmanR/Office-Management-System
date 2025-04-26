<?php 
include 'includes/header.php';
?>

<h1 class="text-center text-uppercase">Complaint Report</h1>
<br>
<table class="table table_css table-bordered table-hover table-condensed table-responsive " style="font-size: 14px">
        <tr>
            <th>SN</th>
            <th>Title</th>
            <th>Detail</th>
            <th>Date</th>
            <th>By</th>
        </tr>

        <?php
        $query1="SELECT * FROM complaint inner join employee on employee.id=complaint.employee_id  ";         

                $result1= mysqli_query($mysql, $query1);
                if($result1){
                    if(mysqli_num_rows($result1)){
                        $sn=0;
                        while($row1=mysqli_fetch_array($result1)){
                            extract($row1);
                            ?>
                                <tr>
                                    <td><?php echo ++$sn; ?></td>                                                                        
                                    <td><?php echo $row1['title']; ?></td> 
                                    <td><?php echo $row1['detail']; ?></td>                                      
                                    <td><?php echo $row1['date']; ?></td> 
                                    <td><?php echo $row1['name']; ?></td>
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