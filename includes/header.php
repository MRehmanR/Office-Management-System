<html>
    <head>

        <?php
        session_start();
        include 'conn.php';
        include 'function.php';
        ?>
        
        <?php 
        $site_name='Enterprise Office Management System'; 
        $referer_page=$_SERVER['HTTP_REFERER'];
        if(isset($_SESSION['user_id'])){
            $my_id=$_SESSION['user_id'];
        }        
        ?>
		
        <title> <?php echo $site_name; ?> </title>
        <link rel="stylesheet" type="text/css" href="includes/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="includes/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="includes/stylesheet.css">
		<link rel="icon" type=image/x-icon href="includes/clock.ico">
        <!-- adding JavaScript -->
        <script type="text/javascript" src="includes/jquery-3.4.1.min.js"></script>    
        <script type="text/javascript" src="includes/bootstrap/js/bootstrap.js"></script>          
        

        
    </head>
    
    <body>
        <div class="container" style="margin-bottom: 50px">
            <div class="row">
                
            <?php         
            //adding menu
            if(isset($_SESSION['user_role'])){
                include 'menu'.'_'.$_SESSION['user_role'].'.php';
            }else{
                include 'menu_genral.php';
            }
            ?> 
                
        
            <br><br><br><br><br>