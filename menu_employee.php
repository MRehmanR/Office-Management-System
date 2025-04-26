<div class="navbar navbar-default navbar-inverse navbar-fixed-top ">
    
    <div class="h2 text-center text-primary"><?php echo $site_name; ?></div>
    
    <div class="navbar-header">
        <a title="<?php echo $site_name;?>" class="navbar-brand" href="index.php">Home</a>
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse_menu" >
            <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
        </button>           
    </div>
    
    <div class="navbar-collapse collapse" id="collapse_menu">    
        
        <ul class="nav nav-pills" >
  
            
            
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Leave Application <span class="fa fa-caret-down"></span></a>
                <ul class="dropdown dropdown-menu">
                    <li><a href="apply_leave.php">Apply For Leave</a></li> 
                    <li class="divider"></li>
                    <li><a href='view_leave_applications.php'>View Application</a></li>
                </ul>
            </li>
            <li><a href="mark_attendance.php">Mark Attendance</a></li> 
            <li><a href="launch_complaint.php">Launch Compliant</a></li> 
            <li><a href="edit_my_profile.php">My Profile</a></li> 
            <li><a href="view_my_tasks.php">My Tasks
                    <span class="badge">
                        <?php
                        $query9="select * from task where employee_id = $my_id ";
                        if($result9=mysqli_query($mysql, $query9)){
                            echo mysqli_num_rows($result9);
                        }else{
                            alert(mysqli_error($mysql));
                        }
                        ?>
                    </span>
                </a></li>
            <li><a href="view_notice_board.php">Notice Board
                    <span class="badge">
                        <?php
                        $query9="select * from notice_board";
                        if($result9=mysqli_query($mysql, $query9)){
                            echo mysqli_num_rows($result9);
                        }else{
                            alert(mysqli_error($mysql));
                        }
                        ?>
                    </span>
                </a></li>
            <li style="float: right" ><a class="btn btn-danger" href="logout.php">Logout <?php echo $_SESSION['user_name']; ?></a></li>
       
                
        </ul>
        
    </div>
</div>
