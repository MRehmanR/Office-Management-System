<?php 
include 'includes/header.php';
?>

<h1 class="text-center text-uppercase">Notice Board</h1>
<br>
<table class="table table_css table-bordered table-hover table-condensed table-responsive " style="font-size: 14px">
        <tr>
            <th>SN</th>
            <th>Title</th>
            <th>Message</th>
            <th>Date Published</th>
            <th>Delete</th>
        </tr>

        <?php
        $query1="SELECT * FROM notice_board order by id desc ";         

                $result1= mysqli_query($mysql, $query1);
                if($result1){
                    if(mysqli_num_rows($result1)){
                        $sn=0;
                        while($row1=mysqli_fetch_array($result1)){
                            extract($row1);
                            ?>
                                <tr>
                                    <td><?php echo ++$sn; ?></td>     
                                    <td><?php echo $row1[1]; ?></td> 
                                    <td><?php echo $row1[2]; ?></td> 
                                    <td><?php echo $row1[3]; ?></td>       
                                    <td>                                       
                                        <a class="btn btn-danger" href="delete.php?id=<?php echo $row1[0];?>&table=notice_board">Delete</a>
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