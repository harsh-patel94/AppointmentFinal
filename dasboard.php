<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php include('dbcon.php'); ?>
<?php include('navbar_dasboard.php'); ?>
    <div class="container">
		<div class="margin-top">
			<div class="row">
		</SCRIPT>	
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
						<p>Number 1  - 9:30 - 11:00</p>
						<p>Number 2  - 11:30 - 1:00</p>
						<p>Number 3  - 1:30 - 3:00</p>
						<p>Number 4  - 3:30 - 5:00</p>

				</div>
				<div class="span6">
					<img src="img/top-dog-banner-1.jpg">
					<br>
					<br>
					
				<div class="alert alert-info">Book your Appoitment</div>
	
		<!-- reservation -->
		<?php
		if (isset($_POST['sub'])){
		$date = $_POST['date'];
		$service = $_POST['service'];
		
		$query = mysqli_query($db, "select * from schedule where date = '$date' and member_id = '$session_id' ")or die(mysql_error());
		$count = mysqli_num_rows($query);
	/* 	echo $count; */
		if ($count  > 0){ ?>
		<script>
		alert('You have already schedule on this date');
		</script>
		<?php
		}else{
		$equal = $count + 1 ;
		

		?>
		<div class="question">
		<div class="alert alert-success">Your the number <strong><?php echo $equal; ?></strong> client in this date <strong><?php echo  $date; ?></strong></div>
		<form method="POST" action="yes.php">
		<input type="hidden" name="session_id" value="<?php echo $session_id; ?>" >
		<input type="hidden" name="date1" value="<?php echo $date; ?>" >
		<input type="hidden" name="service1" value="<?php echo $service; ?>" >
		<input type="hidden" name="equal" value="<?php echo $equal; ?>" >
		<p>Are you sure you want to set your Appointment on this date?</p>
		<button name="yes" class="btn btn-success"><i class="icon-check icon-large"></i>&nbsp;Yes</button> &nbsp;  <a href="dasboard.php" class="btn"><i class="icon-remove"></i>&nbsp;No</a>
		</form>
	
		</div>
		<br>
		<br>
		<?php }}   ?>
	<!-- end reservation -->
	
	<form class="form-horizontal" method="POST">

		<div class="control-group">
    <label class="control-label" for="inputEmail">Date</label>
    <div class="controls">
    <input type="text"  class="w8em format-d-m-y highlight-days-67 range-low-today" name="date" id="sd" maxlength="10" style="border: 3px double #CCCCCC;" required/>
    </div>
    </div>

		<div class="control-group">
			<label class="control-label" for="inputPassword">Time Slot</label>
			<div class="controls">
			<select name="dogbreed" required>
			<option></option>
			<option>1</option>
			<option>2</option>
			<option>3</option>
			<option>4</option>
			</select>
		    </div>
		</div>

	  <div class="control-group">
    <label class="control-label" for="inputPassword">Your Dog</label>
    <div class="controls">
		<select name="service" required>
			<option></option>
		<?php $query=mysqli_query($db, "select * from members where member_id = '$session_id'")or die(mysql_error());
		while($row=mysqli_fetch_array($query)){
		?>
	
		<option value="<?php echo $row['member_id']; ?>"><?php echo $row['dogname'] ?></option>
		<?php } ?>
		</select>
    </div>
    </div>

    <div class="control-group">
    <label class="control-label" for="inputPassword">Service</label>
    <div class="controls">
		<select name="service" required>
			<option></option>
		<?php $query=mysqli_query($db, "select * from service")or die(mysql_error());
		while($row=mysqli_fetch_array($query)){
		?>
	
		<option value="<?php echo $row['service_id']; ?>"><?php echo $row['service_offer'] ?></option>
		<?php } ?>
		</select>
    </div>
    </div>
    <div class="control-group">
    <div class="controls">
    <button type="submit" name="sub" class="btn btn-info"><i class="icon-check icon-large"></i>&nbsp;Submit</button>
    </div>
    </div>
    </form>
	

				</div>
				<div class="span3">
		<div class="alert alert-info">Note to the Groomer</div>
					<?php $user_query=mysqli_query($db, "select * from note")or die(mysql_error());
									while($row=mysqli_fetch_array($user_query)){
									$id=$row['note_id']; ?>
			
                                    <td><?php echo $row['message']; ?></td> 
                                    <td width="100">
                       
									   <a rel="tooltip"  title="Edit" id="e<?php echo $id; ?>" href="#edit<?php echo $id; ?>" data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
                                    <?php include('edit_note.php'); ?>
									</td>
									<?php include('toolttip_edit_delete.php'); ?>
									</tr>
									<?php } ?>
				    <ul class="nav nav-list">
				    		 
				<?php
				?>
				</ul>
				<br>
			
				
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