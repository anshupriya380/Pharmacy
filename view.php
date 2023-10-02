<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
$id=$_SESSION['manager_id'];
$fname=$_SESSION['first_name'];
$lname=$_SESSION['last_name'];
$sid=$_SESSION['staff_id'];
$user=$_SESSION['username'];
}else{
header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php $user?> Pharmacy Management System</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
    <link rel="stylesheet" type="text/css" href="style/form.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="style/dashboard_styles.css"  media="screen" />
<link rel="stylesheet" href="style/table1.css" type="text/css" media="screen" /> 
<link rel="stylesheet" type="text/css" href="style/home.css">
<script src="js/function1.js" type="text/javascript"></script>
</head>
<body>
<div style="width: 100%;display: flex;flex-direction: column;">
    <div class="div1">

        <div class="bnr" style="margin-top: 0px">
            <img src="images/logo.png" width="67px" height="" />
        </div>

        <div class="bnr" style="margin-left: 100px">
            HOSPITAL PHARMACY MANAGEMENT SYSTEM
        </div>
         <?php 
	include('connect_db.php');
	$qury=mysqli_query($conn, "SELECT * from stock where status='low'") or die(mysqli_error());
	$ros=mysqli_num_rows($qury);
	if($ros>0){
		?>
	 <div class="bnr" style="margin-top: 17px;margin-left: 0px">
	 	<img src="images/red.png" class="imgc">: Low stock</div>
	<?php
	}else{
		?>
	<div class="bnr" style="margin-top: 17px">
		<img src="images/green.png" class="imgc">: Enough stock
	</div>
	<?php	
	}
	?>
     <div class="bnr" style="margin-top: 17px">
            <a href="logout.php">
                <button class="lout" style="vertical-align:middle;">
                <div style=" display: flex; justify-content: space-between;">
                <img src="images/user.png" style="width: 25px">
                <div style="padding:5px;color: #000000;">
                    <b>Logout</b>
                </div>
                </div>
                </button>
            </a>
        </div>
    </div>

<div style="width: 100%;display: flex;">

        <div>
            <a href="manager.php" style="text-decoration:none;"><button class="button">Home</button></a>
            <a href="view.php" style="text-decoration:none;"><button class="button">View Users</button></a>
            <a href="view_prescription.php" style="text-decoration:none;"><button class="button">View Prescription</button></a>
            <a href="stock.php" style="text-decoration:none;"><button class="button">Manage Stock</button></a>
        </div>
        <div class="content" style="margin-left:235px;width: 700px;">
			<div div style="width: 100%;display: flex;flex-direction: column;">  
		    <h2 style="padding-bottom: 0px;margin-bottom: 0px;margin-top: 0px">View Users</h2> 
			<hr style="background-color: black;width: 100%;height: 3px;" align="left">	
			</div>
		    <div style="margin-top: 15px;"> 
		    <a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active" style="text-decoration: none"><button class="btn">PHARMACIST</button></a>
		    <a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2" style="text-decoration: none"><button class="btn">CASHIER</button></a>
		    <a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3" style="text-decoration: none"><button class="btn">MANAGER</button></a>
            </div>
          
        <div id="content_1" style="margin-top: 15px;">  
<?php echo $message;
			  echo $message1;
		/* 
		View
        Displays all data from 'Pharmacist' table
		*/
        // connect to the database
        include_once('connect_db.php');
       // get results from database
       $result = mysqli_query($conn,"SELECT * FROM pharmacist")or die(mysqli_error());
		// display data in table
        echo "<table border='0' cellpadding='1' height='auto'>";
        echo "<tr><th>Firstname</th> <th>Lastname </th> <th>Staff ID</th><th>Phone</th><th>Email</th></tr>";
        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array( $result )) {
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['staff_id'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				
			} 
        // close table>
        echo "</table>";
?> 
        </div>  
        <div id="content_2" style="margin-top: 15px;">  
		          <?php echo $message;
			  echo $message1;
			  
		/* 
		View
        Displays all data from 'Cashier' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysqli_query($conn, "SELECT * FROM cashier") 
                or die(mysqli_error());
				
					    
        // display data in table
        
        echo "<table border='0' cellpadding='1' >";
         echo "<tr><th>Firstname</th> <th>Lastname </th> <th>Staff ID</th><th>Phone</th><th>Email</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['staff_id'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
			
				
		 } 
        // close table>
        echo "</table>";
?>
        </div>  
		 <div id="content_3" style="margin-top: 15px;">  
		        <?php echo $message1;
			  
		/* 
		View
        Displays all data from 'Manager' table
		*/

        // connect to the database
        include_once('connect_db.php');

        // get results from database
		
        $result = mysqli_query($conn, "SELECT * FROM manager") 
                or die(mysqli_error());
				
					    
        // display data in table
        
        echo "<table border='0' cellpadding='1'>";
        echo "<tr><th>Firstname</th> <th>Lastname </th> <th>Staff ID</th><th>Phone</th><th>Email</th></tr>";

        // loop through results of database query, displaying them in the table
        while($row = mysqli_fetch_array( $result )) {
                
                // echo out the contents of each row into a table
                echo "<tr>";
                
                echo '<td>' . $row['first_name'] . '</td>';
				echo '<td>' . $row['last_name'] . '</td>';
				echo '<td>' . $row['Staff_id'] . '</td>';
				echo '<td>' . $row['phone'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				
				
		 } 
        // close table>
        echo "</table>";
?> 
        </div> 
    </div>  
</div>
<div style="background-color: #231F20; font-size: 17px;padding: 6px; margin-top: 174px">
            <p style="float: left; padding-left: 30px;color: #ffffff; margin: 5px">&copy; 2022 Pharmacy. All Rights Reserved</p>
            <p style="float: right; padding-right: 30px;color: #ffffff; margin: 5px;"> Designed By : Arisha & Anshu </p>
    </div>
</div>
</body>
</html>