<?php 
include 'includes/header.php';
?>

<h1 class="text-center text-uppercase"> Manage Employees </h1>

<table class="table table_css table-bordered table-hover table-condensed  ">
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Email</th>
            <th>Location</th>
            <th>Contact</th>
            <th>Gender</th>
            <th>Picture</th>
            <th>Edit</th>
            <th>Delete</th>
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
                                    <td>
                                        <a target="_blank" href="<?php echo $row1[7]; ?>">
                                            <button class="btn btn-default">View</button>
                                        </a>
                                    </td>     
                                                  
                                    <td>
                                        <a class="btn btn-info" href="edit_user.php<?php
                                        echo '?id='. base64_encode($row1[0]).'&';
                                        echo 'name='.base64_encode($row1[1]).'&';
                                        echo 'email='.base64_encode($row1[2]).'&';
                                        echo 'password='.base64_encode($row1[3]).'&';
                                        echo 'location='.base64_encode($row1[4]).'&';
                                        echo 'contact='.base64_encode($row1[5]);
                                        
                                        ?>">Edit</a>
                                    </td>
                                    
                                    <td>

                                        <a href="delete.php?id=<?php echo $row1[0]; ?>&table=employee">
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