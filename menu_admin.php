

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
            <li><a href='manage_employees.php'>Manage Employees</a></li>
            <li><a href='view_complaints.php'>View Complaint</a></li>
            <li><a href='manage_leave_applications.php'>Manage Leave Application</a></li>
            <li><a href='employee_attendance.php'>Employee Attendance</a></li>
            <li><a href='manage_salary.php'>Manage Salary</a></li>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Notice Board <span class="fa fa-caret-down"></span></a>
                <ul class="dropdown dropdown-menu">
                    <li><a href="add_notice.php">Add New Notice</a></li> 
                    <li class="divider"></li>
                    <li><a href="manage_notice_board.php">Notice Board</a></li>
                </ul>
            </li>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reports <span class="fa fa-caret-down"></span></a>
                <ul class="dropdown dropdown-menu">
                    <li><a href="employee_report.php">Employee</a></li> 
                    <li class="divider"></li>
                    <li><a href="salary_report.php">Salary</a></li>
                    <li class="divider"></li>
                    <li><a href="attendance_report.php">Attendance</a></li>
                    <li class="divider"></li>
                    <li><a href="complaint_report.php">Complaints</a></li>
                     <li class="divider"></li>
                    <li><a href="leave_report.php">Leaves</a></li>
                </ul>
            </li>
            <li><a href="manage_tasks.php">Manage Task</a></li>
            <li style="float: right" ><a class="btn btn-danger" href="logout.php">Logout <?php echo $_SESSION['user_name']; ?></a></li>
       
                
        </ul>
        
    </div>
</div>
