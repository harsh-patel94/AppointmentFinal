<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('dbcon.php'); ?>
<?php include('navbar_dasboard.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
				
				<div class="span3">
						<p><strong>Today is:</strong></p>
				 <div class="alert alert-success">
                        <i class="icon-calendar icon-large"></i>
                        <?php
                        $Today = date('d:m:y');
                        $new = date('l, F d, Y', strtotime($Today));
                        echo $new;
                        ?>
                    </div>		
						<div class="alert alert-info">Time Guide for Each Number</div>
						<p>Number 1  - 9:30 - 10:00</p>
						<p>Number 2  - 10:00 - 10:30</p>
						<p>Number 3  - 10:30 - 11:00</p>
						<p>Number 4  - 11:30 - 12:00</p>
						<p>Number 5  - 12:30 - 1:00</p>
						
						<p>Number 6  - 3:00 - 3:30</p>
						<p>Number 7  - 3:30 - 4:00</p>
						<p>Number 8  - 4:30 - 5:00</p>
					
					
					
				<div class="alert alert-info"></div>
						
				<div class="alert alert-info"></div>	
				</div>
				<div class="span6">
					<img src="img/top-dog-banner-1.jpg">
					<br>
					<br>
					
				<div class="alert alert-info">Select Date of Appointment and Service Offer</div>

		<!-- reservation -->
		<?php if (isset($_POST['yes'])){ 
		$session_id = $_POST['session_id'];
		$date1 = $_POST['date1'];
		$service1 = $_POST['service1'];
		$equal = $_POST['equal'];
		mysqli_query($db, "insert into schedule (member_id,date,service_id,number,status) values('$session_id','$date1','$service1','$equal','Pending')")or die(mysql_error());
		?>
		<div class="yes"><h4>Your appointment has been set on  <?php echo  $date1; ?>. THANK YOU</h4></div>
		<?php }else{ ?>
		<script>
		alert('error');
		</script>
		<?php } ?>
		<br>
		<br>
	
	<!-- end reservation -->
	


	
	
	
				</div>
				<div class="span3">
				<div class="alert alert-info">List of Services</div>
						<table class="table  table-bordered">
                            
                                <thead>
                                    <tr>
                                        <th>Service Offer</th>
                                        <th>Price</th>                                 
                                     
                                    </tr>
                                </thead>
                                <tbody>
								 
                                  <?php $user_query=mysqli_query($db, "select * from service")or die(mysql_error());
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['service_id']; ?>
									 <tr class="del<?php echo $id ?>">
                                    <td><?php echo $row['service_offer']; ?></td> 
                                    <td><?php echo $row['price']; ?></td>                         
									<?php } ?>
                           
                                </tbody>
                            </table>
			
				
			</div>
		</div>
    </div>
<?php include('footer.php') ?>